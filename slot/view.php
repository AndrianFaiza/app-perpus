<div class="content">
    <div class="data-siswa">
        <div class="header-table">
            <h2>Data Slot Rak</h2>
            <a href="?page=tambah_slot" class="btn-tambah">+ Tambah Data Slot Rak</a>
        </div>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Rak</th>
                        <th>Baris</th>
                        <th>Kolom</th>
                        <th>Kapasitas Slot</th>
                        <th>Aksi</th>
                    </tr>   
                </thead>
                <tbody>
                <?php
                // ambil data slot_rak
                $query = "SELECT * FROM slot_rak ORDER BY id_rak ASC";
                // $query = "SELECT bm.id_rak, bm.id_rak, buku.baris, supplier.kolom, bm.kapasitas_slot FROM slot_rak AS bm
                // INNER JOIN  supplier AS supplier ON bm.id_supplier = supplier.id_supplier
                // INNER JOIN buku AS buku ON bm.kode_buku = buku.kode_buku
                // ORDER BY bm.id_rak DESC";
                // $query = "SELECT s.id_slot, s.id_rak, r.id_rak, s.baris, s.kolom, s.kapasitas_slot FROM slot_rak AS s
                // INNER JOIN rak AS r ON s.id_rak = r.id_rak
                // ORDER BY s.id_rak DESC";
                $result = mysqli_query($conn, $query);
                $no = 1;

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>".$no++."</td>
                                <td>".$row['id_rak']."</td>
                                <td>".$row['baris']."</td>
                                <td>".$row['kolom']."</td>
                                <td>".$row['kapasitas_slot']."</td>
                                <td class='table-action'>
                                    <a class='btn-edit' href='?page=edit_slot&id_slot=".$row['id_slot']."' text-decoration:none;'>Edit</a> 
                                    <a class='btn-hapus' href='slot/hapus.php?id_slot=".$row['id_slot']."' 
                                       text-decoration:none;' 
                                       onclick=\"return confirm('Yakin ingin menghapus data ini?');\">Hapus</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr>
                            <td colspan='8' style='text-align:center;'>Data Slot Rak belum tersedia.</td>
                          </tr>";
                }

                // tutup koneksi
                mysqli_close($conn);
                ?>
            </tbody>
            </table>
    </div>
</div>