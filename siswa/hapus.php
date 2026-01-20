<?php
// koneksi ke database
include '../config/koneksi.php';

// ambil NIS dari parameter URL
if (isset($_GET['nis'])) {
    $nis = $_GET['nis'];

    // query hapus data
    $query = "DELETE FROM siswa WHERE nis='$nis'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // jika berhasil hapus, kembali ke halaman view_siswa
        header("Location: ../index.php?page=view_siswa&pesan=hapus_sukses");
        exit;
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
} else {
    echo "NIS tidak ditemukan!";
}
?>
