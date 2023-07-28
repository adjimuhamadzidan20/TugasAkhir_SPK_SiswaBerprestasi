<?php
	$sql = "SELECT * FROM data_kriteria";
	$kriteria = mysqli_query($koneksi_db, $sql);

	// fungsi delete
	if (isset($_GET['delete'])) {
		$idKrit = $_GET['delete'];
		$sqlDel = "DELETE FROM data_kriteria WHERE ID_Kriteria = '$idKrit'";
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

<!-- popup status -->
<?php  
	if (isset($_SESSION['pesan']) && isset($_SESSION['status'])) :
?>
	<div class="alert alert-<?= $_SESSION['status']; ?> rounded-0" role="alert" id="notif">
	  <?= $_SESSION['pesan']; ?>
	</div>
<?php  
	unset($_SESSION['pesan']);
	unset($_SESSION['status']);
	endif;
?>

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
      			$no = 0;
      			while ($krit = mysqli_fetch_assoc($kriteria)) :
      			$no++;
      		?>
            <tr>
              <td class="text-nowrap"><?= 'C'. $kode = str_pad($no, 2, '0', STR_PAD_LEFT); ?></td>
              <td class="text-nowrap"><?= $krit['Nama_Kriteria']; ?></td>
              <td class="text-nowrap"><?= $krit['Nilai_Bobot']; ?></td>
              <td class="text-nowrap"><?= $krit['Atribut']; ?></td>
              <td class="text-center text-nowrap">
              	<a href="index.php?page=edit_kriteria&edit=<?= $krit['ID_Kriteria']; ?>" class="btn btn-success btn-square rounded-0" title="Edit Kriteria">
                    <i class="fas fa-edit"></i>
                </a>
                
                <button class="btn btn-success btn-square rounded-0" title="Hapus Kriteria" data-toggle="modal" data-target="#hapusid<?= $krit['ID_Kriteria']; ?>">
                    <i class="fas fa-trash"></i>
                </button>

                <!--Modal Hapus Data-->
								<div class="modal fade" id="hapusid<?= $krit['ID_Kriteria']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
								    aria-hidden="true">
								    <div class="modal-dialog" role="document">
								        <div class="modal-content rounded-0 border-0">
								            <div class="modal-body">
								            	<button class="close" type="button" data-dismiss="modal" aria-label="Close">
								                  <span aria-hidden="true"><i class="fas fa-times fa-xs"></i></span>
								               </button>
								            	<p class="modal-title text-left" id="exampleModalLabel">Hapus Kriteria?</p>
								            </div>
								            <div class="modal-footer">
								                <button class="btn btn-secondary rounded-0" type="button" data-dismiss="modal"><i class="fas fa-chevron-left fa-sm"></i> Kembali</button>
								                <a class="btn btn-success rounded-0" href="index.php?page=data_kriteria&delete=<?= $krit['ID_Kriteria']; ?>"><i class="fas fa-trash fa-sm"></i> Hapus</a>
								            </div>
								        </div>
								    </div>
								</div>

              </td>
            </tr>
        	<?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>