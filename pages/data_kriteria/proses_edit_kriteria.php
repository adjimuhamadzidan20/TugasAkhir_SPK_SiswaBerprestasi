<?php 
  session_start();
	require '../../config/connect_db.php';

	// proses edit
	$id = $_GET['id'];
	$kriteria = htmlspecialchars($_POST['nama_kriteria']);
  $bobot = htmlspecialchars($_POST['bobot']);
  $atribut = htmlspecialchars($_POST['atribut']);

  $sql = "UPDATE data_kriteria SET Nama_Kriteria = '$kriteria', Nilai_Bobot = '$bobot', Atribut = '$atribut'
  WHERE ID_Kriteria = '$id'";
  $send = mysqli_query($koneksi_db, $sql);

  if ($send) {
    $_SESSION['pesan'] = 'Kriteria berhasil terubah!';
    $_SESSION['status'] = 'success';
    header('Location: ../../index.php?page=data_kriteria');
    exit;
  } 
  else {
    $_SESSION['pesan'] = 'Kriteria gagal terubah!';
    $_SESSION['status'] = 'danger';
    header('Location: ../../index.php?page=data_kriteria');
    exit;
  }
  
?>