<?php
include '../config/koneksi.php';

// Ambil data berdasarkan ID yang dikirim dari tombol Edit
if (isset($_GET['kode_buku'])) {
    $kode_buku = $_GET['kode_buku'];
    $query = "SELECT * FROM buku WHERE kode_buku = '$kode_buku'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Data buku tidak ditemukan!'); window.location.href='?page=view_buku';</script>";
        exit;
    }
} else {
    echo "<script>alert('ID buku tidak ditemukan!'); window.location.href='?page=view_buku';</script>";
    exit;
}
?>

<div class="container">
    <div class="content">
        <div class="form-container">
            <h2>Edit Data Buku</h2>
            <form action="buku/proses_edit.php" method="POST">

                <!-- ID hidden untuk proses update -->
                <input type="hidden" name="kode_buku" value="<?= $data['kode_buku']; ?>">

                <div class="form-group">
                    <label for="judul_buku">Judul Buku</label>
                    <input type="text" id="judul_buku" name="judul_buku" value="<?= $data['judul_buku']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="penerbit">Penerbit</label>
                    <input type="text" id="penerbit" name="penerbit" value="<?= $data['penerbit']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="tahun_terbit">Tahun Terbit</label>
                    <input type="text" id="tahun_terbit" name="tahun_terbit" value="<?= $data['tahun_terbit']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="pengarang">Pengarang</label>
                    <input type="text" id="pengarang" name="pengarang" value="<?= $data['pengarang']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="jumlah_buku">Jumlah Buku</label>
                    <input type="number" id="jumlah_buku" name="jumlah_buku" value="<?= $data['jumlah_buku']; ?>" required>
                </div>

                <button type="submit" class="btn-submit">Simpan</button>
                <a href="?page=view_buku" class="btn-back">Kembali</a>
            </form>
        </div>
    </div>
</div>
            </form>
        </div>
    </div>
</div>
