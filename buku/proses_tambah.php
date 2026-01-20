<?php
// koneksi ke database
include '../config/koneksi.php'; // pastikan file config.php berisi koneksi ke database

// cek apakah form disubmit dengan method POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // ambil data dari form
    $judul_buku      = mysqli_real_escape_string($conn, $_POST['judul_buku']);
    $penerbit     = mysqli_real_escape_string($conn, $_POST['penerbit']);
    $tahun_terbit    = mysqli_real_escape_string($conn, $_POST['tahun_terbit']);
    $pengarang  = mysqli_real_escape_string($conn, $_POST['pengarang']);
    $jumlah_buku    = mysqli_real_escape_string($conn, $_POST['jumlah_buku']);

    // validasi sederhana: cek jika ada yang kosong
    if (empty($judul_buku) || empty($penerbit) || empty($tahun_terbit) || empty($pengarang) || empty($jumlah_buku)) {
        echo "<script>alert('Semua field harus diisi!'); window.location.href='../?page=tambah_buku';</script>";
        exit;
    }

    // query insert data
    $query = "INSERT INTO buku (judul_buku, penerbit, tahun_terbit, pengarang, jumlah_buku)
              VALUES ('$judul_buku', '$penerbit', '$tahun_terbit', '$pengarang', '$jumlah_buku')";

    if (mysqli_query($conn, $query)) {
        // jika sukses
        echo "<script>alert('Data buku berhasil ditambahkan!'); window.location.href='../?page=view_buku';</script>";
    } else {
        // jika gagal
        echo "<script>alert('Gagal menambahkan data buku: " . mysqli_error($conn) . "'); window.location.href='../?page=tambah_buku';</script>";
    }

    // tutup koneksi
    mysqli_close($conn);
} else {
    // jika akses langsung tanpa submit
    header("Location: ../?page=view_buku");
    exit;
}
?>
