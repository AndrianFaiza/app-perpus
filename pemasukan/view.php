<div class="content">
    <div class="data-siswa">
        <div class="header-table">
            <h2>Data Barang Masuk</h2>
            <a href="?page=tambah_pemasukan" class="btn-tambah">+ Tambah Data Barang Masuk</a>
        </div>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Masuk</th>
                        <th>Judul Buku</th>
                        <th>Nama Supplier</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>   
                </thead>
                <tbody>
                <?php
                // ambil data barang_masuk
                // $query = "SELECT * FROM barang_masuk ORDER BY tanggal_masuk ASC";
                $query = "SELECT bm.id_masuk, bm.tanggal_masuk, buku.judul_buku, supplier.nama_supplier, bm.jumlah FROM barang_masuk AS bm
                INNER JOIN  supplier AS supplier ON bm.id_supplier = supplier.id_supplier
                INNER JOIN buku AS buku ON bm.kode_buku = buku.kode_buku
                ORDER BY bm.tanggal_masuk DESC";
                $result = mysqli_query($conn, $query);
                $no = 1;

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>".$no++."</td>
                                <td>".$row['tanggal_masuk']."</td>
                                <td>".$row['judul_buku']."</td>
                                <td>".$row['nama_supplier']."</td>
                                <td>".$row['jumlah']."</td>
                                <td class='table-action'>
                                    <a class='btn-edit' href='?page=edit_pemasukan&id_masuk=".$row['id_masuk']."' text-decoration:none;'>Edit</a> 
                                    <a class='btn-hapus' href='pemasukan/hapus.php?id_masuk=".$row['id_masuk']."' 
                                       text-decoration:none;' 
                                       onclick=\"return confirm('Yakin ingin menghapus data ini?');\">Hapus</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr>
                            <td colspan='8' style='text-align:center;'>Data Barang Masuk belum tersedia.</td>
                          </tr>";
                }

                // tutup koneksi
                mysqli_close($conn);
                ?>
            </tbody>
            </table>
    </div>
</div>