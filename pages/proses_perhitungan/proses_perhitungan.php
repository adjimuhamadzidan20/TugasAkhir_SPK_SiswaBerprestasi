<?php  
	// menampilkan seluruh data alternatif (siswa)
	$sql = "SELECT * FROM data_alternatif";
	$datSiswa = mysqli_query($koneksi_db, $sql);

	// menampilkan seluruh data kriteria
	$namaKriteria = "SELECT Nama_Kriteria FROM data_kriteria";
	$datKrit = mysqli_query($koneksi_db, $namaKriteria);
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-1">
  <h1 class="h3 text-gray-800">Proses Perhitungan</h1>
</div>

<!-- DataTales Example -->
<div class="card mb-3 rounded-0">
  <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
    <h6 class="m-0 text-gray-800">Tabel Penilaian Awal</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th class="text-nowrap">Alternatif</th>
            <?php 
        			while ($res1 = mysqli_fetch_assoc($datKrit)) :
        		?>
            	<th class="text-nowrap"><?= $res1['Nama_Kriteria']; ?></th>
            <?php endwhile; ?>
          </tr>   
        </thead>
        <tbody>
      		<?php 
      			while ($res2 = mysqli_fetch_assoc($datSiswa)) :
      		?>
            <tr>
              <td class="text-nowrap"><?= $res2['Nama_Siswa']; ?></td>
              <?php
              	$nilaiSis = "SELECT Nilai FROM data_penilaian WHERE ID_Alter = '$res2[ID_Alter]'";
								$hasilSis = mysqli_query($koneksi_db, $nilaiSis);

          			while ($res3 = mysqli_fetch_assoc($hasilSis)) :
          		?>
              	<td class="text-nowrap"><?= $res3['Nilai']; ?></td>
              <?php endwhile; ?>
            </tr>
        	<?php endwhile; ?>  
        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="d-flex justify-content-start">
	<form action="pages/proses_perhitungan/proses_hitung_spk.php" method="post">
		<button type="submit" class="btn btn-success btn-square rounded-0" name="hitung">
    	<i class="fas fa-calculator fa-sm"></i> Hitung
  	</button>
	</form> 	
</div>