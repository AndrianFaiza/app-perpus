<?php
include '../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_supplier     = $_POST['id_supplier'];
    $nama_supplier     = $_POST['nama_supplier'];
    $nama_perusahaan    = $_POST['nama_perusahaan'];
    $alamat   = $_POST['alamat'];
    $email   = $_POST['email'];
    $no_hp   = $_POST['no_hp'];

    $query = "UPDATE supplier SET 
                nama_supplier='$nama_supplier',
                nama_perusahaan='$nama_perusahaan',
                alamat='$alamat',
                email='$email',
                no_hp='$no_hp'
              WHERE id_supplier='$id_supplier'";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data supplier berhasil diperbarui!'); window.location.href='../?page=view_supplier';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate data: " . mysqli_error($conn) . "'); window.history.back();</script>";
    }
} else {
    header("Location: ../?page=view_supplier");
    exit;
}
?>
