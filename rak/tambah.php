<div class="container">
    <div class="content">
        <div class="form-container">
            <h2>Tambah Data Rak</h2>
            <form action="rak/proses_tambah.php" method="POST">
                
                <div class="form-group">
                    <label for="kode_rak">Kode Rak</label>
                    <input type="text" id="kode_rak" name="kode_rak" placeholder="Masukkan Kode Rak" required>
                </div>

                <div class="form-group">
                    <label for="nama_rak">Nama Rak</label>
                    <input type="text" id="nama_rak" name="nama_rak" placeholder="Masukkan Nama Rak" required>
                </div>

                <div class="form-group">
                    <label for="lokasi">Lokasi</label>
                    <input type="text" id="lokasi" name="lokasi" placeholder="Masukkan Lokasi" required>
                </div>

                <div class="form-group">
                    <label for="kapasitas">Kapasitas</label>
                    <input type="number" id="kapasitas" name="kapasitas" placeholder="Masukkan Kapasitas" required>
                </div>

                <button type="submit" class="btn-submit">Simpan</button>
                <a href="?page=view_rak" class="btn-back">Kembali</a>
            </form>
        </div>
    </div>
</div>
            </form>
        </div>
    </div>
</div>