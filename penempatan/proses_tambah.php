<?php
// koneksi ke database
include '../config/koneksi.php'; // pastikan file config.php berisi koneksi ke database

// cek apakah form disubmit dengan method POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // ambil data dari form
    $kode_buku         = mysqli_real_escape_string($conn, $_POST['kode_buku']);
    $id_slot    = mysqli_real_escape_string($conn, $_POST['id_slot']);
    $tanggal_ditempatkan      = mysqli_real_escape_string($conn, $_POST['tanggal_ditempatkan']);
    $status  = mysqli_real_escape_string($conn, $_POST['status']);

    // validasi sederhana: cek jika ada yang kosong
    if (empty($kode_buku) || empty($id_slot) || empty($tanggal_ditempatkan) || empty($status)) {
        echo "<script>alert('Semua field harus diisi!'); window.location.href='../?page=tambah_penempatan';</script>";
        exit;
    }

    // query insert data        
    $query = "INSERT INTO penempatan_buku (kode_buku, id_slot, tanggal_ditempatkan, status)
              VALUES ('$kode_buku ', '$id_slot', '$tanggal_ditempatkan', '$status')";

    if (mysqli_query($conn, $query)) {
        // jika sukses
        echo "<script>alert('Data Penempatan Buku berhasil ditambahkan!'); window.location.href='../?page=view_penempatan';</script>";
    } else {
        // jika gagal
        echo "<script>alert('Gagal menambahkan data barang masuk: " . mysqli_error($conn) . "'); window.location.href='../?page=tambah_penempatan';</script>";
    }

    // tutup koneksi
    mysqli_close($conn);
} else {
    // jika akses langsung tanpa submit
    header("Location: ../?page=view_penempatan");
    exit;
}
?>
