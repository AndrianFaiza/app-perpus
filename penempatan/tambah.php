<div class="container">
    <div class="content">
        <div class="form-container">
            <h2>Tambah Data Penempatan Buku</h2>
            <form action="penempatan/proses_tambah.php" method="POST">

                <div class="form-group">
                    <label for="kode_buku">Judul Buku</label>
                    <select name="kode_buku" id = "kode_buku">
                    <option value="">-- Pilih Judul Buku--</option>
                    <?php 
                    $buku = mysqli_query($conn, "SELECT * FROM buku");
                    while($b = mysqli_fetch_assoc($buku)) {
                            echo "<option value='{$b['kode_buku']}'>{$b['judul_buku']}</option>";
                        }
                    ?>
                </select>
                </div>

                <div class="form-group">
                    <label for="id_slot">ID Rak</label>
                    <select name="id_slot" id = "id_slot">
                    <option value="">-- Pilih Nama Rak--</option>
                    <?php 
                    $slot_rak = mysqli_query($conn, "SELECT * FROM slot_rak");
                    while($s = mysqli_fetch_assoc($slot_rak)) {
                            echo "<option value='{$s['id_slot']}'>{$s['id_rak']}</option>";
                        }
                    ?>
                </select>
                </div>

                

                <div class="form-group">
                    <label for="tanggal_ditempatkan">Tanggal Ditempatkan</label>
                    <input type="date" id="tanggal_ditempatkan" name="tanggal_ditempatkan" placeholder="Masukkan Tanggal Masuk" required>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="Tersedia">Tersedia</option>
                        <option value="Dipinjam">Dipinjam</option>
                    </select>
                </div>
                <button type="submit" class="btn-submit">Simpan</button>
                <a href="?page=view_penempatan" class="btn-back">Kembali</a>
            </form>
        </div>
    </div>
</div>