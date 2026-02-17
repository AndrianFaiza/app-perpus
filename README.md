# Library Management System (PHP & MySQL)

A simple *PHP & MySQL library management system* for learning or assignment purposes.

## Login
Username : admin | Password : 12345

## Database Template
SQL template is located at:
app-perpus/assets/perpustakaan.sql

### Import SQL to phpMyAdmin
1. Open phpMyAdmin: http://localhost/phpmyadmin
2. Create a new database, e.g., perpustakaan
3. Select the database → *Import*
4. Choose app-perpus/assets/perpustakaan.sql
5. Click *Go* to execute the SQL

After importing, all tables (buku, siswa, rak, peminjaman, pengembalian, pemasukan) and sample data (if included) will be ready.

## Running the Project
1. Copy the project folder to your server directory (htdocs for XAMPP)
2. Start *Apache* and *MySQL*
3. Configure database in config/koneksi.php:
```php
<?php

$conn = mysqli_connect("localhost", "root", "", "perpustakaan");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
} else {
    echo "";
}

?>
