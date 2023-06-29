<?php  
	$pref = mysqli_query($koneksi_db, "SELECT hasil_preferensi.ID_Pref, hasil_preferensi.ID_Alter, data_alternatif.NISN,
	data_alternatif.Nama_Siswa, data_alternatif.Kelas, hasil_preferensi.hasil_pref FROM hasil_preferensi INNER JOIN 
	data_alternatif ON hasil_preferensi.ID_Alter = data_alternatif.ID_Alter ORDER BY hasil_pref DESC");

?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h5 class="mb-3 text-gray-800 my-auto">Laporan Hasil Perankingan</h5>
  <a href="assets/report/report_perankingan.php" class="d-none d-sm-inline-block btn btn-sm btn-primary rounded-0" target="_blank">
  	<i class="fas fa-file-pdf fa-sm"></i> Cetak Laporan
	</a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4 rounded-0">
	<div class="card-body">
	    <div class="table-responsive">
	        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	            <thead>
	                <tr>
	                		<th>NISN</th>
	                    <th>Nama Siswa</th>
	                    <th>Kelas</th>
	                    <th>Nilai Akhir</th>
	                    <th>Peringkat</th>
	                </tr>
	            </thead>
	            <tbody>
	            		<?php
	            			$no = 0;  
	            			while ($res = mysqli_fetch_assoc($pref)) :
	            			$no++;	
	            		?>
	                  <tr>
	                  		<td><?= $res['NISN']; ?></td>
	                      <td><?= $res['Nama_Siswa']; ?></td>
	                      <td><?= $res['Kelas']; ?></td>
	                      <td><?= $res['hasil_pref']; ?></td>
	                      <td><?= $no; ?></td>  
	                  </tr>
	              	<?php endwhile; ?>
	            </tbody>
	        </table>
	    </div>
	</div>
</div>