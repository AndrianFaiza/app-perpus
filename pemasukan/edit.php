<?php
include '../config/koneksi.php';

// Ambil data berdasarkan ID yang dikirim dari tombol Edit
if (isset($_GET['id_masuk'])) {
    $id_masuk = $_GET['id_masuk'];
    $query = "SELECT bm.id_masuk, bm.tanggal_masuk,bm.kode_buku, bm.id_supplier, buku.judul_buku, supplier.nama_supplier, bm.jumlah FROM barang_masuk AS bm
                INNER JOIN  supplier AS supplier ON bm.id_supplier = supplier.id_supplier
                INNER JOIN buku AS buku ON bm.kode_buku = buku.kode_buku
                WHERE bm.id_masuk = '$id_masuk'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result); 
    } else {
        echo "<script>alert('Data barang_masuk tidak ditemukan!'); window.location.href='?page=view_pemasukan';</script>";
        exit;
    }
} else {
    echo "<script>alert('ID barang_masuk tidak ditemukan!'); window.location.href='?page=view_pemasukan';</script>";
    exit;
}
?>

<div class="container">
    <div class="content">
        <div class="form-container">
            <h2>Edit Data Barang Masuk</h2>
            <form action="pemasukan/proses_edit.php" method="POST">

                <!-- ID hidden untuk proses update -->
                <input type="hidden" name="id_masuk" value="<?= $data['id_masuk']; ?>">

                <div class="form-group">
                    <label for="tanggal_masuk">Tanggal Masuk</label>
                    <input type="date" id="tanggal_masuk" name="tanggal_masuk" value="<?= $data['tanggal_masuk']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="kode_buku">Judul Buku</label>
                    <select name="kode_buku" id = "kode_buku">
                    <option value="">-- Pilih Judul Buku--</option>
                    <?php 
                    $buku = mysqli_query($conn, "SELECT * FROM buku");
                    while($b = mysqli_fetch_assoc($buku)) {
                        $selected = ($b['kode_buku'] == $data['kode_buku']) ? "selected" : "";
                            echo "<option value='{$b['kode_buku']}' $selected>{$b['judul_buku']}</option>";
                        }
                    ?>
                </select>
                </div>

                <div class="form-group">
                    <label for="id_supplier">Nama Supplier</label>
                    <select name="id_supplier" id = "id_supplier">
                    <option value="">-- Pilih Nama Supplier--</option>
                    <?php 
                    $supplier = mysqli_query($conn, "SELECT * FROM supplier");
                    while($s = mysqli_fetch_assoc($supplier)) {
                        $selected = ($s['id_supplier'] == $data['id_supplier']) ? "selected" : "";
                            echo "<option value='{$s['id_supplier']}' $selected>{$s['nama_supplier']}</option>";
                        }
                    ?>
                </select>
                </div>

                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="text" id="jumlah" name="jumlah" value="<?= $data['jumlah']; ?>" required>
                </div>

                <button type="submit" class="btn-submit">Simpan</button>
                <a href="?page=view_pemasukan" class="btn-back">Kembali</a>
            </form>
        </div>
    </div>
</div>
