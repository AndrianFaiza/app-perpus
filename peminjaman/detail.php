<div class="content">
    <div class="data-siswa">
        <div class="header-table">
            <h2>Data Detail Peminjaman</h2>
        </div>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Peminjaman</th>
                        <th>Judul Buku</th>
                        <th>Jumlah</th>
                    </tr>   
                </thead>
                <tbody>
                <?php
                // ambil data barang_masuk
                // $query = "SELECT * FROM barang_masuk ORDER BY tanggal_masuk ASC";
                $query = "SELECT d.id_detail, p.id_peminjaman, b.judul_buku, d.jumlah FROM detail_peminjaman d
                            INNER JOIN peminjaman AS p ON d.id_peminjaman = p.id_peminjaman
                            INNER JOIN buku AS b ON d.id_buku = b.kode_buku
                            ORDER BY p.id_peminjaman DESC";
                $result = mysqli_query($conn, $query);
                $no = 1;

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>".$no++."</td>
                                <td>".$row['id_peminjaman']."</td>
                                <td>".$row['judul_buku']."</td>
                                <td>".$row['jumlah']."</td>
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