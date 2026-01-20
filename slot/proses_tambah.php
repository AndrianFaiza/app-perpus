<?php
// koneksi ke database
include '../config/koneksi.php'; // pastikan file config.php berisi koneksi ke database


// cek apakah form disubmit dengan method POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // ambil data dari form
    $id_rak      = mysqli_real_escape_string($conn, $_POST['id_rak']);
    $baris     = mysqli_real_escape_string($conn, $_POST['baris']);
    $kolom    = mysqli_real_escape_string($conn, $_POST['kolom']);
    $kapasitas_slot  = mysqli_real_escape_string($conn, $_POST['kapasitas_slot']);

    // validasi sederhana: cek jika ada yang kosong
    if (empty($id_rak) || empty($baris) || empty($kolom) || empty($kapasitas_slot)) {
        echo "<script>alert('Semua field harus diisi!'); window.location.href='../?page=tambah_slot';</script>";
        exit;
    }

    // query insert data        
    $query = "INSERT INTO slot_rak (id_rak, kolom, baris, kapasitas_slot)
              VALUES ('$id_rak', '$kolom', '$baris', '$kapasitas_slot')";

    if (mysqli_query($conn, $query)) {
        // jika sukses
        echo "<script>alert('Data Barang Masuk berhasil ditambahkan!'); window.location.href='../?page=view_slot';</script>";
    } else {
        // jika gagal
        echo "<script>alert('Gagal menambahkan data barang masuk: " . mysqli_error($conn) . "'); window.location.href='../?page=tambah_siswa';</script>";
    }

    // tutup koneksi
    mysqli_close($conn);
} else {
    // jika akses langsung tanpa submit
    header("Location: ../?page=view_slot");
    exit;
}
?>
