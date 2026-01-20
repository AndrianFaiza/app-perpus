<div class="container">
    <div class="content">
        <div class="form-container">
            <h2>Tambah Data Barang Masuk</h2>
            <form action="pemasukan/proses_tambah.php" method="POST">
                
                <div class="form-group">
                    <label for="tanggal_masuk">Tanggal Masuk</label>
                    <input type="date" id="tanggal_masuk" name="tanggal_masuk" placeholder="Masukkan Tanggal Masuk" required>
                </div>

                <div class="form-group">
                    <label for ="kode_buku">Judul Buku</label>
                    <select name="kode_buku" id = "kode_buku">
                    <option value="">-- Pilih Judul Buku--</option>
                    <?php 
                    $buku = mysqli_query($conn, "SELECT * FROM buku");
                    while($b = mysqli_fetch_assoc($buku)) {
                            echo "<option value='{$b['kode_buku']}'>{$b['judul_buku']}</option>";
                        }
                    ?>
                </select>
                    <!-- <label for="kode_buku">Judul Buku</label>
                    <input type="text" id="kode_buku" name="kode_buku" placeholder="Masukkan Judul Buku" required> -->
                </div>

                <div class="form-group">
                    <label for="id_supplier">Nama Supplier</label>
                    <select name="id_supplier" id = "id_supplier">
                    <option value="">-- Pilih Nama Supplier--</option>
                    <?php 
                    $supplier = mysqli_query($conn, "SELECT * FROM supplier");
                    while($s = mysqli_fetch_assoc($supplier)) {
                            echo "<option value='{$s['id_supplier']}'>{$s['nama_supplier']}</option>";
                        }
                    ?>
                </select>
                </div>

                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" id="jumlah" name="jumlah" placeholder="Masukkan jumlah pemasukan" required>
                </div>

                <button type="submit" class="btn-submit">Simpan</button>
                <a href="?page=view_pemasukan" class="btn-back">Kembali</a>
            </form>
        </div>
    </div>
</div>