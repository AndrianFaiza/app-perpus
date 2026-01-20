<?php
// koneksi ke database
include '../config/koneksi.php'; // pastikan file config.php berisi koneksi ke database


// cek apakah form disubmit dengan method POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // ambil data dari form
    $id_peminjaman      = mysqli_real_escape_string($conn, $_POST['id_peminjaman']);
    $tanggal_dikembalikan     = mysqli_real_escape_string($conn, $_POST['tanggal_dikembalikan']);
    $denda    = mysqli_real_escape_string($conn, $_POST['denda']);
    $id_users    = mysqli_real_escape_string($conn, $_POST['id_users']);

    // validasi sederhana: cek jika ada yang kosong
    if (empty($id_peminjaman) || empty($tanggal_dikembalikan) || empty($denda) || empty($id_users)) {
        echo "<script>alert('Semua field harus diisi!'); window.location.href='../?page=tambah_pengembalian';</script>";
        exit;
    }

    // query insert data        
    $query = "INSERT INTO pengembalian (id_peminjaman, tanggal_dikembalikan, denda, id_users)
              VALUES ('$id_peminjaman','$tanggal_dikembalikan', '$denda', '$id_users')";

    if (mysqli_query($conn, $query)) {
        // jika sukses
        echo "<script>alert('Data Barang Masuk berhasil ditambahkan!'); window.location.href='../?page=view_pengembalian';</script>";
    } else {
        // jika gagal
        echo "<script>alert('Gagal menambahkan data barang masuk: " . mysqli_error($conn) . "'); window.location.href='../?page=tambah_pengembalian';</script>";
    }

    // tutup koneksi
    mysqli_close($conn);
} else {
    // jika akses langsung tanpa submit
    header("Location: ../?page=view_pengembalian");
    exit;
}
?>
