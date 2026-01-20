<div class="content">
    <div class="data-siswa">
        <div class="header-table">
            <h2>Data Peminjaman</h2>
            <a href="?page=tambah_peminjaman" class="btn-tambah">+ Tambah Data Peminjaman</a>
        </div>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Peminjaman</th>
                        <th>Nama Siswa</th>
                        <th>Petugas</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>   
                </thead>
                <tbody>
                <?php
                // ambil data barang_masuk
                // $query = "SELECT * FROM barang_masuk ORDER BY tanggal_masuk ASC";
                $query = "SELECT p.id_peminjaman, s.nama_siswa, u.nama, p.tanggal_pinjam, p.tanggal_kembali, status FROM peminjaman p
                            INNER JOIN siswa AS s on p.id_siswa = s.nis
                            INNER JOIN users AS u ON p.id_users = u.id
                            ORDER BY status ASC";
                $result = mysqli_query($conn, $query);
                $no = 1;

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>".$no++."</td>
                                <td>".$row['id_peminjaman']."</td>
                                <td>".$row['nama_siswa']."</td>
                                <td>".$row['nama']."</td>
                                <td>".$row['tanggal_pinjam']."</td>
                                <td>".$row['tanggal_kembali']."</td>
                                <td>".$row['status']."</td>
                                <td class='table-action'>
                                    <a class='btn-edit' href='?page=edit_peminjaman&id_peminjaman=".$row['id_peminjaman']."' style='text-decoration:none;'>Edit</a>
                                    <a class='btn-detail' href='?page=view_detail&id_peminjaman=".$row['id_peminjaman']."' style='text-decoration:none;'>Detail</a>";
                                    if ($row['status'] == 'dipinjam') {
                                        echo "<a class='btn-dikembalikan' href='?page=ubah_status&id_peminjaman=".$row['id_peminjaman']."' style='text-decoration:none;'>Dikembalikan</a>
                                        <a class='btn-hapus' href='peminjaman/hapus.php?id_peminjaman=".$row['id_peminjaman']."' 
                                        style='text-decoration:none;' 
                                        onclick=\"return confirm('Yakin ingin menghapus data ini?');\">Hapus</a>";
                                } else {
                                    echo "<span style='font-size:15px; color:blue;'></span>";
                                }

                                echo "</td>
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