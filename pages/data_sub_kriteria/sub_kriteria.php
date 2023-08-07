<?php  
	$sql = "SELECT * FROM data_kriteria";
	$kriteria = mysqli_query($koneksi_db, $sql);
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-1">
  <h1 class="h3 text-gray-800">Sub Kriteria</h1>
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
  <div class="card-header bg-white py-3">
  	<h6 class="m-0 text-gray-800">Tabel Data Subkriteria & Kriteria</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th class="text-nowrap">Kode</th>
            <th class="text-nowrap">Kriteria</th>
            <th class="text-nowrap">Sub Kriteria</th>
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
	            <td class="text-center text-nowrap">
	            	<a href="index.php?page=tambah_subkriteria&idkriteria=<?= $krit['ID_Kriteria']; ?>&kriteria=<?= $krit['Nama_Kriteria']; ?>" class="btn btn-success btn-square rounded-0">
	                <i class="fas fa-plus fa-sm"></i> Masukan Sub Kriteria
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