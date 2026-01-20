<?php
// koneksi ke database
include '../config/koneksi.php';

// ambil ID dari parameter URL
if (isset($_GET['id_pengembalian'])) {
    $id_pengembalian = $_GET['id_pengembalian'];

    // query hapus data
    $query = "DELETE FROM pengembalian WHERE id_pengembalian='$id_pengembalian'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // jika berhasil hapus, kembali ke halaman view_pengembalian
        header("Location: ../index.php?page=view_pengembalian&pesan=hapus_sukses");
        exit;
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
} else {
    echo "ID tidak ditemukan!";
}
?>
