<?php
	$pref = mysqli_query($koneksi_db, "SELECT hasil_preferensi.ID_Pref, hasil_preferensi.ID_Alter, data_alternatif.Nama_Siswa, 
	hasil_preferensi.hasil_pref FROM hasil_preferensi INNER JOIN data_alternatif ON 
	hasil_preferensi.ID_Alter = data_alternatif.ID_Alter ORDER BY hasil_pref DESC");
?>

<div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
    <h6 class="m-0 text-gray-800">Hasil Akhir (Perankingan)</h6>
</div>
<div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th class="text-nowrap">Nama Siswa</th>
          <th class="text-nowrap">Nilai Akhir</th>
          <th class="text-nowrap">Peringkat</th>
        </tr>
      </thead>
      <tbody>
    		<?php
    			$no = 0;  
    			while ($res = mysqli_fetch_assoc($pref)) :
    			$no++;	
    		?>
          <tr>
            <td class="text-nowrap"><?= $res['Nama_Siswa']; ?></td>
            <td class="text-nowrap"><?= $res['hasil_pref']; ?></td>
            <td class="text-nowrap"><?= $no; ?></td>  
          </tr>
      	<?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>