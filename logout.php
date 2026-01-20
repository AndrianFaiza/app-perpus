<?php
session_start();       // Memulai sesi untuk memastikan sesi aktif
session_destroy();     // Menghapus semua data sesi (logout user)
header("Location: login.php");  // Mengarahkan kembali ke halaman login
exit;                  // Menghentikan eksekusi script setelah redirect
?>