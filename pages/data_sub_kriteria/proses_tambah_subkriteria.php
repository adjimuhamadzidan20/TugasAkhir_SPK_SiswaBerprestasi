<?php  
  session_start();
	require '../../config/connect_db.php';

	// proses tambah
	$id = $_GET['id'];  
	$krit = $_GET['nama'];

	// mengambil data id kriteria
  $sql = "SELECT * FROM data_kriteria WHERE ID_Kriteria = '$id'";
  $kriteria = mysqli_query($koneksi_db, $sql);
  $data = mysqli_fetch_assoc($kriteria);

  $idKriteria = $data['ID_Kriteria'];
  $subkriteria = htmlspecialchars($_POST['sub_kriteria']);
  $keterangan = htmlspecialchars($_POST['ket']);
  $nilai = htmlspecialchars($_POST['nilai']);

  $query = mysqli_query($koneksi_db, "SELECT Nama_Subkriteria, Keterangan, Nilai FROM 
  data_subkriteria WHERE Nama_Subkriteria = '$subkriteria'");
  $idsub = mysqli_num_rows($query);

  // validasi input sub kriteria sudah ada atau belum
  if ($idsub > 0) {
    $_SESSION['pesan'] = 'Nama subkriteria sudah ada!';
    $_SESSION['status'] = 'warning';
		header('Location: ../../index.php?page=tambah_subkriteria&idkriteria='. $id .'&kriteria='. $krit .'');
		exit;
  } else {
    $sql = "INSERT INTO data_subkriteria VALUES ('', '$idKriteria', '$subkriteria', '$keterangan', '$nilai')";
    $send = mysqli_query($koneksi_db, $sql);

    if ($send) {
      $_SESSION['pesan'] = 'Subkriteria berhasil tersimpan!';
      $_SESSION['status'] = 'success';
      header('Location: ../../index.php?page=tambah_subkriteria&idkriteria='. $id .'&kriteria='. $krit .'');
      exit;  
    } else {
      $_SESSION['pesan'] = 'Subkriteria gagal tersimpan!';
      $_SESSION['status'] = 'danger';
      header('Location: ../../index.php?page=tambah_subkriteria&idkriteria='. $id .'&kriteria='. $krit .'');
      exit;
    }
  }

?>