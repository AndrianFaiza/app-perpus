<?php
// koneksi ke database
include '../config/koneksi.php'; // pastikan file config.php berisi koneksi ke database

// cek apakah form disubmit dengan method POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // ambil data dari form
    $nama_supplier      = mysqli_real_escape_string($conn, $_POST['nama_supplier']);
    $nama_perusahaan     = mysqli_real_escape_string($conn, $_POST['nama_perusahaan']);
    $alamat    = mysqli_real_escape_string($conn, $_POST['alamat']);
    $no_hp    = mysqli_real_escape_string($conn, $_POST['no_hp']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);

    // validasi sederhana: cek jika ada yang kosong
    if (empty($nama_supplier) || empty($nama_perusahaan) || empty($alamat) ||  empty($email) || empty($no_hp)) {
        echo "<script>alert('Semua field harus diisi!'); window.location.href='../?page=tambah_supplier';</script>";
        exit;
    }

    // query insert data
    $query = "INSERT INTO supplier (nama_supplier, nama_perusahaan, alamat, email, no_hp)
              VALUES ('$nama_supplier', '$nama_perusahaan', '$alamat', '$email', '$no_hp')";

    if (mysqli_query($conn, $query)) {
        // jika sukses
        echo "<script>alert('Data supplier berhasil ditambahkan!'); window.location.href='../?page=view_supplier';</script>";
    } else {
        // jika gagal
        echo "<script>alert('Gagal menambahkan data supplier: " . mysqli_error($conn) . "'); window.location.href='../?page=tambah_supplier';</script>";
    }

    // tutup koneksi
    mysqli_close($conn);
} else {
    // jika akses langsung tanpa submit
    header("Location: ../?page=view_supplier");
    exit;
}
?>
