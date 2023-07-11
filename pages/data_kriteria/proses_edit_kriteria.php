<?php 
	require '../../config/connect_db.php';

	// proses edit
	$id = $_GET['id'];
	$kriteria = htmlspecialchars($_POST['nama_kriteria']);
  $bobot = htmlspecialchars($_POST['bobot']);
  $atribut = htmlspecialchars($_POST['atribut']);

  $sql = "UPDATE data_kriteria SET Nama_Kriteria = '$kriteria', Nilai_Bobot = '$bobot', Atribut = '$atribut'
  WHERE ID_Kriteria = '$id'";
  mysqli_query($koneksi_db, $sql);

  header('Location: ../../index.php?page=data_kriteria');
  exit;

?>