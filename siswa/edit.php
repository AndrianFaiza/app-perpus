<?php
include '../config/koneksi.php';

// Ambil data berdasarkan ID yang dikirim dari tombol Edit
if (isset($_GET['nis'])) {
    $nis = $_GET['nis'];
    $query = "SELECT * FROM siswa WHERE nis = '$nis'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Data siswa tidak ditemukan!'); window.location.href='?page=view_siswa';</script>";
        exit;
    }
} else {
    echo "<script>alert('ID siswa tidak ditemukan!'); window.location.href='?page=view_siswa';</script>";
    exit;
}
?>

<div class="container">
    <div class="content">
        <div class="form-container">
            <h2>Edit Data Siswa</h2>
            <form action="siswa/proses_edit.php" method="POST">

                <!-- ID hidden untuk proses update -->
                <input type="hidden" name="nis" value="<?= $data['nis']; ?>">

                <div class="form-group">
                    <label for="nama_siswa">Nama Lengkap</label>
                    <input type="text" id="nama_siswa" name="nama_siswa" value="<?= $data['nama_siswa']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <select id="kelas" name="kelas" required>
                        <option value="">-- Pilih Kelas --</option>
                        <option value="10-A" <?= ($data['kelas'] == '10-A') ? 'selected' : ''; ?>>10-A</option>
                        <option value="10-B" <?= ($data['kelas'] == '10-B') ? 'selected' : ''; ?>>10-B</option>
                        <option value="10-C" <?= ($data['kelas'] == '10-C') ? 'selected' : ''; ?>>10-C</option>
                        <option value="11-A" <?= ($data['kelas'] == '11-A') ? 'selected' : ''; ?>>11-A</option>
                        <option value="11-B" <?= ($data['kelas'] == '11-B') ? 'selected' : ''; ?>>11-B</option>
                        <option value="11-C" <?= ($data['kelas'] == '11-C') ? 'selected' : ''; ?>>11-C</option>
                        <option value="12-A" <?= ($data['kelas'] == '12-A') ? 'selected' : ''; ?>>12-A</option>
                        <option value="12-B" <?= ($data['kelas'] == '12-B') ? 'selected' : ''; ?>>12-B</option>
                        <option value="12-C" <?= ($data['kelas'] == '12-C') ? 'selected' : ''; ?>>12-C</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <select id="jurusan" name="jurusan" required>
                        <option value="">-- Pilih Jurusan --</option>
                        <option value="RPL" <?= ($data['jurusan'] == 'RPL') ? 'selected' : ''; ?>>Rekayasa Perangkat Lunak</option>
                        <option value="OTO" <?= ($data['jurusan'] == 'OTO') ? 'selected' : ''; ?>>Teknik Kendaraan Ringan</option>
                        <option value="AK" <?= ($data['jurusan'] == 'AK') ? 'selected' : ''; ?>>Akuntansi</option>
                        <option value="OTKP" <?= ($data['jurusan'] == 'OTKP') ? 'selected' : ''; ?>>Administrasi Perkantoran</option>
                        <option value="PM" <?= ($data['jurusan'] == 'PM') ? 'selected' : ''; ?>>Marketing</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="no_hp">No HP</label>
                    <input type="text" id="no_hp" name="no_hp" value="<?= $data['no_hp']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?= $data['email']; ?>" required>
                </div>

                <button type="submit" class="btn-submit">Simpan</button>
                <a href="?page=view_siswa" class="btn-back">Kembali</a>
            </form>
        </div>
    </div>
</div>
