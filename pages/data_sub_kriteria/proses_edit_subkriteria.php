<?php
  session_start();
	require '../../config/connect_db.php';

	// proses edit
	$idsub = $_GET['id'];  
	$idKriteria = htmlspecialchars($_POST['idkriteria']);
  $subkriteria = htmlspecialchars($_POST['sub_kriteria']);
  $keterangan = htmlspecialchars($_POST['ket']);
  $nilai = htmlspecialchars($_POST['nilai']);

  $sql = "UPDATE data_subkriteria SET ID_Kriteria = '$idKriteria', Nama_Subkriteria = '$subkriteria', 
  Keterangan = '$keterangan', Nilai = '$nilai' WHERE ID_Sub = '$idsub'";
  $send = mysqli_query($koneksi_db, $sql);

  if ($send) {
    $_SESSION['pesan'] = 'Subkriteria berhasil terubah!';
    $_SESSION['status'] = 'success';
    header('Location: ../../index.php?page=sub_kriteria');
    exit;
  } else {
    $_SESSION['pesan'] = 'Subkriteria gagal terubah!';
    $_SESSION['status'] = 'danger';
    header('Location: ../../index.php?page=sub_kriteria');
    exit;
  }

?>