<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">

<?php
    include 'config/koneksi.php';
    include 'template/header.php';
    include 'template/sidebar.php';
?>        

<?php
session_start();
if (!isset($_SESSION['login'])){
	header("location: login.php");
	exit;
}
?>

<?php

error_reporting(0);
switch ($_GET['page']) {
	default:
			include 'template/content.php';
		break;

	case 'dashboard';
		 include 'template/content.php';
	break;
	
// link menu siswa ==========================================

	case 'view_siswa';
			 include 'siswa/view.php';
	break;

    case 'tambah_siswa';
			 include 'siswa/tambah.php';
	break;

    case 'edit_siswa';
			 include 'siswa/edit.php';
	break;

	// link menu buku ==========================================

	case 'view_buku';
			 include 'buku/view.php';
	break;

    case 'tambah_buku';
			 include 'buku/tambah.php';
	break;

    case 'edit_buku';
			 include 'buku/edit.php';
	break;

	// link menu supplier ==========================================

	case 'view_supplier';
			 include 'supplier/view.php';
	break;

    case 'tambah_supplier';
			 include 'supplier/tambah.php';
	break;

    case 'edit_supplier';
			 include 'supplier/edit.php';
	break;

	// link menu barang masuk ==========================================

	case 'view_pemasukan';
			 include 'pemasukan/view.php';
	break;

    case 'tambah_pemasukan';
			 include 'pemasukan/tambah.php';
	break;

    case 'edit_pemasukan';
			 include 'pemasukan/edit.php';
	break;

// link menu rak ==========================================

	case 'view_rak';
			 include 'rak/view.php';
	break;

    case 'tambah_rak';
			 include 'rak/tambah.php';
	break;

    case 'edit_rak';
			 include 'rak/edit.php';
	break;

	// link menu slot ==========================================

	case 'view_slot';
			 include 'slot/view.php';
	break;

    case 'tambah_slot';
			 include 'slot/tambah.php';
	break;

    case 'edit_slot';
			 include 'slot/edit.php';
	break;

	// link menu penempatan ==========================================

	case 'view_penempatan';
			 include 'penempatan/view.php';
	break;

    case 'tambah_penempatan';
			 include 'penempatan/tambah.php';
	break;

    case 'edit_penempatan';
			 include 'penempatan/edit.php';
	break;

	// link menu search ==========================================

	case 'view_search';
			 include 'search/view.php';
	break;

	// link menu peminjaman ==========================================

	case 'view_peminjaman';
			 include 'peminjaman/view.php';
	break;

	case 'view_detail';
			 include 'peminjaman/detail.php';
	break;

    case 'tambah_peminjaman';
			 include 'peminjaman/tambah.php';
	break;

    case 'edit_peminjaman';
			 include 'peminjaman/edit.php';
	break;
	case 'ubah_status';
			 include 'peminjaman/ubah_status.php';
	break;

	// link menu pengembalian ==========================================

	case 'view_pengembalian';
			 include 'pengembalian/view.php';
	break;

    case 'tambah_pengembalian';
			 include 'pengembalian/tambah.php';
	break;

    case 'edit_pengembalian';
			 include 'pengembalian/edit.php';
	break;

}

?>
    </div>
</body>
</html>