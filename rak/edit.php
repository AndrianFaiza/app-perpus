<?php
include '../config/koneksi.php';

// Ambil data berdasarkan ID yang dikirim dari tombol Edit
if (isset($_GET['id_rak'])) {
    $id_rak = $_GET['id_rak'];
    $query = "SELECT * FROM rak WHERE id_rak = '$id_rak'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Data rak tidak ditemukan!'); window.location.href='?page=view_rak';</script>";
        exit;
    }
} else {
    echo "<script>alert('ID rak tidak ditemukan!'); window.location.href='?page=view_rak';</script>";
    exit;
}
?>

<div class="container">
    <div class="content">
        <div class="form-container">
            <h2>Edit Data Rak</h2>
            <form action="rak/proses_edit.php" method="POST">

                <!-- ID hidden untuk proses update -->
                <input type="hidden" name="id_rak" value="<?= $data['id_rak']; ?>">

                <div class="form-group">
                    <label for="kode_rak">Judul Rak</label>
                    <input type="text" id="kode_rak" name="kode_rak" value="<?= $data['kode_rak']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="nama_rak">Nama Rak</label>
                    <input type="text" id="nama_rak" name="nama_rak" value="<?= $data['nama_rak']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="lokasi">Lokasi</label>
                    <input type="text" id="lokasi" name="lokasi" value="<?= $data['lokasi']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="kapasitas">Lokasi</label>
                    <input type="text" id="kapasitas" name="kapasitas" value="<?= $data['kapasitas']; ?>" required>
                </div>

                <button type="submit" class="btn-submit">Simpan</button>
                <a href="?page=view_rak" class="btn-back">Kembali</a>
            </form>
        </div>
    </div>
</div>
            </form>
        </div>
    </div>
</div>
