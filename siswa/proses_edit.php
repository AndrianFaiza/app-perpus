<?php
include '../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nis     = $_POST['nis'];
    $nama_siswa    = $_POST['nama_siswa'];
    $kelas   = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $no_hp   = $_POST['no_hp'];
    $email   = $_POST['email'];

    $query = "UPDATE siswa SET 
                nama_siswa='$nama_siswa',
                kelas='$kelas',
                jurusan='$jurusan',
                no_hp='$no_hp',
                email='$email'
              WHERE nis='$nis'";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data siswa berhasil diperbarui!'); window.location.href='../?page=view_siswa';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate data: " . mysqli_error($conn) . "'); window.history.back();</script>";
    }
} else {
    header("Location: ../?page=view_siswa");
    exit;
}
?>
