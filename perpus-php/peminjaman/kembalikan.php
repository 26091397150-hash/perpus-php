
<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('index.php');
}

$id = trim($_POST['id'] ?? '');

try {
    $pdo->beginTransaction();

    // Ambil data peminjaman
    $stmt = $pdo->prepare("
        SELECT id_buku, status
        FROM peminjaman
        WHERE id_pinjam = ?
        FOR UPDATE
    ");
    $stmt->execute([$id]);
    $pinjam = $stmt->fetch();

    if (!$pinjam) {
        throw new Exception('Data peminjaman tidak ditemukan.');
    }

    if ($pinjam['status'] !== 'dipinjam') {
        throw new Exception('Buku ini sudah dikembalikan.');
    }

    // Update status dan tanggal kembali
    $stmt = $pdo->prepare("
        UPDATE peminjaman
        SET status = 'kembali',
            tgl_kembali = CURDATE()
        WHERE id_pinjam = ?
    ");
    $stmt->execute([$id]);

    // Tambahkan stok buku
    $stmt = $pdo->prepare("
        UPDATE buku
        SET stok = stok + 1
        WHERE id_buku = ?
    ");
    $stmt->execute([$pinjam['id_buku']]);

    $pdo->commit();

    set_flash('success', 'Buku berhasil dikembalikan.');

} catch (Exception $e) {
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }

    set_flash('danger', $e->getMessage());
}

redirect('index.php');
