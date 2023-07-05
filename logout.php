<?php  
	session_start();

	// hapus set session
	session_unset();
	session_destroy();

	// hapus set cookie
	setcookie('ID', '', time() - 3600, '/');
	setcookie('Key', '', time() - 3600, '/');

	header('Location: login.php');
	exit;

?>