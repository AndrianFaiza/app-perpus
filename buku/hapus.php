<?php
// koneksi ke database
include '../config/koneksi.php';

// ambil NIS dari parameter URL
if (isset($_GET['kode_buku'])) {
    $kode_buku = $_GET['kode_buku'];

    // query hapus data
    $query = "DELETE FROM buku WHERE kode_buku='$kode_buku'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // jika berhasil hapus, kembali ke halaman view_buku
        header("Location: ../index.php?page=view_buku&pesan=hapus_sukses");
        exit;
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
} else {
    echo "NIS tidak ditemukan!";
}
?>
