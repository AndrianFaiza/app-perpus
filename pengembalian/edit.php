<?php
include '../config/koneksi.php';

// Ambil data berdasarkan ID yang dikirim dari tombol Edit
if (isset($_GET['id_pengembalian'])) {
    $id_pengembalian = $_GET['id_pengembalian'];
    $query = "SELECT m.id_pengembalian, p.id_peminjaman, m.tanggal_dikembalikan, m.denda, m.id_users, u.nama FROM pengembalian m
                            INNER JOIN peminjaman AS p ON m.id_peminjaman = p.id_peminjaman
                            INNER JOIN users AS u ON m.id_users = u.id
                WHERE m.id_pengembalian = '$id_pengembalian'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result); 
    } else {
        echo "<script>alert('Data barang_masuk tidak ditemukan!'); window.location.href='?page=view_pengembalian';</script>";
        exit;
    }
} else {
    echo "<script>alert('ID barang_masuk tidak ditemukan!'); window.location.href='?page=view_pengembalian';</script>";
    exit;
}
?>

<div class="container">
    <div class="content">
        <div class="form-container">
            <h2>Edit Data Pengembalian</h2>
            <form action="pengembalian/proses_edit.php" method="POST">

                <!-- ID hidden untuk proses update -->
                <input type="hidden" name="id_pengembalian" value="<?= $data['id_pengembalian']; ?>">

                <div class="form-group">
                    <label for="id_peminjaman">ID Pengembalian</label>
                    <select name="id_peminjaman" id = "id_peminjaman">
                    <option value="">-- Pilih ID Pengembalian--</option>
                    <?php 
                    $peminjaman = mysqli_query($conn, "SELECT * FROM peminjaman");
                    while($s = mysqli_fetch_assoc($peminjaman)) {
                        $selected = ($s['id_peminjaman'] == $data['id_peminjaman']) ? "selected" : "";
                            echo "<option value='{$s['id_peminjaman']}' $selected>{$s['id_peminjaman']}</option>";
                        }
                    ?>
                </select>
                </div>

                <div class="form-group">
                    <label for="tanggal_dikembalikan">Tanggal Dikembalikan</label>
                    <input type="date" id="tanggal_dikembalikan" name="tanggal_dikembalikan" value="<?= $data['tanggal_dikembalikan']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="denda">Denda</label>
                    <input type="number" id="denda" name="denda" value="<?= $data['denda']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="id_users">Nama Petugas</label>
                    <select name="id_users" id = "id_users">
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

                <button type="submit" class="btn-submit">Simpan</button>
                <a href="?page=view_pengembalian" class="btn-back">Kembali</a>
            </form>
        </div>
    </div>
</div>
