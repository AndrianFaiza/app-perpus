<?php
// koneksi ke database
include '../config/koneksi.php';

// ambil NIS dari parameter URL
if (isset($_GET['id_supplier'])) {
    $id_supplier = $_GET['id_supplier'];

    // query hapus data
    $query = "DELETE FROM supplier WHERE id_supplier='$id_supplier'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // jika berhasil hapus, kembali ke halaman view_siswa
        header("Location: ../index.php?page=view_supplier&pesan=hapus_sukses");
        exit;
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
} else {
    echo "Supplier tidak ditemukan!";
}
?>
