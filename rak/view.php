<div class="content">
    <div class="data-siswa">
        <div class="header-table">
            <h2>Data Rak Buku</h2>
            <a href="?page=tambah_rak" class="btn-tambah">+ Tambah Data Rak Buku</a>
        </div>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Rak</th>
                        <th>Nama Rak</th>
                        <th>Lokasi</th>
                        <th>Kapasitas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                // ambil data rak
                $query = "SELECT * FROM rak ORDER BY kode_rak ASC";
                $result = mysqli_query($conn, $query);
                $no = 1;

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>".$no++."</td>
                                <td>".$row['kode_rak']."</td>
                                <td>".$row['nama_rak']."</td>
                                <td>".$row['lokasi']."</td>
                                <td>".$row['kapasitas']."</td>
                                <td class='table-action'>
                                    <a class='btn-edit' href='?page=edit_rak&id_rak=".$row['id_rak']."' text-decoration:none;'>Edit</a> 
                                    <a class='btn-hapus' href='rak/hapus.php?id_rak=".$row['id_rak']."' 
                                       text-decoration:none;' 
                                       onclick=\"return confirm('Yakin ingin menghapus data ini?');\">Hapus</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr>
                            <td colspan='8' style='text-align:center;'>Data rak belum tersedia.</td>
                          </tr>";
                }

                // tutup koneksi
                mysqli_close($conn);
                ?>
            </tbody>
            </table>
    </div>
</div>