<?php
include '../config/koneksi.php';

if (isset($_GET['id_peminjaman'])) {
    $id = $_GET['id_peminjaman'];

    // update status peminjaman
    $detail = mysqli_query($conn, "SELECT id_buku, jumlah FROM detail_peminjaman WHERE id_peminjaman = '$id'");
    while ($row = mysqli_fetch_assoc($detail)) {
        $id_buku = $row['id_buku'];
        $jumlah = $row['jumlah'];
    mysqli_query($conn, "UPDATE buku SET jumlah_buku = jumlah_buku + $jumlah WHERE kode_buku = '$id_buku'");
    }

    // update status peminjaman
    mysqli_query($conn, "UPDATE peminjaman SET status='dikembalikan' WHERE id_peminjaman='$id'");

    // ambil data peminjaman
    $q = mysqli_query($conn, "SELECT * FROM peminjaman WHERE id_peminjaman='$id'");
    $data = mysqli_fetch_assoc($q);
    $id_users = $data['id_users'];

    // ambil tanggal kembali dari database
    $tanggal_kembali = strtotime($data['tanggal_kembali']);

    // buat tanggal sekarang dalam format MySQL
    $tanggal_dikembalikan = date('Y-m-d H:i:s');

    // hitung denda
    $selisih_hari = floor((time() - $tanggal_kembali) / (60 * 60 * 24));
    $denda = ($selisih_hari > 0) ? $selisih_hari * 1000 : 0;

    // masukkan data ke tabel pengembalian
    $query1 = "INSERT INTO pengembalian (id_peminjaman, tanggal_dikembalikan, denda, id_users)
               VALUES ('$id', '$tanggal_dikembalikan', '$denda', '$id_users')";
    mysqli_query($conn, $query1);

    // redirect + notifikasi
    if ($query1) {
        echo "<script>
                alert('Buku Dikembalikan!');
                window.location.href='?page=view_peminjaman';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menyimpan data pengembalian!');
                window.location.href='?page=view_peminjaman';
              </script>";
    }
} else {
    echo "ID tidak ditemukan";
}
?>
