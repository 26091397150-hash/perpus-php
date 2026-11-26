
<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('index.php');
}

$id = trim($_POST['id'] ?? '');

try {
    $pdo->beginTransaction();

    // Ambil data transaksi
    $stmt = $pdo->prepare("
        SELECT id_buku, status
        FROM peminjaman
        WHERE id_pinjam = ?
        FOR UPDATE
    ");
    $stmt->execute([$id]);
    $pinjam = $stmt->fetch();

    if (!$pinjam) {
        throw new Exception('Transaksi tidak ditemukan.');
    }

    // Jika masih dipinjam, kembalikan stok terlebih dahulu
    if ($pinjam['status'] === 'dipinjam') {
        $stmt = $pdo->prepare("
            UPDATE buku
            SET stok = stok + 1
            WHERE id_buku = ?
        ");
        $stmt->execute([$pinjam['id_buku']]);
    }

    // Hapus transaksi
    $stmt = $pdo->prepare("
        DELETE FROM peminjaman
        WHERE id_pinjam = ?
    ");
    $stmt->execute([$id]);

    $pdo->commit();

    set_flash('success', 'Transaksi berhasil dihapus.');

} catch (Exception $e) {
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }

    set_flash('danger', $e->getMessage());
}

redirect('index.php');
