<?php
session_start();
include 'config/koneksi.php';

// Ambil input dari form login
$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

// Validasi input
if ($username === '' || $password === '') {
    echo "<script>
            alert('Username atau password belum diisi.');
            window.location='login.php';
          </script>";
    exit;
}

// Menggunakan prepared statement untuk mencegah SQL Injection
$stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

if ($user) {
    // Karena password disimpan dalam plain text (belum hash), lakukan perbandingan langsung
    if ($password === $user['password']) {
        // Login sukses, simpan data ke session
        $_SESSION['login'] = true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        header("Location: index.php"); // Arahkan ke halaman utama
        exit;
    } else {
        // Jika password salah
        echo "<script>
                alert('Login gagal: password salah.');
                window.location='login.php';
              </script>";
        exit;
    }
} else {
    // Jika username tidak ditemukan
    echo "<script>
            alert('Login gagal: user tidak ditemukan.');
            window.location='login.php';
          </script>";
    exit;
}
?>
