<?php
include '../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_masuk     = $_POST['id_masuk'];
    $tanggal_masuk     = $_POST['tanggal_masuk'];
    $kode_buku   = $_POST['kode_buku'];
    $id_supplier    = $_POST['id_supplier'];
    $jumlah = $_POST['jumlah'];

    $query = "UPDATE barang_masuk SET 
                tanggal_masuk='$tanggal_masuk',
                id_supplier='$id_supplier',
                kode_buku='$kode_buku',
                jumlah='$jumlah'
                WHERE id_masuk = '$id_masuk'";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data barang masuk berhasil diperbarui!'); window.location.href='../?page=view_pemasukan';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate data: " . mysqli_error($conn) . "'); window.history.back();</script>";
    }
} else {
    header("Location: ../?page=view_pemasukan");
    exit;
}
?>
