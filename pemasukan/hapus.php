<?php
// koneksi ke database
include '../config/koneksi.php';

// ambil ID dari parameter URL
if (isset($_GET['id_masuk'])) {
    $id_masuk = $_GET['id_masuk'];

    // query hapus data
    $query = "DELETE FROM barang_masuk WHERE id_masuk='$id_masuk'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // jika berhasil hapus, kembali ke halaman view_pemasukan
        header("Location: ../index.php?page=view_pemasukan&pesan=hapus_sukses");
        exit;
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
} else {
    echo "ID tidak ditemukan!";
}
?>
