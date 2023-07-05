<?php  
	require '../../config/connect_db.php';

	// fungsi melihat penilaian yang telah diinput
  if (isset($_POST['nama_siswa'])) {
  	$siswa = $_POST['nama_siswa'];

  	$namaKriteria = "SELECT data_penilaian.ID_Penilaian, data_alternatif.ID_Alter, data_alternatif.Nama_Siswa, data_penilaian.
  	ID_Kriteria, data_kriteria.Nama_Kriteria, data_penilaian.Nilai FROM data_penilaian INNER JOIN data_alternatif ON 
  	data_penilaian. ID_Alter = data_alternatif.ID_Alter INNER JOIN data_kriteria ON data_penilaian.ID_Kriteria = data_kriteria.
  	ID_Kriteria WHERE Nama_Siswa = '$siswa'";

	  $rendKriteria = mysqli_query($koneksi_db, $namaKriteria);

		$tabel = ' <div class="table-responsive">
			          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			          	<thead>
			              <tr>
			                <th>Kriteria</th>
			                <th>Nilai</th>
			              </tr>
			          	</thead>
									<tbody>';
            			while ($alter = mysqli_fetch_assoc($rendKriteria)) :
	                  $tabel .= "<tr>
	                    <td>". $alter['Nama_Kriteria']. "</td>
	                    <td>". $alter['Nilai']."</td>
	                  </tr>";
	              	endwhile;  
	    $tabel .= "</tbody>
						  </table>
						</div>";

		echo $tabel;
  }

?>