<?php
// koneksi ke database
include '../config/koneksi.php'; // pastikan file config.php berisi koneksi ke database


// cek apakah form disubmit dengan method POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // ambil data dari form
    $tanggal_masuk      = mysqli_real_escape_string($conn, $_POST['tanggal_masuk']);
    $kode_buku     = mysqli_real_escape_string($conn, $_POST['kode_buku']);
    $id_supplier    = mysqli_real_escape_string($conn, $_POST['id_supplier']);
    $jumlah  = mysqli_real_escape_string($conn, $_POST['jumlah']);

    // validasi sederhana: cek jika ada yang kosong
    if (empty($tanggal_masuk) || empty($kode_buku) || empty($id_supplier) || empty($jumlah)) {
        echo "<script>alert('Semua field harus diisi!'); window.location.href='../?page=tambah_pemasukan';</script>";
        exit;
    }

    // query insert data        
    $query = "INSERT INTO barang_masuk (tanggal_masuk, id_supplier, kode_buku, jumlah)
              VALUES ('$tanggal_masuk', '$id_supplier', '$kode_buku', '$jumlah')";

    if (mysqli_query($conn, $query)) {
        // jika sukses
        echo "<script>alert('Data Barang Masuk berhasil ditambahkan!'); window.location.href='../?page=view_pemasukan';</script>";
    } else {
        // jika gagal
        echo "<script>alert('Gagal menambahkan data barang masuk: " . mysqli_error($conn) . "'); window.location.href='../?page=tambah_siswa';</script>";
    }

    // tutup koneksi
    mysqli_close($conn);
} else {
    // jika akses langsung tanpa submit
    header("Location: ../?page=view_pemasukan");
    exit;
}
?>
