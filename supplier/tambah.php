<div class="container">
    <div class="content">
        <div class="form-container">
            <h2>Tambah Data Supplier</h2>
            <form action="supplier/proses_tambah.php" method="POST">
                
                <div class="form-group">
                    <label for="nama_supplier">Supplier</label>
                    <input type="text" id="nama_supplier" name="nama_supplier" placeholder="Masukkan Supplier" required>
                </div>

                <div class="form-group">
                    <label for="nama_perusahaan">Nama Perusahaan</label>
                    <input type="text" id="nama_perusahaan" name="nama_perusahaan" placeholder="Masukkan Nama Perusahaan" required>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" id="alamat" name="alamat" placeholder="Masukkan Alamat" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan email supplier" required>
                </div>

                <div class="form-group">
                    <label for="no_hp">No HP</label>
                    <input type="text" id="no_hp" name="no_hp" placeholder="Masukkan No HP" required>
                </div>

                <button type="submit" class="btn-submit">Simpan</button>
                <a href="?page=view_supplier" class="btn-back">Kembali</a>
            </form>
        </div>
    </div>
</div>