<?php
// koneksi ke database
include '../config/koneksi.php'; // pastikan file config.php berisi koneksi ke database

// cek apakah form disubmit dengan method POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // ambil data dari form
    $kode_rak      = mysqli_real_escape_string($conn, $_POST['kode_rak']);
    $nama_rak     = mysqli_real_escape_string($conn, $_POST['nama_rak']);
    $lokasi    = mysqli_real_escape_string($conn, $_POST['lokasi']);
    $kapasitas  = mysqli_real_escape_string($conn, $_POST['kapasitas']);

    // validasi sederhana: cek jika ada yang kosong
    if (empty($kode_rak) || empty($nama_rak) || empty($lokasi) || empty($kapasitas)) {
        echo "<script>alert('Semua field harus diisi!'); window.location.href='../?page=tambah_rak';</script>";
        exit;
    }

    // query insert data
    $query = "INSERT INTO rak (kode_rak, nama_rak, lokasi, kapasitas)
              VALUES ('$kode_rak', '$nama_rak', '$lokasi', '$kapasitas')";

    if (mysqli_query($conn, $query)) {
        // jika sukses
        echo "<script>alert('Data rak berhasil ditambahkan!'); window.location.href='../?page=view_rak';</script>";
    } else {
        // jika gagal
        echo "<script>alert('Gagal menambahkan data rak: " . mysqli_error($conn) . "'); window.location.href='../?page=tambah_rak';</script>";
    }

    // tutup koneksi
    mysqli_close($conn);
} else {
    // jika akses langsung tanpa submit
    header("Location: ../?page=view_rak");
    exit;
}
?>
