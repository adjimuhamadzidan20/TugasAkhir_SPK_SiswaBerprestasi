<?php
	require '../../config/connect_db.php';

	// proses tambah
	$nisn = htmlspecialchars($_POST['nisn']);
  $siswa = htmlspecialchars($_POST['nama_siswa']);
  $jk = htmlspecialchars($_POST['jenis_kelamin']);
  $kelas = htmlspecialchars($_POST['kelas']);

  $query = mysqli_query($koneksi_db, "SELECT NISN FROM data_alternatif WHERE NISN = '$nisn'");
  $nisnSiswa = mysqli_num_rows($query);

  // validasi input alternatif sudah ada atau belum
  if ($nisnSiswa > 0) {
		header('Location: ../../index.php?page=tambah_alter');
    exit;
  } else {
    $sql = "INSERT INTO data_alternatif VALUES ('', '$nisn', '$siswa', '$jk', '$kelas')";
    mysqli_query($koneksi_db, $sql);

    header('Location: ../../index.php?page=data_siswa');
    exit;
  }
?>