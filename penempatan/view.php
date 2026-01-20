<div class="content">
    <div class="data-siswa">
        <div class="header-table">
            <h2>Data Penempatan Buku</h2>
            <a href="?page=tambah_penempatan" class="btn-tambah">+ Tambah Data Penempatan Buku</a>
        </div>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Nama Rak</th>
                        <th>Tanggal Ditempatkan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>   
                </thead>
                <tbody>
                <?php
                // ambil data barang_masuk
                // $query = "SELECT * FROM barang_masuk ORDER BY judul_buku ASC";
                $query = "SELECT p.id_penempatan, b.judul_buku, r.id_rak, p.tanggal_ditempatkan, p.status FROM penempatan_buku AS p
                            INNER JOIN slot_rak AS r ON p.id_slot = r.id_slot
                            INNER JOIN buku AS b ON p.kode_buku = b.kode_buku
                ORDER BY b.judul_buku DESC";
                $result = mysqli_query($conn, $query);
                $no = 1;

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>".$no++."</td>
                                <td>".$row['judul_buku']."</td>
                                <td>".$row['id_rak']."</td>
                                <td>".$row['tanggal_ditempatkan']."</td>
                                <td>".$row['status']."</td>
                                <td class='table-action'>
                                    <a class='btn-edit' href='?page=edit_penempatan&id_penempatan=".$row['id_penempatan']."' text-decoration:none;'>Edit</a> 
                                    <a class='btn-hapus' href='penempatan/hapus.php?id_penempatan=".$row['id_penempatan']."' 
                                       text-decoration:none;' 
                                       onclick=\"return confirm('Yakin ingin menghapus data ini?');\">Hapus</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr>
                            <td colspan='8' style='text-align:center;'>Data Penempatan Buku belum tersedia.</td>
                          </tr>";
                }

                // tutup koneksi
                mysqli_close($conn);
                ?>
            </tbody>
            </table>
    </div>
</div>