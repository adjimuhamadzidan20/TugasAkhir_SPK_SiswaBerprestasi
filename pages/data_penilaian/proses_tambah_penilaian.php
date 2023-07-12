<?php
  session_start();  
	require '../../config/connect_db.php';

	// proses tambah
	$penilaian = $_GET['id'];

	// menangkap data alternatif sesuai nama siswa
  $namaSiswa = "SELECT * FROM data_alternatif WHERE ID_Alter = '$penilaian'";
  $rendSiswa = mysqli_query($koneksi_db, $namaSiswa);
  $res = mysqli_fetch_assoc($rendSiswa);

  // id kriteria
  $querykrit = "SELECT ID_Kriteria FROM data_kriteria";
  $hasil = mysqli_query($koneksi_db, $querykrit);
  // memasukan semua data id kriteria ke array
  $row = [];
  while ($resKrit = mysqli_fetch_assoc($hasil)) {
      $row[] = $resKrit['ID_Kriteria'];
  }

  // jumlah data kriteria  
  $cekJuml = "SELECT COUNT(ID_Kriteria) FROM data_kriteria";
  $total = mysqli_query($koneksi_db, $cekJuml);
  $tes = mysqli_fetch_row($total);
  $jumlah = $tes[0];

  $i = 1;
  while ($i <= $jumlah) {
    $alternatif = $res['ID_Alter'];
    $kriteria = $row[$i-1];
    $nilai = htmlspecialchars($_POST['nilai'][$i-1]);

    $sql = "INSERT INTO data_penilaian VALUES ('', '$alternatif', '$kriteria', '$nilai')";
    $send = mysqli_query($koneksi_db, $sql);

    $i++;
  }

  if ($send) {
    $_SESSION['pesan'] = 'Penilaian berhasil ditambahkan!';
    $_SESSION['status'] = 'success';
    header('Location: ../../index.php?page=data_penilaian');
    exit;
  } else {
    $_SESSION['pesan'] = 'Penilaian gagal ditambahkan!';
    $_SESSION['status'] = 'danger';
    header('Location: ../../index.php?page=data_penilaian');
    exit;
  }
 
?>