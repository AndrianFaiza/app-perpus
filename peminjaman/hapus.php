<?php
include '../config/koneksi.php';

if (isset($_GET['id_peminjaman'])) {
    $id_peminjaman = $_GET['id_peminjaman'];

    // ambil semua detail buku yang dipinjam
    $detail = mysqli_query($conn, "SELECT id_buku, jumlah FROM detail_peminjaman WHERE id_peminjaman = '$id_peminjaman'");

    // kembalikan stok setiap buku
    while ($row = mysqli_fetch_assoc($detail)) {
        $id_buku = $row['id_buku'];
        $jumlah = $row['jumlah'];

        // update stok buku
        mysqli_query($conn, "UPDATE buku SET jumlah_buku = jumlah_buku + $jumlah WHERE kode_buku = '$id_buku'");
    }

    // hapus data detail dulu (karena ada relasi ke peminjaman)
    mysqli_query($conn, "DELETE FROM detail_peminjaman WHERE id_peminjaman = '$id_peminjaman'");

    // baru hapus data peminjaman
    mysqli_query($conn, "DELETE FROM peminjaman WHERE id_peminjaman = '$id_peminjaman'");

    // arahkan kembali
    echo "<script>
            alert('Data peminjaman berhasil dihapus dan stok buku dikembalikan.');
            window.location.href='../index.php?page=view_peminjaman';
          </script>";
} else {
    echo "ID tidak ditemukan!";
}
?>
