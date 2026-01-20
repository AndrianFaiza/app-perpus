<div class="container">
    <div class="content">
        <div class="form-container">
            <h2>Tambah Data Slot Rak</h2>
            <form action="slot/proses_tambah.php" method="POST">
                
                <div class="form-group">
                    <label for="id_rak">ID Rak</label>
                    <input type="text" id="id_rak" name="id_rak" placeholder="Masukkan ID Rak" required>
                </div>

                <div class="form-group">
                    <label for="baris">Baris</label>
                    <input type="text" id="baris" name="baris" placeholder="Masukkan baris" required>
                </div>

                <div class="form-group">
                    <label for="kolom">Kolom</label>
                    <input type="text" id="kolom" name="kolom" placeholder="Masukkan tahun terbit" required>
                </div>

                <div class="form-group">
                    <label for="kapasitas_slot">Kapasitas Slot</label>
                    <input type="text" id="kapasitas_slot" name="kapasitas_slot" placeholder="Masukkan kapasitas_slot" required>
                </div>

                <button type="submit" class="btn-submit">Simpan</button>
                <a href="?page=view_slot" class="btn-back">Kembali</a>
            </form>
        </div>
    </div>
</div>
            </form>
        </div>
    </div>
</div>