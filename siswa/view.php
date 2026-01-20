<div class="content">
    <div class="data-siswa">
        <div class="header-table">
            <h2>Data Siswa</h2>
            <a href="?page=tambah_siswa" class="btn-tambah">+ Tambah Data Siswa</a>
        </div>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama Lengkap</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>No HP</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                // ambil data siswa
                $query = "SELECT * FROM siswa ORDER BY kelas, nama_siswa ASC";
                $result = mysqli_query($conn, $query);
                $no = 1;

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>".$no++."</td>
                                <td>".$row['nis']."</td>
                                <td>".$row['nama_siswa']."</td>
                                <td>".$row['kelas']."</td>
                                <td>".$row['jurusan']."</td>
                                <td>".$row['no_hp']."</td>
                                <td>".$row['email']."</td>
                                <td class='table-action'>
                                    <a class='btn-edit' href='?page=edit_siswa&nis=".$row['nis']."' text-decoration:none;'>Edit</a> 
                                    <a class='btn-hapus' href='siswa/hapus.php?nis=".$row['nis']."' 
                                       text-decoration:none;' 
                                       onclick=\"return confirm('Yakin ingin menghapus data ini?');\">Hapus</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr>
                            <td colspan='8' style='text-align:center;'>Data siswa belum tersedia.</td>
                          </tr>";
                }

                // tutup koneksi
                mysqli_close($conn);
                ?>
            </tbody>
            </table>
    </div>
</div>