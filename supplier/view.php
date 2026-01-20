<div class="content">
    <div class="data-siswa">
        <div class="header-table">
            <h2>Data Supplier</h2>
            <a href="?page=tambah_supplier" class="btn-tambah">+ Tambah Data Supplier</a>
        </div>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Perusahaan</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                // ambil data supplier
                $query = "SELECT * FROM supplier ORDER BY nama_supplier ASC";
                $result = mysqli_query($conn, $query);
                $no = 1;

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>".$no++."</td>
                                <td>".$row['nama_supplier']."</td>
                                <td>".$row['nama_perusahaan']."</td>
                                <td>".$row['alamat']."</td>
                                <td>".$row['email']."</td>
                                <td>".$row['no_hp']."</td>
                                <td class='table-action'>
                                    <a class='btn-edit' href='?page=edit_supplier&id_supplier=".$row['id_supplier']."' text-decoration:none;'>Edit</a> 
                                    <a class='btn-hapus' href='supplier/hapus.php?id_supplier=".$row['id_supplier']."' 
                                       text-decoration:none;' 
                                       onclick=\"return confirm('Yakin ingin menghapus data ini?');\">Hapus</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr>
                            <td colspan='8' style='text-align:center;'>Data supplier belum tersedia.</td>
                          </tr>";
                }

                // tutup koneksi
                mysqli_close($conn);
                ?>
            </tbody>
            </table>
    </div>
</div>