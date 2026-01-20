<?php
include '../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode_buku   = $_POST['kode_buku'];
    $judul_buku    = $_POST['judul_buku'];
    $penerbit   = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $pengarang   = $_POST['pengarang'];
    $jumlah_buku   = $_POST['jumlah_buku'];

    $query = "UPDATE buku SET 
                judul_buku='$judul_buku',
                penerbit='$penerbit',
                tahun_terbit='$tahun_terbit',
                pengarang='$pengarang',
                jumlah_buku='$jumlah_buku'
              WHERE kode_buku='$kode_buku'";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data buku berhasil diperbarui!'); window.location.href='../?page=view_buku';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate data: " . mysqli_error($conn) . "'); window.history.back();</script>";
    }
} else {
    header("Location: ../?page=view_buku");
    exit;
}
?>
