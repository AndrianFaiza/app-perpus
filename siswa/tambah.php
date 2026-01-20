<div class="container">
    <div class="content">
        <div class="form-container">
            <h2>Tambah Data Siswa</h2>
            <form action="siswa/proses_tambah.php" method="POST">
                
                <div class="form-group">
                    <label for="nis">NIS</label>
                    <input type="text" id="nis" name="nis" placeholder="Masukkan NIS" required>
                </div>

                <div class="form-group">
                    <label for="nama_siswa">Nama Lengkap</label>
                    <input type="text" id="nama_siswa" name="nama_siswa" placeholder="Masukkan nama_siswa lengkap" required>
                </div>

                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <select id="kelas" name="kelas" required>
                        <option value="">-- Pilih Kelas --</option>
                        <option value="10-A">10-A</option>
                        <option value="10-B">10-B</option>
                        <option value="10-C">10-C</option>
                        <option value="11-A">11-A</option>
                        <option value="11-B">11-B</option>
                        <option value="11-C">11-C</option>
                        <option value="12-A">12-A</option>
                        <option value="12-B">12-B</option>
                        <option value="12-C">12-C</option>
                       
                    </select>
                </div>

                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <select id="jurusan" name="jurusan" required>
                        <option value="">-- Pilih Jurusan --</option>
                        <option value="RPL">Rekayasa Perangkat Lunak</option>
                        <option value="OTO">Teknik Kendaraan Ringan</option>
                        <option value="AK">Akuntansi</option>
                        <option value="OTKP">Administrasi Perkantoran</option>
                        <option value="PM">Marketing</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="no_hp">No HP</label>
                    <input type="text" id="no_hp" name="no_hp" placeholder="Masukkan No HP" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan email siswa" required>
                </div>

                <button type="submit" class="btn-submit">Simpan</button>
                <a href="?page=view_siswa" class="btn-back">Kembali</a>
            </form>
        </div>
    </div>
</div>