<?php
include '../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_pengembalian     = $_POST['id_pengembalian'];
    $id_peminjaman     = $_POST['id_peminjaman'];
    $tanggal_dikembalikan   = $_POST['tanggal_dikembalikan'];
    $denda    = $_POST['denda'];
    $id_users    = $_POST['id_users'];

    $query = "UPDATE pengembalian SET 
                id_peminjaman='$id_peminjaman',
                tanggal_dikembalikan='$tanggal_dikembalikan',
                denda='$denda',
                id_users='$id_users'
                WHERE id_pengembalian = '$id_pengembalian'";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data barang masuk berhasil diperbarui!'); window.location.href='../?page=view_pengembalian';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate data: " . mysqli_error($conn) . "'); window.history.back();</script>";
    }
} else {
    header("Location: ../?page=view_pengembalian");
    exit;
}
?>
