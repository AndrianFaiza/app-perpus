<div class="container">
    <div class="content">
        <div class="form-container">
            <h2>Tambah Data Peminjaman Buku</h2>
            <form action="peminjaman/proses_tambah.php" method="POST">
                
                <div class="form-group">
                    <label for ="nis">Nama Siswa</label>
                    <select name="nis" id = "nis">
                    <option value="">-- Pilih Nama Siswa--</option>
                    <?php 
                    $siswa = mysqli_query($conn, "SELECT * FROM siswa");
                    while($s = mysqli_fetch_assoc($siswa)) {
                            echo "<option value='{$s['nis']}'>{$s['nama_siswa']}</option>";
                        }
                    ?>
                </select>
                </div>

                <div class="form-group">
                    <label for ="id_petugas">Nama Petugas</label>
                    <select name="id_petugas" id = "id_petugas">
                    <option value="">-- Pilih Nama Petugas--</option>
                    <?php 
                    $users = mysqli_query($conn, "SELECT * FROM users");
                    while($u = mysqli_fetch_assoc($users)) {
                            echo "<option value='{$u['id']}'>{$u['nama']}</option>";
                        }
                    ?>
                </select>
                </div>

                <div class="form-group">
                    <label for="tanggal_pinjam">Tanggal Pinjam</label>
                    <input type="date" name="tanggal_pinjam" id="tanggal_pinjam">
                </div>

                <div class="form-group">
                    <label for="tanggal_kembali">Tanggal Kembali</label>
                    <input type="date" name="tanggal_kembali" id="tanggal_kembali">
                </div>

                <div class="form-group">
                    <label for ="id_buku">Judul Buku</label>
                    <select name="id_buku" id = "id_buku">
                    <option value="">-- Pilih Judul Buku--</option>
                    <?php 
                    $buku = mysqli_query($conn, "SELECT * FROM buku");
                    while($u = mysqli_fetch_assoc($buku)) {
                            echo "<option value='{$u['kode_buku']}'>{$u['judul_buku']}</option>";
                        }
                    ?>
                </select>
                </div>

                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" name="jumlah" id="jumlah" placeholder="Masukan Jumlah Buku">
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" value="dipinjam" disabled>
                    <input type="hidden" name="status" value="dipinjam">
                </div>

                <button type="submit" class="btn-submit">Simpan</button>
                <a href="?page=view_peminjaman" class="btn-back">Kembali</a>
            </form>
        </div>
    </div>
</div>