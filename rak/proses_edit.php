<?php
include '../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_rak   = $_POST['id_rak'];
    $kode_rak    = $_POST['kode_rak'];
    $nama_rak   = $_POST['nama_rak'];
    $lokasi = $_POST['lokasi'];
    $kapasitas   = $_POST['kapasitas'];

    $query = "UPDATE rak SET 
                kode_rak='$kode_rak',
                nama_rak='$nama_rak',
                lokasi='$lokasi',
                kapasitas='$kapasitas'
              WHERE id_rak='$id_rak'";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data rak berhasil diperbarui!'); window.location.href='../?page=view_rak';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate data: " . mysqli_error($conn) . "'); window.history.back();</script>";
    }
} else {
    header("Location: ../?page=view_rak");
    exit;
}
?>
