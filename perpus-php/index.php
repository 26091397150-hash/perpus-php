
<?php
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/includes/functions.php';

$title = 'Dashboard Perpustakaan';

$stmt = $pdo->query("SELECT COUNT(*) FROM buku");
$total_buku = $stmt->fetchColumn();

$stmt = $pdo->query("SELECT COUNT(*) FROM anggota");
$total_anggota = $stmt->fetchColumn();

$stmt = $pdo->query("
    SELECT COUNT(*)
    FROM peminjaman
    WHERE status = 'dipinjam'
");
$total_dipinjam = $stmt->fetchColumn();

$stmt = $pdo->query("
    SELECT COUNT(*)
    FROM peminjaman
    WHERE status = 'kembali'
");
$total_kembali = $stmt->fetchColumn();

require __DIR__ . '/includes/header.php';
?>

<h3 class="mb-4">Dashboard Perpustakaan</h3>

<div class="row g-3">

    <div class="col-md-3">
        <div class="card p-3">
            <h6>Total Buku</h6>
            <h2><?= e($total_buku) ?></h2>
            <a href="buku/">Lihat Buku</a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3">
            <h6>Total Anggota</h6>
            <h2><?= e($total_anggota) ?></h2>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3">
            <h6>Sedang Dipinjam</h6>
            <h2><?= e($total_dipinjam) ?></h2>
            <a href="peminjaman/?status=dipinjam">
                Lihat Peminjaman
            </a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3">
            <h6>Sudah Dikembalikan</h6>
            <h2><?= e($total_kembali) ?></h2>
            <a href="peminjaman/?status=kembali">
                Lihat Pengembalian
            </a>
        </div>
    </div>

</div>

<?php require __DIR__ . '/includes/footer.php'; ?>
