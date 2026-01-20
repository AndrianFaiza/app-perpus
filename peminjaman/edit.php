<?php
include '../config/koneksi.php';

// Ambil data berdasarkan ID yang dikirim dari tombol Edit
if (isset($_GET['id_peminjaman'])) {
    $id_peminjaman = $_GET['id_peminjaman'];
    $query = "SELECT p.id_peminjaman, p.id_siswa, s.nama_siswa, p.id_users, u.nama, p.tanggal_pinjam, p.tanggal_kembali, p.status,
                 d.id_detail, d.id_buku, d.jumlah, b.judul_buku
          FROM peminjaman p
          INNER JOIN siswa AS s on p.id_siswa = s.nis
          INNER JOIN users AS u ON p.id_users = u.id
          INNER JOIN detail_peminjaman d ON p.id_peminjaman = d.id_peminjaman
          INNER JOIN buku b ON d.id_buku = b.kode_buku
          WHERE p.id_peminjaman = '$id_peminjaman'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result); 
    } else {
        echo "<script>alert('Data barang_masuk tidak ditemukan!'); window.location.href='?page=view_peminjaman';</script>";
        exit;
    }
} else {
    echo "<script>alert('ID barang_masuk tidak ditemukan!'); window.location.href='?page=view_peminjaman';</script>";
    exit;
}
?>

<div class="container">
    <div class="content">
        <div class="form-container">
            <h2>Edit Data Peminjaman Buku</h2>
            <form action="peminjaman/proses_edit.php" method="POST">

                <!-- ID hidden untuk proses update -->
                <input type="hidden" name="id_peminjaman" value="<?= $data['id_peminjaman']; ?>">

                <div class="form-group">
                    <label for="nis">Nama Siswa</label>
                    <select name="nis" id = "nis">
                    <option value="">-- Pilih Nama Siswa--</option>
                    <?php 
                    $siswa = mysqli_query($conn, "SELECT * FROM siswa");
                    while($s = mysqli_fetch_assoc($siswa)) {
                        $selected = ($s['nis'] == $data['id_siswa']) ? "selected" : "";
                            echo "<option value='{$s['nis']}' $selected>{$s['nama_siswa']}</option>";
                        }
                    ?>
                </select>
                </div>

                <div class="form-group">
                    <label for="id_petugas">Nama Petugas</label>
                    <select name="id_petugas" id = "id_petugas">
                    <option value="">-- Pilih Nama Petugas--</option>
                    <?php 
                    $users = mysqli_query($conn, "SELECT * FROM users");
                    while($u = mysqli_fetch_assoc($users)) {
                        $selected = ($u['id'] == $data['id_users']) ? "selected" : "";
                            echo "<option value='{$u['id']}' $selected>{$u['nama']}</option>";
                        }
                    ?>
                </select>
                </div>

                <div class="form-group">
                    <label for="tanggal_pinjam">Tanggal Pinjam</label>
                    <input type="date" id="tanggal_pinjam" name="tanggal_pinjam" value="<?= $data['tanggal_pinjam']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="tanggal_kembali">Tanggal Kembali</label>
                    <input type="date" id="tanggal_kembali" name="tanggal_kembali" value="<?= $data['tanggal_kembali']; ?>" required>
                </div>

                <input type="hidden" name="id_detail" value="<?= $data['id_detail']; ?>">

                <div class="form-group">
                    <label for="id_buku">Judul Buku</label>
                    <select name="id_buku" id = "id_buku">
                    <option value="">-- Pilih Judul Buku--</option>
                    <?php 
                    $buku = mysqli_query($conn, "SELECT * FROM buku");
                    while($u = mysqli_fetch_assoc($buku)) {
                        $selected = ($u['kode_buku'] == $data['id_buku']) ? "selected" : "";
                            echo "<option value='{$u['kode_buku']}' $selected>{$u['judul_buku']}</option>";
                        }
                    ?>
                </select>
                </div>

                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" id="jumlah" name="jumlah" value="<?= $data['jumlah']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status" required>
                        <option value="dipinjam" <?= $data['status'] == 'dipinjam' ? 'selected' : ''; ?>>dipinjam</option>
                        <option value="dikembalikan" <?= $data['status'] == 'dikembalikan' ? 'selected' : ''; ?>>dikembalikan</option>
                        <option value="terlambat" <?= $data['status'] == 'terlambat' ? 'selected' : ''; ?>>terlambat</option>
                    </select>
                </div>

                <button type="submit" class="btn-submit">Simpan</button>
                <a href="?page=view_peminjaman" class="btn-back">Kembali</a>
            </form>
        </div>
    </div>
</div>
