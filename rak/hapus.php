<?php
// koneksi ke database
include '../config/koneksi.php';

// ambil NIS dari parameter URL
if (isset($_GET['id_rak'])) {
    $id_rak = $_GET['id_rak'];

    // query hapus data
    $query = "DELETE FROM rak WHERE id_rak='$id_rak'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // jika berhasil hapus, kembali ke halaman view_rak
        header("Location: ../index.php?page=view_rak&pesan=hapus_sukses");
        exit;
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
} else {
    echo "NIS tidak ditemukan!";
}
?>
