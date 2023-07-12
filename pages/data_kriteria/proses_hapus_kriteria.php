<?php  
	session_start();
	require '../../config/connect_db.php';
		
	$idKrit = $_GET['delete'];
	$sqlDel = "DELETE FROM data_kriteria WHERE ID_Kriteria = '$idKrit'";
	mysqli_query($koneksi_db, $sqlDel);

	// $_SESSION['pesan'] = 'Kriteria berhasil terhapus!';
	// $_SESSION['status'] = 'success';
	header('Location: ../../index.php?page=data_kriteria');
	exit;

?>