<?php
// koneksi ke database
include '../config/koneksi.php'; // pastikan file config.php berisi koneksi ke database

// cek apakah form disubmit dengan method POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // ambil data dari form
    $nis      = mysqli_real_escape_string($conn, $_POST['nis']);
    $nama_siswa     = mysqli_real_escape_string($conn, $_POST['nama_siswa']);
    $kelas    = mysqli_real_escape_string($conn, $_POST['kelas']);
    $jurusan  = mysqli_real_escape_string($conn, $_POST['jurusan']);
    $no_hp    = mysqli_real_escape_string($conn, $_POST['no_hp']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);

    // validasi sederhana: cek jika ada yang kosong
    if (empty($nis) || empty($nama_siswa) || empty($kelas) || empty($jurusan) || empty($no_hp) || empty($email)) {
        echo "<script>alert('Semua field harus diisi!'); window.location.href='../?page=tambah_siswa';</script>";
        exit;
    }

    // query insert data
    $query = "INSERT INTO siswa (nis, nama_siswa, kelas, jurusan, no_hp, email)
              VALUES ('$nis', '$nama_siswa', '$kelas', '$jurusan', '$no_hp', '$email')";

    if (mysqli_query($conn, $query)) {
        // jika sukses
        echo "<script>alert('Data siswa berhasil ditambahkan!'); window.location.href='../?page=view_siswa';</script>";
    } else {
        // jika gagal
        echo "<script>alert('Gagal menambahkan data siswa: " . mysqli_error($conn) . "'); window.location.href='../?page=tambah_siswa';</script>";
    }

    // tutup koneksi
    mysqli_close($conn);
} else {
    // jika akses langsung tanpa submit
    header("Location: ../?page=view_siswa");
    exit;
}
?>
