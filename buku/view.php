<div class="content">
    <div class="data-siswa">
        <div class="header-table">
            <h2>Data Buku</h2>
            <a href="?page=tambah_buku" class="btn-tambah">+ Tambah Data Buku</a>
        </div>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Buku</th>
                        <th>Penerbit</th>
                        <th>Tahun Penerbit</th>
                        <th>Pengarang</th>
                        <th>Jumlah Buku</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                // ambil data buku
                $query = "SELECT * FROM buku ORDER BY judul_buku ASC";
                $result = mysqli_query($conn, $query);
                $no = 1;

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>".$no++."</td>
                                <td>".$row['judul_buku']."</td>
                                <td>".$row['penerbit']."</td>
                                <td>".$row['tahun_terbit']."</td>
                                <td>".$row['pengarang']."</td>
                                <td>".$row['jumlah_buku']."</td>
                                <td class='table-action'>
                                    <a class='btn-edit' href='?page=edit_buku&kode_buku=".$row['kode_buku']."' text-decoration:none;'>Edit</a> 
                                    <a class='btn-hapus' href='buku/hapus.php?kode_buku=".$row['kode_buku']."' 
                                       text-decoration:none;' 
                                       onclick=\"return confirm('Yakin ingin menghapus data ini?');\">Hapus</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr>
                            <td colspan='8' style='text-align:center;'>Data buku belum tersedia.</td>
                          </tr>";
                }

                // tutup koneksi
                mysqli_close($conn);
                ?>
            </tbody>
            </table>
    </div>
</div>