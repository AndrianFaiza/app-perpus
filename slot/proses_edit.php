<?php
include '../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_slot     = $_POST['id_slot'];
    $id_rak     = $_POST['id_rak'];
    $baris   = $_POST['baris'];
    $kolom    = $_POST['kolom'];
    $kapasitas_slot = $_POST['kapasitas_slot'];

    $query = "UPDATE slot_rak SET 
                id_rak='$id_rak',
                kolom='$kolom',
                baris='$baris',
                kapasitas_slot='$kapasitas_slot'
                WHERE id_slot = '$id_slot'";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data barang masuk berhasil diperbarui!'); window.location.href='../?page=view_slot';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate data: " . mysqli_error($conn) . "'); window.history.back();</script>";
    }
} else {
    header("Location: ../?page=view_slot");
    exit;
}
?>
