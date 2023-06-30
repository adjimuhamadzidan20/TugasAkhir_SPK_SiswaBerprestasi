<?php  
	$sql = "SELECT * FROM data_kriteria";
	$kriteria = mysqli_query($koneksi_db, $sql);

	// fungsi delete
	if (isset($_GET['delete'])) {
		$namaKrit = $_GET['delete'];
		$sqlDel = "DELETE FROM data_kriteria WHERE Nama_Kriteria = '$namaKrit'";
		$query = mysqli_query($koneksi_db, $sqlDel);

		echo '<script>
            document.location.href = "index.php?page=data_kriteria";
        </script>';
	}

?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-1">
	<h1 class="h3 text-gray-800">Data Kriteria</h1>
</div>

<div class="alert alert-primary" role="alert">
  A simple primary alert—check it out!
</div>

<!-- DataTales Example -->
<div class="card mb-4 rounded-0">
  <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
		<a href="index.php?page=tambah_kriteria" class="btn btn-success btn-square btn-sm rounded-0">
      <i class="fas fa-plus fa-sm"></i> Tambah Kriteria
    </a>
    <h6 class="m-0 text-gray-800">Tabel Data Kriteria & Bobot</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Kode</th>
            <th>Nama Kriteria</th>
            <th>Nilai Bobot</th>
            <th>Atribut</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
      		<?php  
      			$kode = 0;
      			while ($krit = mysqli_fetch_assoc($kriteria)) :
      			$kode++;
      		?>
            <tr>
              <td><?= 'C'. $kode; ?></td>
              <td><?= $krit['Nama_Kriteria']; ?></td>
              <td><?= $krit['Nilai_Bobot']; ?></td>
              <td><?= $krit['Atribut']; ?></td>
              <td class="text-center">
              	<a href="index.php?page=edit_kriteria&edit=<?= $krit['Nama_Kriteria']; ?>&id=<?= $krit['ID_Kriteria']; ?>" class="btn btn-success btn-square rounded-0" title="Edit Kriteria">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="index.php?page=data_kriteria&delete=<?= $krit['Nama_Kriteria']; ?>" class="btn btn-success btn-square rounded-0" title="Hapus Kriteria" onclick="return confirm('Hapus Kriteria?');">
                    <i class="fas fa-trash"></i>
                </a>
              </td>
            </tr>
        	<?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>