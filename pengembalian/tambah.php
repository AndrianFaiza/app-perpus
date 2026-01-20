<div class="container">
    <div class="content">
        <div class="form-container">
            <h2>Tambah Data Pengembalian</h2>
            <form action="pengembalian/proses_tambah.php" method="POST">
                
                <div class="form-group">
                    <label for ="id_peminjaman">ID Peminjaman</label>
                    <select name="id_peminjaman" id = "id_peminjaman">
                    <option value="">-- Pilih ID Peminjaman--</option>
                    <?php 
                    $peminjaman = mysqli_query($conn, "SELECT * FROM peminjaman");
                    while($s = mysqli_fetch_assoc($peminjaman)) {
                            echo "<option value='{$s['id_peminjaman']}'>{$s['id_peminjaman']}</option>";
                        }
                    ?>
                </select>
                </div>
                
                <div class="form-group">
                    <label for="tanggal_dikembalikan">Tanggal Dikembalikan</label>
                    <input type="date" id="tanggal_dikembalikan" name="tanggal_dikembalikan" placeholder="Masukkan Tanggal Dikembalikan" required>
                </div>

                <div class="form-group">
                    <label for="denda">Denda</label>
                    <input type="number" id="denda" name="denda" placeholder="Masukkan denda" required>
                </div>

                <div class="form-group">
                    <label for ="id_users">Nama Petugas</label>
                    <select name="id_users" id = "id_users">
                    <option value="">-- Pilih Judul Buku--</option>
                    <?php 
                    $users = mysqli_query($conn, "SELECT * FROM users");
                    while($u = mysqli_fetch_assoc($users)) {
                            echo "<option value='{$u['id']}'>{$u['nama']}</option>";
                        }
                    ?>
                </select>
                </div>

                <button type="submit" class="btn-submit">Simpan</button>
                <a href="?page=view_detail" class="btn-back">Kembali</a>
            </form>
        </div>
    </div>
</div>