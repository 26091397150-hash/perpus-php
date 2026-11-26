
<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../includes/functions.php';

$errors = [];

$stmt = $pdo->query("
    SELECT id_anggota, nama
    FROM anggota
    ORDER BY nama ASC
");
$anggota = $stmt->fetchAll();

$stmt = $pdo->query("
    SELECT id_buku, judul, stok
    FROM buku
    WHERE stok > 0
    ORDER BY judul ASC
");
$buku = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_anggota = trim($_POST['id_anggota'] ?? '');
    $id_buku = trim($_POST['id_buku'] ?? '');
    $tgl_pinjam = trim($_POST['tgl_pinjam'] ?? date('Y-m-d'));

    if ($id_anggota === '') {
        $errors[] = 'Anggota wajib dipilih.';
    }

    if ($id_buku === '') {
        $errors[] = 'Buku wajib dipilih.';
    }

    if ($tgl_pinjam === '') {
        $errors[] = 'Tanggal pinjam wajib diisi.';
    }

    if (!$errors) {
        try {
            $pdo->beginTransaction();

            $cek = $pdo->prepare("
                SELECT stok FROM buku
                WHERE id_buku = ?
                FOR UPDATE
            ");
            $cek->execute([$id_buku]);
            $data_buku = $cek->fetch();

            if (!$data_buku || $data_buku['stok'] < 1) {
                throw new Exception('Stok buku tidak tersedia.');
            }

            $insert = $pdo->prepare("
                INSERT INTO peminjaman
                (id_anggota, id_buku, tgl_pinjam, status)
                VALUES (?, ?, ?, 'dipinjam')
            ");
            $insert->execute([
                $id_anggota,
                $id_buku,
                $tgl_pinjam
            ]);

            $update = $pdo->prepare("
                UPDATE buku
                SET stok = stok - 1
                WHERE id_buku = ?
            ");
            $update->execute([$id_buku]);

            $pdo->commit();

            set_flash('success', 'Peminjaman berhasil ditambahkan.');
            redirect('index.php');

        } catch (Exception $e) {
            if ($pdo->inTransaction()) {
                $pdo->rollBack();
            }

            $errors[] = $e->getMessage();
        }
    }
}

$title = 'Tambah Peminjaman';
require __DIR__ . '/../includes/header.php';
?>

<h3 class="mb-3">Tambah Peminjaman</h3>

<?php tampil_errors($errors); ?>

<form method="post">
    <div class="mb-3">
        <label class="form-label">Anggota</label>
        <select name="id_anggota" class="form-select" required>
            <option value="">-- Pilih Anggota --</option>
            <?php foreach ($anggota as $a): ?>
                <option value="<?= e($a['id_anggota']) ?>">
                    <?= e($a['nama']) ?>
                    (<?= e($a['id_anggota']) ?>)
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Buku</label>
        <select name="id_buku" class="form-select" required>
            <option value="">-- Pilih Buku --</option>
            <?php foreach ($buku as $b): ?>
                <option value="<?= e($b['id_buku']) ?>">
                    <?= e($b['judul']) ?>
                    — Stok: <?= e($b['stok']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Tanggal Pinjam</label>
        <input type="date" name="tgl_pinjam"
               class="form-control"
               value="<?= e(date('Y-m-d')) ?>" required>
    </div>

    <button type="submit" class="btn btn-success">
        Simpan Peminjaman
    </button>

    <a href="index.php" class="btn btn-secondary">
        Batal
    </a>
</form>

<?php require __DIR__ . '/../includes/footer.php'; ?>
