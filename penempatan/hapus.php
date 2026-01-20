<?php
// koneksi ke database
include '../config/koneksi.php';

// ambil ID dari parameter URL
if (isset($_GET['id_penempatan'])) {
    $id_penempatan = $_GET['id_penempatan'];

    // query hapus data
    $query = "DELETE FROM penempatan_buku WHERE id_penempatan='$id_penempatan'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // jika berhasil hapus, kembali ke halaman view_penempatan
        header("Location: ../index.php?page=view_penempatan&pesan=hapus_sukses");
        exit;
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
} else {
    echo "ID tidak ditemukan!";
}
?>
