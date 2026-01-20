<?php
// koneksi ke database
include '../config/koneksi.php';

// ambil ID dari parameter URL
if (isset($_GET['id_slot'])) {
    $id_slot = $_GET['id_slot'];

    // query hapus data
    $query = "DELETE FROM slot_rak WHERE id_slot='$id_slot'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // jika berhasil hapus, kembali ke halaman view_slot
        header("Location: ../index.php?page=view_slot&pesan=hapus_sukses");
        exit;
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
} else {
    echo "ID tidak ditemukan!";
}
?>
