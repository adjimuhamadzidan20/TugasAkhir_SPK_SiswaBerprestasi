<?php  
	require '../../config/connect_db.php';

	// proses tambah
	$kriteria = htmlspecialchars($_POST['nama_kriteria']);
  $bobot = htmlspecialchars($_POST['bobot']);
  $atribut = htmlspecialchars($_POST['atribut']);

  $query = mysqli_query($koneksi_db, "SELECT Nama_Kriteria FROM data_kriteria WHERE Nama_Kriteria = '$kriteria'");
  $namaKrit = mysqli_num_rows($query);

  // validasi input nama kriteria sudah ada atau belum
  if ($namaKrit > 0) {
		header('Location: ../../index.php?page=tambah_kriteria');
    exit;
  } else {
    $sql = "INSERT INTO data_kriteria VALUES ('', '$kriteria', '$bobot', '$atribut')";
    mysqli_query($koneksi_db, $sql);

    header('Location: ../../index.php?page=data_kriteria');
    exit;
  }

?>