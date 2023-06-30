<?php  
	$sql = "SELECT * FROM data_alternatif";
	$siswa = mysqli_query($koneksi_db, $sql);

  // $hasil = mysqli_query($koneksi_db, "SELECT Alternatif FROM data_penilaian WHERE Alternatif = '$_GET[cek]'");
  // $cek = mysqli_fetch_assoc($hasil);

	// melihat penilaian yang telah diinput
  if (isset($_GET['cek'])) {
  	$namaKriteria = "SELECT data_penilaian.ID_Penilaian, data_alternatif.ID_Alter, data_alternatif.Nama_Siswa, data_penilaian.
  	ID_Kriteria, data_kriteria.Nama_Kriteria, data_penilaian.Nilai FROM data_penilaian INNER JOIN data_alternatif ON 
  	data_penilaian. ID_Alter = data_alternatif.ID_Alter INNER JOIN data_kriteria ON data_penilaian.ID_Kriteria = data_kriteria.
  	ID_Kriteria WHERE Nama_Siswa = '$_GET[cek]'";

	  $rendKriteria = mysqli_query($koneksi_db, $namaKriteria);

		$tabel = "<tbody>";
            			while ($alter = mysqli_fetch_assoc($rendKriteria)) :
	                  $tabel .= "<tr>
	                    <td>". $alter['Nama_Kriteria']. "</td>
	                    <td>". $alter['Nilai']."</td>
	                  </tr>";
	              	endwhile;  
    $tabel .="</tbody>";
  }

?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-1">
  <h1 class="h3 text-gray-800">Penilaian Awal</h1>
</div>

<!-- DataTales Example -->
<div class="row">
	<div class="col-8">
		<div class="card mb-4 rounded-0">
	    <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
        <h6 class="m-0 text-gray-800">Tabel Data Alternatif Siswa</h6>
	    </div>
	    <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Kode</th>
                <th>Nama Siswa</th>
                <th>Penilaian</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
          		<?php 
          			$no = 0;
          			while ($alter = mysqli_fetch_assoc($siswa)) :
          			$no++;	
          		?>
                <tr>
                  <td><?= 'A'. $no; ?></td>
                  <td><?= $alter['Nama_Siswa']; ?></td>
                  <td class="text-center">
                  	<?php  
                  		$jmlData = mysqli_query($koneksi_db, "SELECT * FROM data_penilaian WHERE ID_Alter = '$alter[ID_Alter]'");
                  		$jml = mysqli_num_rows($jmlData);

                  		if ($jml == 0) {
                  	?>
	                  	<a href="index.php?page=tambah_penilaian&penilaian=<?= $alter['ID_Alter']; ?>" class="btn btn-secondary btn-square rounded-0" title="Tambah Penilaian">
	                      <i class="fas fa-plus fa-sm"></i> Masukan Penilaian
	                    </a>
	                  <?php } else if ($jml > 0){ ?>
	                  	<button class="btn btn-success btn-square rounded-0" title="Penilaian Telah Diinput" readonly="readonly">
	                    	<i class="fas fa-check fa-sm"></i> Penilaian Terinput
	                    </button>
	                  <?php } ?>  
                  </td>
                  <td class="text-center">
                  	<a href="index.php?page=data_penilaian&cek=<?= $alter['Nama_Siswa']; ?>" class="btn btn-success btn-square rounded-0" title="Lihat Penilaian">
                    	<i class="fas fa-eye"></i>
                    </a>
                  	<a href="index.php?page=edit_penilaian&edit=<?= $alter['Nama_Siswa']; ?>&id=<?= $alter['ID_Alter']; ?>" class="btn btn-success btn-square rounded-0" title="Edit Penilaian">
                      <i class="fas fa-edit"></i>
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
	</div>
	<div class="col">
		<div class="card mb-4 rounded-0">
	    <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
    		<!-- <a href="index.php" class="btn btn-primary btn-square btn-sm">
           Tambah Data
        </a> -->
        <h6 class="m-0 text-gray-800">Lihat Penilaian</h6>
	    </div>
	    <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          	<thead>
              <tr>
                <th>Kriteria</th>
                <th>Nilai</th>
              </tr>
          	</thead>
            <?php
            	if (isset($tabel)) {
            		echo $tabel;
            	} else {
          			echo '';
          		}	 
            ?>
          </table>
        </div>
	    </div>
		</div>
	</div>
</div>
