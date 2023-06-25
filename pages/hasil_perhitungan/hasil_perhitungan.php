<?php  
	$normali = mysqli_query($koneksi_db, "SELECT Nama_Kriteria FROM data_kriteria");
	$siswa = mysqli_query($koneksi_db, "SELECT ID_Alter, Nama_Siswa FROM data_alternatif");

	$pref = mysqli_query($koneksi_db, "SELECT hasil_preferensi.ID_Pref, hasil_preferensi.ID_Alter, data_alternatif.Nama_Siswa, 
	hasil_preferensi.hasil_pref FROM hasil_preferensi INNER JOIN data_alternatif ON 
	hasil_preferensi.ID_Alter = data_alternatif.ID_Alter");

	if (isset($_POST['reset'])) {
		$tabNorm = mysqli_query($koneksi_db, "TRUNCATE TABLE hasil_normalisasi");
		$tabPref = mysqli_query($koneksi_db, "TRUNCATE TABLE hasil_preferensi");

		echo '<script>
            document.location.href = "index.php?page=hasil_perhitungan";
          </script>';
	}

?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Hasil Perhitungan</h1>
<!-- <p class="mb-4">Data kriteria merupakan sebuah nama kriteria untuk
menenntukan siswa berprestasi serta nilai bobot untuk menandakan seberapa penting.</p> -->

<!-- DataTales Example -->
<div class="card shadow mb-4 rounded-0">
    <div class="card-header py-3 d-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Hasil Normalisasi</h6>
        <a href="index.php?page=tambah_alter" class="btn btn-primary btn-square btn-sm rounded-0">
           Buat Laporan
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                    		<th>No</th>
                        <th>Alternatif</th>
                        <?php  
		                			while ($krit = mysqli_fetch_assoc($normali)) :
		                		?>
                        	<th><?= $krit['Nama_Kriteria']; ?></th>
                        <?php endwhile; ?>
                    </tr>
                </thead>
                <tbody>
                		<?php
                			$no = 0;   
                			while ($sis = mysqli_fetch_assoc($siswa)) :
                			$no++;
                		?>
	                    <tr>
	                    		<td><?= $no; ?></td>
	                        <td><?= $sis['Nama_Siswa']; ?></td>
	                        <?php  
	                        	$hasil = mysqli_query($koneksi_db, "SELECT Hasil_Norm FROM hasil_normalisasi 
	                        	WHERE ID_Alter = '$sis[ID_Alter]'");

			                			while ($nilai = mysqli_fetch_assoc($hasil)) :
			                		?>
	                        	<td><?= $nilai['Hasil_Norm']; ?></td>
	                        <?php endwhile; ?>
	                    </tr>
                  	<?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4 rounded-0">
    <div class="card-header py-3 d-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Hasil Preferensi</h6>
        <a href="index.php?page=tambah_alter" class="btn btn-primary btn-square btn-sm rounded-0">
           Buat Laporan
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Hasil Preferensi</th>
                    </tr>
                </thead>
                <tbody>
                		<?php
                			$no = 0;  
                			while ($res = mysqli_fetch_assoc($pref)) :
                			$no++;	
                		?>
	                    <tr>
	                        <td><?= $no; ?></td>
	                        <td><?= $res['Nama_Siswa']; ?></td>
	                        <td><?= $res['hasil_pref']; ?></td>  
	                    </tr>
                  	<?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end">
        	<form action="" method="post">
        		<button type="submit" class="btn btn-success btn-square rounded-0" name="reset" onclick="return confirm('Reset hasil perhitungan?');">
	          	Reset Hasil
	        	</button>
        	</form> 	
        </div>
    </div>
</div>