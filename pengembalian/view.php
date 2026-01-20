<div class="content">
    <div class="data-siswa">
        <div class="header-table">
            <h2>Data Pengembalian</h2>
        </div>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Peminjaman</th>
                        <th>Tanggal Dikembalikan</th>
                        <th>Denda</th>
                        <th>Nama Petugas</th>
                        <th>Aksi</th>
                    </tr>   
                </thead>
                <tbody>
                <?php
                // ambil data barang_masuk
                // $query = "SELECT * FROM barang_masuk ORDER BY tanggal_masuk ASC";
                $query = "SELECT m.id_pengembalian, p.id_peminjaman, m.tanggal_dikembalikan, m.denda, u.nama FROM pengembalian m
                            INNER JOIN peminjaman AS p ON m.id_peminjaman = p.id_peminjaman
                            INNER JOIN users AS u ON m.id_users = u.id
                            ORDER BY m.tanggal_dikembalikan ASC";
                $result = mysqli_query($conn, $query);
                $no = 1;

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>".$no++."</td>
                                <td>".$row['id_peminjaman']."</td>
                                <td>".$row['tanggal_dikembalikan']."</td>
                                <td>".$row['denda']."</td>
                                <td>".$row['nama']."</td>
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