<?php
	$sql = "SELECT * FROM data_kriteria";
	$kriteria = mysqli_query($koneksi_db, $sql);

	// fungsi delete
	if (isset($_GET['delete'])) {
		$idKrit = $_GET['delete'];
		$sqlDel = "DELETE FROM data_kriteria WHERE ID_Kriteria = '$idKrit'";
		$query = mysqli_query($koneksi_db, $sqlDel);
		
		echo '<script>
						alert("Kriteria berhasil terhapus!");
            document.location.href = "index.php?page=data_kriteria";
        </script>';
	}

?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-1">
	<h1 class="h3 text-gray-800">Data Kriteria</h1>
</div>

<!-- DataTales Example -->
<div class="card mb-4 rounded-0">
  <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
		<a href="index.php?page=tambah_kriteria" class="btn btn-success btn-square btn-sm rounded-0">
      <i class="fas fa-plus fa-sm"></i> Tambah Kriteria
    </a>
    <h6 class="m-0 text-gray-800 d-none d-sm-block">Tabel Data Kriteria & Bobot</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th class="text-nowrap">Kode</th>
            <th class="text-nowrap">Nama Kriteria</th>
            <th class="text-nowrap">Nilai Bobot</th>
            <th class="text-nowrap">Atribut</th>
            <th class="text-nowrap">Opsi</th>
          </tr>
        </thead>
        <tbody>
      		<?php  
      			$kode = 0;
      			while ($krit = mysqli_fetch_assoc($kriteria)) :
      			$kode++;
      		?>
            <tr>
              <td class="text-nowrap"><?= 'C'. $kode; ?></td>
              <td class="text-nowrap"><?= $krit['Nama_Kriteria']; ?></td>
              <td class="text-nowrap"><?= $krit['Nilai_Bobot']; ?></td>
              <td class="text-nowrap"><?= $krit['Atribut']; ?></td>
              <td class="text-center text-nowrap">
              	<a href="index.php?page=edit_kriteria&edit=<?= $krit['ID_Kriteria']; ?>" class="btn btn-success btn-square rounded-0" title="Edit Kriteria">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="index.php?page=data_kriteria&delete=<?= $krit['ID_Kriteria']; ?>" class="btn btn-success btn-square rounded-0" title="Hapus Kriteria" onclick="return confirm('Hapus Kriteria?');">
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