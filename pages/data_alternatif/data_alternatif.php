<?php	
	$sql = "SELECT * FROM data_alternatif";
	$siswa = mysqli_query($koneksi_db, $sql);

	// fungsi delete
	if (isset($_GET['delete'])) {
		$idAlt = $_GET['delete'];
		$sqlDel = "DELETE FROM data_alternatif WHERE ID_Alter = '$idAlt'";
		$query = mysqli_query($koneksi_db, $sqlDel);

		echo '<script>
						alert("Alternatif berhasil terhapus!");
            document.location.href = "index.php?page=data_siswa";
        </script>';
	}

?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-1">
  <h1 class="h3 text-gray-800">Data Alternatif</h1>
</div>

<!-- DataTales Example -->
<div class="card mb-4 rounded-0">
  <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
		<a href="index.php?page=tambah_alter" class="btn btn-success btn-square btn-sm rounded-0">
      <i class="fas fa-plus fa-sm"></i> Tambah Alternatif
    </a>
    <h6 class="m-0 text-gray-800 d-none d-sm-block">Tabel Data Alternatif Siswa</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th class="text-nowrap">Kode</th>
            <th class="text-nowrap">NISN</th>
            <th class="text-nowrap">Nama Siswa</th>
            <th class="text-nowrap">JK</th>
            <th class="text-nowrap">Kelas</th>
            <th class="text-nowrap">Opsi</th>
          </tr>
        </thead>
        <tbody>
      		<?php 
      			$kode = 0;
      			while ($alter = mysqli_fetch_assoc($siswa)) :	
      			$kode++;
      		?>
            <tr>
              <td class="text-nowrap"><?= 'A'. $kode; ?></td>
              <td class="text-nowrap"><?= $alter['NISN']; ?></td>
              <td class="text-nowrap"><?= $alter['Nama_Siswa']; ?></td>
              <td class="text-nowrap"><?= $alter['JK']; ?></td>
              <td class="text-nowrap"><?= $alter['Kelas']; ?></td>
              <td class="text-center text-nowrap">
              	<a href="index.php?page=edit_alter&edit=<?= $alter['ID_Alter']; ?>" class="btn btn-success btn-square rounded-0">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="index.php?page=data_siswa&delete=<?= $alter['ID_Alter']; ?>" class="btn btn-success btn-square rounded-0" onclick="return confirm('Hapus Alternatif?');">
                    <i class="fas fa-trash"></i>
                </a>
              </td>
            </tr>
        	<?php 
        		endwhile; 
        	?>  
        </tbody>
      </table>
    </div>
  </div>
</div>