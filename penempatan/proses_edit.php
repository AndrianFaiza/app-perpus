<?php
include '../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_penempatan     = $_POST['id_penempatan'];
    $kode_buku   = $_POST['kode_buku'];
    $id_slot    = $_POST['id_slot'];
    $tanggal_ditempatkan     = $_POST['tanggal_ditempatkan'];
    $status = $_POST['status'];

    $query = "UPDATE penempatan_buku SET 
                kode_buku='$kode_buku',
                id_slot='$id_slot',
                tanggal_ditempatkan='$tanggal_ditempatkan',
                status='$status'
                WHERE id_penempatan = '$id_penempatan'";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data penempatan buku berhasil diperbarui!'); window.location.href='../?page=view_penempatan';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate data: " . mysqli_error($conn) . "'); window.history.back();</script>";
    }
} else {
    header("Location: ../?page=view_penempatan");
    exit;
}
?>
