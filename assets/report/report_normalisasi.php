<?php
	require '../../config/connect_db.php';

	require_once __DIR__ . '../../../vendor/autoload.php';

	// format tgl indonesia
	setlocale(LC_ALL, 'id-ID', 'id_ID');
	$tgl1 = strftime("%A, %d %B %Y | %T");
	$tgl2 = strftime("%d %B %Y");

	$normali = mysqli_query($koneksi_db, "SELECT Nama_Kriteria FROM data_kriteria");
  $siswa = mysqli_query($koneksi_db, "SELECT ID_Alter, NISN, Nama_Siswa FROM data_alternatif");

	$mpdf = new \Mpdf\Mpdf();
	$mpdf->debug = false;

	$header = '<div class="head" style="border-bottom: 2px solid black; font-family: sans-serif;">	
							<img src="../img/SMKN9_Bekasi.png" alt="" width="100" height="100" style="float: left; margin-right: 15px;">
							<h3 style="float: right; padding-top: 15px;">Laporan Hasil Normalisasi<br>SPK Penentuan Siswa Berprestasi<br>
							SMK Negeri 9 Kota Bekasi</h3>
						</div>'; 

	$subhead = '<div style="font-family: sans-serif;">
								<p style="font-weight: bold;">Hasil Normalisasi</p>
								<p style="font-size: 12px;">'. $tgl1 .'</p>
							</div>';
	
	$tabel = '<table border="1" width="100%" cellspacing="0" cellpadding="4" style="font-size: 11px; font-family: sans-serif;">
	            <thead>
	                <tr>
	                    <th>No</th>
	                    <th>NISN</th>
	                    <th>Nama Siswa</th>'; 
	                    while ($krit = mysqli_fetch_assoc($normali)) {
	                   		$tabel .= ' <th>'. $krit['Nama_Kriteria'] .'</th>';
	                    }
	    $tabel .= '</tr>
	            </thead>
	            <tbody>';
                  $no = 0;   
                  while ($sis = mysqli_fetch_assoc($siswa)) {
                  $no++;
	      $tabel .= '<tr>
	                    <td>'. $no .'</td>
	                    <td>'. $sis['NISN'] .'</td>
	                    <td>'. $sis['Nama_Siswa'] .'</td>';
                      $hasil = mysqli_query($koneksi_db, "SELECT Hasil_Norm FROM hasil_normalisasi 
                      WHERE ID_Alter = '$sis[ID_Alter]'");
	                    
	                    while ($nilai = mysqli_fetch_assoc($hasil)) {
	                   		$tabel .= '<td>' .$nilai['Hasil_Norm']. '</td>';
	                    }
	      $tabel .= '</tr>';
	                }
	$tabel .= '</tbody>
	        </table>';

	$date = '<div style="text-align: right; margin-top:50px; font-family: sans-serif;">
					 	<p>Kota Bekasi, '. $tgl2 .'</p>
					 	<br><br>
					 	<p>Admin</p>
					</div>';

	$mpdf->SetTitle('Laporan Normalisasi');
	$mpdf->WriteHTML($header);
	$mpdf->WriteHTML($subhead);
	$mpdf->WriteHTML($tabel);
	$mpdf->WriteHTML($date);
	$mpdf->SetFooter('SPK Penentuan Siswa Berprestasi|{PAGENO}|Hasil Normalisasi');
	$mpdf->Output('Laporan Normalisasi.pdf', \Mpdf\Output\Destination::INLINE);

?>

