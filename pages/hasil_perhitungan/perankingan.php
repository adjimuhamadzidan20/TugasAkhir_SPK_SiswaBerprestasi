<?php  
	$sql = "SELECT * FROM data_kriteria";
	$kriteria = mysqli_query($koneksi_db, $sql);

	$pref = mysqli_query($koneksi_db, "SELECT hasil_preferensi.ID_Pref, hasil_preferensi.ID_Alter, data_alternatif.Nama_Siswa, 
	hasil_preferensi.hasil_pref FROM hasil_preferensi INNER JOIN data_alternatif ON 
	hasil_preferensi.ID_Alter = data_alternatif.ID_Alter ORDER BY hasil_pref DESC");

?>

<div class="card-header py-3 d-flex align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">Hasil Akhir (Perankingan)</h6>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Nama Siswa</th>
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
                      <td><?= $res['Nama_Siswa']; ?></td>
                      <td><?= $res['hasil_pref']; ?></td>
                      <td><?= $no; ?></td>  
                  </tr>
              	<?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>