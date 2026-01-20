<?php
include '../config/koneksi.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    // Ambil Data Form Tambah
    $id_siswa       = $_POST['nis'];
    $id_users       = $_POST['id_petugas'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali= $_POST['tanggal_kembali'];
    $status         = $_POST['status'];
    $id_buku  = $_POST['id_buku'];
    $jumlah   = $_POST['jumlah'];

    $cek_stok = mysqli_query($conn, "SELECT jumlah_buku FROM buku WHERE kode_buku = '$id_buku'");
    $data_buku = mysqli_fetch_assoc($cek_stok);
    $jumlah_buku = $data_buku['jumlah_buku'];

// Cek apakah jumlah_buku cukup
    if ($jumlah > $jumlah_buku) {
        echo "<script>
            alert('Jumlah Buku Tidak Mencukupi!');
            window.location.href='../index.php?page=tambah_peminjaman';
        </script>";
        exit;
    }
    // Masukan data peminjaman ke dalam mysql
    $query1 = "INSERT INTO peminjaman (id_siswa, id_users, tanggal_pinjam, tanggal_kembali, status)
               VALUES ('$id_siswa','$id_users','$tanggal_pinjam','$tanggal_kembali','$status')";

    if(mysqli_query($conn, $query1)){

        // ambil id_peminjaman yang baru dibuat
        $id_peminjaman_baru = mysqli_insert_id($conn);

        // Masukan data detail peminjaman ke dalam mysql
        $query2 = "INSERT INTO detail_peminjaman (id_peminjaman, id_buku, jumlah)
                   VALUES ('$id_peminjaman_baru','$id_buku','$jumlah')";

        // setelah menekan kirim apakah datanya berhasil masuk atau tidak
        if(mysqli_query($conn, $query2)){
            echo "<script>alert('Data Peminjaman Buku berhasil ditambahkan!'); window.location.href='../?page=view_peminjaman';</script>";
        }else{
            echo "<script>alert('Gagal menambahkan data Peminjaman Buku: ".mysqli_error($conn)."');</script>";
        }

    }else{
        echo "<script>alert('Gagal insert peminjaman: ".mysqli_error($conn)."');</script>";
    }

} else{
    header("Location: ../?page=view_peminjaman");
    exit;
}
?>
