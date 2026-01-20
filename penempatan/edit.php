<?php
include '../config/koneksi.php';

// Ambil data berdasarkan ID yang dikirim dari tombol Edit
if (isset($_GET['id_penempatan']) && !empty($_GET['id_penempatan'])) {
    $id_penempatan = mysqli_real_escape_string($conn, $_GET['id_penempatan']);
    $query = "SELECT p.id_penempatan, b.kode_buku, b.judul_buku, 
                     r.id_slot, r.id_rak, 
                     p.tanggal_ditempatkan, p.status 
              FROM penempatan_buku AS p
              INNER JOIN slot_rak AS r ON p.id_slot = r.id_slot
              INNER JOIN buku AS b ON p.kode_buku = b.kode_buku
              WHERE p.id_penempatan = '$id_penempatan'";
    
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result); 
    } else {
        echo "<script>alert('Data penempatan tidak ditemukan!'); window.location.href='?page=view_penempatan';</script>";
        exit;
    }
} else {
    echo "<script>alert('ID penempatan tidak ditemukan!'); window.location.href='?page=view_penempatan';</script>";
    exit;
}
?>

<div class="container">
    <div class="content">
        <div class="form-container">
            <h2>Edit Data Penempatan Buku</h2>
            <form action="penempatan/proses_edit.php" method="POST">

                <!-- ID hidden untuk proses update -->
                <input type="hidden" name="id_penempatan" value="<?= $data['id_penempatan']; ?>">

                <div class="form-group">
                    <label for="tanggal_ditempatkan">Tanggal Ditempatkan</label>
                    <input type="date" id="tanggal_ditempatkan" name="tanggal_ditempatkan" 
                           value="<?= $data['tanggal_ditempatkan']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="kode_buku">Judul Buku</label>
                    <select name="kode_buku" id="kode_buku">
                        <option value="">-- Pilih Judul Buku --</option>
                        <?php 
                        $buku = mysqli_query($conn, "SELECT * FROM buku");
                        while ($b = mysqli_fetch_assoc($buku)) {
                            $selected = ($b['kode_buku'] == $data['kode_buku']) ? "selected" : "";
                            echo "<option value='{$b['kode_buku']}' $selected>{$b['judul_buku']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="id_slot">Nama Slot Rak</label>
                    <select name="id_slot" id="id_slot">
                        <option value="">-- Pilih Nama Slot Rak --</option>
                        <?php 
                        $slot_rak = mysqli_query($conn, "SELECT * FROM slot_rak");
                        while ($r = mysqli_fetch_assoc($slot_rak)) {
                            $selected = ($r['id_slot'] == $data['id_slot']) ? "selected" : "";
                            echo "<option value='{$r['id_slot']}' $selected>{$r['id_rak']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status" required>
                        <option value="tersedia" <?= $data['status'] == 'tersedia' ? 'selected' : ''; ?>>tersedia</option>
                        <option value="dipinjam" <?= $data['status'] == 'dipinjam' ? 'selected' : ''; ?>>dipinjam</option>
                    </select>
                </div>

                <button type="submit" class="btn-submit">Simpan</button>
                <a href="?page=view_penempatan" class="btn-back">Kembali</a>
            </form>
        </div>
    </div>
</div>
