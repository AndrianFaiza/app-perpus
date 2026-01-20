<?php
include '../config/koneksi.php';
?>
<div class="content">

    <!-- Bagian 1 : Buku di Satu Rak -->
    <div class="data-siswa">
        <div class="header-table">
            <h2>Daftar Buku di Satu Rak</h2>
            <form method="GET" action="">
                <input type="hidden" name="page" value="view_search">
                <input type="text" name="rak" class="search" placeholder="Cari nama rak..."
                       value="<?php echo isset($_GET['rak']) ? htmlspecialchars($_GET['rak']) : ''; ?>">
                <button type="submit" class="btn-submit">Cari</button>
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Nama Rak</th>
                    <th>Baris</th>
                    <th>Kolom</th>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_GET['rak']) && $_GET['rak'] !== '') {
                    $nama_rak = mysqli_real_escape_string($conn, $_GET['rak']);
                    $query = "SELECT r.nama_rak, s.baris, s.kolom, b.judul_buku, b.pengarang
                              FROM penempatan_buku p
                              JOIN slot_rak s ON p.id_slot = s.id_slot
                              JOIN rak r ON s.id_rak = r.id_rak
                              JOIN buku b ON p.kode_buku = b.kode_buku
                              WHERE r.nama_rak LIKE '%$nama_rak%'";
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                    <td>{$row['nama_rak']}</td>
                                    <td>{$row['baris']}</td>
                                    <td>{$row['kolom']}</td>
                                    <td>{$row['judul_buku']}</td>
                                    <td>{$row['pengarang']}</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Tidak ada buku ditemukan di rak tersebut.</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Masukkan nama rak untuk melihat daftar buku.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bagian 2 : Posisi Sebuah Buku -->
    <div class="data-siswa">
        <div class="header-table">
            <h2>Posisi Sebuah Buku</h2>
            <form method="GET" action="">
                <input type="hidden" name="page" value="view_search">
                <input type="text" name="buku" class="search" placeholder="Cari judul buku..."
                       value="<?php echo isset($_GET['buku']) ? htmlspecialchars($_GET['buku']) : ''; ?>">
                <button type="submit" class="btn-submit">Cari</button>
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Judul Buku</th>
                    <th>Nama Rak</th>
                    <th>Lokasi</th>
                    <th>Baris</th>
                    <th>Kolom</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_GET['buku']) && $_GET['buku'] !== '') {
                    $judul_buku = mysqli_real_escape_string($conn, $_GET['buku']);
                    $query2 = "SELECT b.judul_buku, r.nama_rak, r.lokasi, s.baris, s.kolom
                               FROM buku b
                               JOIN penempatan_buku p ON b.kode_buku = p.kode_buku
                               JOIN slot_rak s ON p.id_slot = s.id_slot
                               JOIN rak r ON s.id_rak = r.id_rak
                               WHERE b.judul_buku LIKE '%$judul_buku%'";
                    $result2 = mysqli_query($conn, $query2);
                    if (mysqli_num_rows($result2) > 0) {
                        while ($row = mysqli_fetch_assoc($result2)) {
                            echo "<tr>
                                    <td>{$row['judul_buku']}</td>
                                    <td>{$row['nama_rak']}</td>
                                    <td>{$row['lokasi']}</td>
                                    <td>{$row['baris']}</td>
                                    <td>{$row['kolom']}</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Buku dengan judul tersebut tidak ditemukan.</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Masukkan judul buku untuk mengetahui posisinya.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</div>
