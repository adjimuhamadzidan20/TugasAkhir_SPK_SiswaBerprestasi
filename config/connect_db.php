<?php  
	$host 		= 'localhost';
	$username = 'root';
	$password = '';
	$database = 'spksiswaberprestasi';
	
	$koneksi_db = mysqli_connect($host, $username, $password, $database);
	
	// cek koneksi db	
	if (!$koneksi_db) {
		die('koneksi gagal tersambung '. mysqli_connect_errno());
	}

?>