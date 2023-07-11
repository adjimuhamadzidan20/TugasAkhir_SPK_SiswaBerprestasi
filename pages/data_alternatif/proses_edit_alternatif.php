<?php
	require '../../config/connect_db.php';

	// proses edit
	$id = $_GET['id'];  
	$nisn = htmlspecialchars($_POST['nisn']);
  $siswa = htmlspecialchars($_POST['nama_siswa']);
  $jk = htmlspecialchars($_POST['jenis_kelamin']);
  $kelas = htmlspecialchars($_POST['kelas']);

  $sql = "UPDATE data_alternatif SET NISN = '$nisn', Nama_Siswa = '$siswa', JK = '$jk', Kelas = '$kelas'
  WHERE ID_Alter = '$id'";
  mysqli_query($koneksi_db, $sql);

  header('Location: ../../index.php?page=data_siswa');
  exit;
  
?>