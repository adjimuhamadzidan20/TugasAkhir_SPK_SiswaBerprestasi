<?php  
	// menampilkan seluruh data alternatif (siswa)
	$sql = "SELECT * FROM data_alternatif";
	$datSiswa = mysqli_query($koneksi_db, $sql);

	// menampilkan seluruh data kriteria
	$namaKriteria = "SELECT Nama_Kriteria FROM data_kriteria";
	$datKrit = mysqli_query($koneksi_db, $namaKriteria);

	// fungsi perhitungan
	if (isset($_POST['hitung'])) {
			// menangkap data alternatif
			$sqlAlter = "SELECT * FROM data_alternatif";
			$alterSiswa = mysqli_query($koneksi_db, $sqlAlter);

			// menangkap jumlah baris data kriteria berdasarkan id kriteria
			$sqlKrit = mysqli_query($koneksi_db, "SELECT COUNT(ID_Kriteria) FROM data_kriteria");
			$resRow = mysqli_fetch_row($sqlKrit);
			$jumKrit = $resRow[0];

			// menangkap ID kriteria
			$sqlIDKrit = mysqli_query($koneksi_db, "SELECT ID_Kriteria FROM data_kriteria");
			$IDkrit = [];
			while ($resKrit = mysqli_fetch_assoc($sqlIDKrit)) {
				$IDkrit[] = $resKrit['ID_Kriteria'];
			}

			// perulangan nilai dalam kriteria berdasarkan jumlah data alter
			while ($nama = mysqli_fetch_assoc($alterSiswa)) {

				// menangkap data penilaian dari masing" kriteria berdasarkan nama alternatif
				$queryNilai = mysqli_query($koneksi_db, "SELECT data_penilaian.ID_Penilaian, data_penilaian.ID_Alter, data_alternatif.
				Nama_Siswa, data_penilaian.ID_Kriteria, data_kriteria.Nama_Kriteria, data_penilaian.Nilai FROM data_penilaian INNER JOIN 
				data_kriteria ON data_penilaian.ID_Kriteria = data_kriteria.ID_Kriteria INNER JOIN data_alternatif ON 
				data_penilaian.ID_Alter = data_alternatif.ID_Alter WHERE Nama_Siswa = '$nama[Nama_Siswa]'");
				
				// perulangan data penilaian awal
				$column = [];
				while ($nilaiAlt = mysqli_fetch_assoc($queryNilai)) {
					$idkrit = "SELECT MAX(Nilai) FROM data_penilaian WHERE ID_Kriteria = '$nilaiAlt[ID_Kriteria]'";
					$nilai = mysqli_query($koneksi_db, $idkrit);
					$nilaiKrit = mysqli_fetch_row($nilai);

					// nilai dari penilaian awal dibagi nilai max dari masing kriteria 
					$column[] = $nilaiAlt['Nilai'] / $nilaiKrit[0];
				}

				// hasil normalisasi masuk ke dalam database (normalisasi)
				for ($i=0; $i < $jumKrit ; $i++) { 
					$insNorm = "INSERT INTO hasil_normalisasi VALUES ('', '$nama[ID_Alter]', '$IDkrit[$i]', '$column[$i]')";
					mysqli_query($koneksi_db, $insNorm);
				}
				// var_dump($column);
			}

			// menangkap data id alternatif 
			$IdAlter = mysqli_query($koneksi_db, "SELECT ID_Alter FROM data_alternatif");

			// menangkap nilai bobot
			$nilBobot = mysqli_query($koneksi_db, "SELECT Nilai_Bobot FROM data_kriteria");
			$bo = [];
			while ($bobot = mysqli_fetch_assoc($nilBobot)) {
				$bo[] = $bobot;
			}
			// var_dump($bo);
			
			// perhitungan hasil normaliasasi dikalikan dengan nilai bobot (preferensi)
			while ($idAl = mysqli_fetch_assoc($IdAlter)) {
				$hasilNorm = "SELECT hasil_normalisasi.ID_Alter, data_kriteria.ID_Kriteria, data_kriteria.Nama_Kriteria, 
				data_kriteria.Nilai_Bobot, hasil_normalisasi.Hasil_Norm FROM hasil_normalisasi INNER JOIN data_kriteria 
				ON hasil_normalisasi.ID_Kriteria = data_kriteria.ID_Kriteria WHERE ID_Alter = '$idAl[ID_Alter]'";
				
				$query = mysqli_query($koneksi_db, $hasilNorm);

				$tamp = [];
				while ($has = mysqli_fetch_assoc($query)) {
					$tamp[] = $has['Nilai_Bobot'] * $has['Hasil_Norm'];
				}

				$hasilNorm = array_sum($tamp);
				mysqli_query($koneksi_db, "INSERT INTO hasil_preferensi VALUES ('', '$idAl[ID_Alter]', '$hasilNorm')");
			} 

			// die();
			echo '<script>
		            document.location.href = "index.php?page=hasil_perhitungan";
		        </script>';
	}

?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Proses Perhitungan</h1>
<!-- <p class="mb-4">Data siswa merupakan sebuah data alternatif atau pilihan untuk
menenntukan siswa berprestasi.</p> -->

<!-- DataTales Example -->
<div class="card shadow mb-4 rounded-0">
    <div class="card-header py-3 d-flex align-items-center justify-content-between">
    		<!-- <a href="index.php?page=tambah_alter" class="btn btn-primary btn-square btn-sm">
           Tambah Alternatif
        </a> -->
        <h6 class="m-0 font-weight-bold text-primary">Penilaian Awal</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Alternatif</th>
                    <?php 
	              			while ($res1 = mysqli_fetch_assoc($datKrit)) :
	              		?>
                    	<th><?= $res1['Nama_Kriteria']; ?></th>
                    <?php endwhile; ?>
                  </tr>   
                </thead>
                <tbody>
              		<?php 
              			while ($res2 = mysqli_fetch_assoc($datSiswa)) :
              		?>
                    <tr>
                      <td><?= $res2['Nama_Siswa']; ?></td>
                      <?php
                      	$nilaiSis = "SELECT Nilai FROM data_penilaian WHERE ID_Alter = '$res2[ID_Alter]'";
												$hasilSis = mysqli_query($koneksi_db, $nilaiSis);

		              			while ($res3 = mysqli_fetch_assoc($hasilSis)) :
		              		?>
                      	<td><?= $res3['Nilai']; ?></td>
                      <?php endwhile; ?>
                    </tr>
                	<?php endwhile; ?>  
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end">
        	<form action="" method="post">
        		<button type="submit" class="btn btn-success btn-square rounded-0" name="hitung">
	          	Buat SPK
	        	</button>
        	</form> 	
        </div>
    </div>
</div>