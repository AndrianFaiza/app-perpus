<?php
include '../config/koneksi.php';

// Ambil data berdasarkan ID yang dikirim dari tombol Edit
if (isset($_GET['id_supplier'])) {
    $id_supplier = $_GET['id_supplier'];
    $query = "SELECT * FROM supplier WHERE id_supplier = '$id_supplier'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Data supplier tidak ditemukan!'); window.location.href='?page=view_supplier';</script>";
        exit;
    }
} else {
    echo "<script>alert('ID supplier tidak ditemukan!'); window.location.href='?page=view_supplier';</script>";
    exit;
}
?>

<div class="container">
    <div class="content">
        <div class="form-container">
            <h2>Edit Data Supplier</h2>
            <form action="supplier/proses_edit.php" method="POST">

                <!-- ID hidden untuk proses update -->
                <input type="hidden" name="id_supplier" value="<?= $data['id_supplier']; ?>">

                <div class="form-group">
                    <label for="nama_supplier">Nama Supplier</label>
                    <input type="text" id="nama_supplier" name="nama_supplier" value="<?= $data['nama_supplier']; ?>" required>
                </div>


                <div class="form-group">
                    <label for="nama_perusahaan">Nama Supplier</label>
                    <input type="text" id="nama_perusahaan" name="nama_perusahaan" value="<?= $data['nama_perusahaan']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="alamat">alamat</label>
                    <input type="text" id="alamat" name="alamat" value="<?= $data['alamat']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?= $data['email']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="no_hp">No HP</label>
                    <input type="text" id="no_hp" name="no_hp" value="<?= $data['no_hp']; ?>" required>
                </div>

                <button type="submit" class="btn-submit">Simpan</button>
                <a href="?page=view_supplier" class="btn-back">Kembali</a>
            </form>
        </div>
    </div>
</div>
