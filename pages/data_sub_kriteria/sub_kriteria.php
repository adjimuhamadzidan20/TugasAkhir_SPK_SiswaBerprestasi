<?php  
	$sql = "SELECT * FROM data_kriteria";
	$kriteria = mysqli_query($koneksi_db, $sql);

?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Sub Kriteria</h1>
<!-- <p class="mb-4">Data kriteria merupakan sebuah nama kriteria untuk
menenntukan siswa berprestasi serta nilai bobot untuk menandakan seberapa penting.</p> -->

<!-- DataTales Example -->
<div class="card shadow mb-4 rounded-0">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Data Subkriteria & Kriteria</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Kriteria</th>
                        <th>Sub Kriteria</th>
                    </tr>
                </thead>
                <tbody>
                		<?php  
                			$no = 0;
                			while ($krit = mysqli_fetch_assoc($kriteria)) :
                			$no++;
                		?>
                    <tr>
                      <td><?= 'C'. $no; ?></td>
                      <td><?= $krit['Nama_Kriteria']; ?></td>
                      <td class="text-center">
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