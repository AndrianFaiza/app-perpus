<div class="container">
    <div class="content">
        <div class="form-container">
            <h2>Tambah Data Buku</h2>
            <form action="buku/proses_tambah.php" method="POST">
                
                <div class="form-group">
                    <label for="judul_buku">Judul Buku</label>
                    <input type="text" id="judul_buku" name="judul_buku" placeholder="Masukkan judul buku" required>
                </div>

                <div class="form-group">
                    <label for="penerbit">Penerbit</label>
                    <input type="text" id="penerbit" name="penerbit" placeholder="Masukkan penerbit" required>
                </div>

                <div class="form-group">
                    <label for="tahun_terbit">Tahun Terbit</label>
                    <input type="text" id="tahun_terbit" name="tahun_terbit" placeholder="Masukkan tahun terbit" required>
                </div>

                <div class="form-group">
                    <label for="pengarang">Pengarang</label>
                    <input type="text" id="pengarang" name="pengarang" placeholder="Masukkan pengarang" required>
                </div>

                <div class="form-group">
                    <label for="jumlah_buku">Jumlah Buku</label>
                    <input type="number" id="jumlah_buku" name="jumlah_buku" placeholder="Masukkan jumlah buku" required>
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