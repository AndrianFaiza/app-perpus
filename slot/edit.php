<?php
include '../config/koneksi.php';

// Ambil data berdasarkan ID yang dikirim dari tombol Edit
if (isset($_GET['id_slot'])) {
    $id_slot = $_GET['id_slot'];
    $query = "SELECT * FROM slot_rak WHERE id_slot = '$id_slot'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Data slot_rak tidak ditemukan!'); window.location.href='?page=view_slot';</script>";
        exit;
    }
} else {
    echo "<script>alert('ID slot_rak tidak ditemukan!'); window.location.href='?page=view_slot';</script>";
    exit;
}
?>

<div class="container">
    <div class="content">
        <div class="form-container">
            <h2>Edit Data Slot Rak</h2>
            <form action="slot/proses_edit.php" method="POST">

                <!-- ID hidden untuk proses update -->
                <input type="hidden" name="id_slot" value="<?= $data['id_slot']; ?>">

                <div class="form-group">
                    <label for="id_rak">ID Rak</label>
                    <input type="text" id="id_rak" name="id_rak" value="<?= $data['id_rak']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="baris">Baris</label>
                    <input type="text" id="baris" name="baris" value="<?= $data['baris']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="kolom">Kolom</label>
                    <input type="text" id="kolom" name="kolom" value="<?= $data['kolom']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="kapasitas_slot">Kapasitas Slot</label>
                    <input type="text" id="kapasitas_slot" name="kapasitas_slot" value="<?= $data['kapasitas_slot']; ?>" required>
                </div>

                <button type="submit" class="btn-submit">Simpan</button>
                <a href="?page=view_slot" class="btn-back">Kembali</a>
            </form>
        </div>
    </div>
</div>
            </form>
        </div>
    </div>
</div>
