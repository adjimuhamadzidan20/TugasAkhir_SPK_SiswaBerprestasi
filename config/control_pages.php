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
		else if ($pages === 'data_siswa') {
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
		else if ($pages == 'tambah_kriteria') {
			include 'pages/data_kriteria/tambah_kriteria.php';
		}
		else if($pages == 'edit_kriteria') {
			include 'pages/data_kriteria/edit_kriteria.php';
		}

		// halaman sub kriteria
		else if ($pages === 'sub_kriteria') {
			include 'pages/data_sub_kriteria/sub_kriteria.php';
		}
		else if ($pages === 'tambah_subkriteria') {
			include 'pages/data_sub_kriteria/tambah_subkriteria.php';
		}
		else if ($pages === 'edit_subkriteria') {
			include 'pages/data_sub_kriteria/edit_subkriteria.php';
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

		// halaman tentang spk
		else if ($pages === 'tentang') {
			include 'pages/informasi_lain/tentang_spk.php';
		}

		// halaman cara penggunaan
		else if ($pages === 'penggunaan') {
			include 'pages/informasi_lain/cara_penggunaan.php';
		}

		// halaman laporan
		else if ($pages === 'laporan_normalisasi') {
			include 'pages/laporan/laporan_normalisasi.php';
		}
		else if ($pages === 'laporan_perankingan') {
			include 'pages/laporan/laporan_perankingan.php';
		}

		else {
			include 'pages/error_404/error_404.php';
		}

	} else {
		include 'pages/dashboard/dashboard.php';
	}
	
?>