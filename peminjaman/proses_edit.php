<?php
include '../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id_peminjaman   = $_POST['id_peminjaman'];
    $id_siswa        = $_POST['nis'];
    $id_users        = $_POST['id_petugas'];
    $tanggal_pinjam  = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];
    $status          = $_POST['status'];
    $id_detail       = $_POST['id_detail'];
    $id_buku         = $_POST['id_buku'];
    $jumlah_baru     = $_POST['jumlah'];

    // ambil jumlah lama
    $qLama = mysqli_query($conn, "SELECT jumlah FROM detail_peminjaman WHERE id_detail='$id_detail'");
    $dLama = mysqli_fetch_assoc($qLama);
    $jumlah_lama = $dLama['jumlah'];

    // hitung selisih perubahan jumlah
    $selisih = $jumlah_baru - $jumlah_lama;

    // ambil stok buku saat ini
    $qBuku = mysqli_query($conn, "SELECT jumlah_buku FROM buku WHERE kode_buku='$id_buku'");
    $dBuku = mysqli_fetch_assoc($qBuku);
    $stok_sekarang = $dBuku['jumlah_buku'];

    // jika stok tidak mencukupi
    if ($selisih > $stok_sekarang) {
        echo "<script>
            alert('Stok buku tidak mencukupi! Tersisa hanya $stok_sekarang buku.');
            window.history.back();
        </script>";
        exit;
    }

    // update stok buku (jika ada perubahan jumlah)
    if ($selisih != 0) {
        // Jika selisih positif, berarti peminjam menambah jumlah → kurangi stok
        // Jika selisih negatif, berarti peminjam mengurangi jumlah → tambahkan stok
        $stok_baru = $stok_sekarang - $selisih;
        mysqli_query($conn, "UPDATE buku SET jumlah_buku = '$stok_baru' WHERE kode_buku='$id_buku'");
    }

    // update header peminjaman
    $qPinjam = "UPDATE peminjaman 
                SET id_siswa='$id_siswa', 
                    id_users='$id_users', 
                    tanggal_pinjam='$tanggal_pinjam', 
                    tanggal_kembali='$tanggal_kembali', 
                    status='$status' 
                WHERE id_peminjaman='$id_peminjaman'";

    // update detail
    $qDetail = "UPDATE detail_peminjaman 
                SET id_buku='$id_buku', jumlah='$jumlah_baru' 
                WHERE id_detail='$id_detail'";

    if (mysqli_query($conn, $qPinjam) && mysqli_query($conn, $qDetail)) {
        echo "<script>
            alert('Data Peminjaman Buku berhasil diperbarui!');
            window.location.href='../?page=view_peminjaman';
        </script>";
    } else {
        echo "<script>
            alert('Gagal mengupdate data: " . mysqli_error($conn) . "');
            window.history.back();
        </script>";
    }
}
?>
