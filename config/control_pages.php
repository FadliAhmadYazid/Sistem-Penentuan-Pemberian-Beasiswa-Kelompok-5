<?php
	// koneksi db  
	require 'connect_db.php';
	error_reporting(E_ERROR | E_WARNING);

	if (isset($_GET['page'])) {
		$pages = $_GET['page'];

		// halaman dashboard
		if ($pages === 'dashboard') {
			include 'pages/dashboard/dashboard.php';
		}

		// halaman alternatif
		else if ($pages === 'data_mahasiswa') {
			include 'pages/data_alternatif/data_alternatif.php';
		}
		else if ($pages == 'tambah_alter') {
			include 'pages/data_alternatif/tambah_alternatif.php';
		}
		else if($pages == 'edit_alter') {
			include 'pages/data_alternatif/edit_alternatif.php';
		}

		// halaman kriteria
		else if ($pages === 'data_kriteria') {
			include 'pages/data_kriteria/data_kriteria.php';
		}

		// halaman penilaian
		else if ($pages === 'data_penilaian') {
			include 'pages/data_penilaian/data_penilaian.php';
		}
		else if ($pages === 'tambah_penilaian') {
			include 'pages/data_penilaian/tambah_penilaian.php';
		}
		else if ($pages === 'edit_penilaian') {
			include 'pages/data_penilaian/edit_penilaian.php';
		}

		// halaman proses Perhitungan
		else if ($pages === 'proses_perhitungan') {
			include 'pages/proses_perhitungan/proses_perhitungan.php';
		}

		// halaman hasil perhitungan 
		else if ($pages === 'hasil_perhitungan') {
			include 'pages/hasil_perhitungan/hasil_perhitungan.php';
		} 

		else {
			include 'pages/error_404/error_404.php';
		}

	} else {
		include 'pages/dashboard/dashboard.php';
	}
	
?>