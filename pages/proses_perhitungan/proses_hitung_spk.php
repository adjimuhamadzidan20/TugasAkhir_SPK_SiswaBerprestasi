<?php  
	require '../../config/connect_db.php';

	// proses perhitungan spk
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

	// jumlah data hasil normalisasi dan preferensi
	$datNorm = mysqli_query($koneksi_db, "SELECT * FROM hasil_normalisasi");
	$datPref = mysqli_query($koneksi_db, "SELECT * FROM hasil_preferensi");
	$jmlHasilNorm = mysqli_num_rows($datNorm);
	$jmlHasilPref = mysqli_num_rows($datPref);

	// fungsi perhitungan spk
	if ($jmlHasilNorm && $jmlHasilPref) {
		// query mereset ulang isi data tabel
		$tabNorm = mysqli_query($koneksi_db, "TRUNCATE TABLE hasil_normalisasi");
		$tabPref = mysqli_query($koneksi_db, "TRUNCATE TABLE hasil_preferensi");

		// perulangan nilai dalam kriteria berdasarkan jumlah data alter
		while ($nama = mysqli_fetch_assoc($alterSiswa)) {

			// menangkap data penilaian dari masing" kriteria berdasarkan nama alternatif
			$queryNilai = mysqli_query($koneksi_db, "SELECT data_penilaian.ID_Penilaian, data_penilaian.ID_Alter, data_alternatif.
			Nama_Siswa, data_penilaian.ID_Kriteria, data_kriteria.Atribut, data_kriteria.Nama_Kriteria, data_penilaian.Nilai 
			FROM data_penilaian INNER JOIN data_kriteria ON data_penilaian.ID_Kriteria = data_kriteria.ID_Kriteria INNER JOIN 
			data_alternatif ON data_penilaian.ID_Alter = data_alternatif.ID_Alter WHERE Nama_Siswa = '$nama[Nama_Siswa]'");
			
			// perulangan data penilaian awal
			$column = [];
			while ($nilaiAlt = mysqli_fetch_assoc($queryNilai)) {

				// mengecek atribut kriteria benefit / cost
				if ($nilaiAlt['Atribut'] == 'Benefit') {
					// mengambil nilai tertinggi (max)
					$idkrit = "SELECT MAX(Nilai) FROM data_penilaian WHERE ID_Kriteria = '$nilaiAlt[ID_Kriteria]'";
					$nilai = mysqli_query($koneksi_db, $idkrit);
					$nilaiKrit = mysqli_fetch_row($nilai);
				} 
				else if ($nilaiAlt['Atribut'] == 'Cost') {
					// mengambil nilai terendah (min)
					$idkrit = "SELECT MIN(Nilai) FROM data_penilaian WHERE ID_Kriteria = '$nilaiAlt[ID_Kriteria]'";
					$nilai = mysqli_query($koneksi_db, $idkrit);
					$nilaiKrit = mysqli_fetch_row($nilai);
				}

				// nilai dari penilaian awal dibagi nilai max dari masing kriteria 
				$column[] = $nilaiAlt['Nilai'] / $nilaiKrit[0];
			}

			// hasil normalisasi masuk ke dalam database (normalisasi)
			for ($i=0; $i < $jumKrit ; $i++) { 
				$insNorm = "INSERT INTO hasil_normalisasi VALUES ('', '$nama[ID_Alter]', '$IDkrit[$i]', '$column[$i]')";
				mysqli_query($koneksi_db, $insNorm);
			}
		}

		// menangkap data id alternatif 
		$IdAlter = mysqli_query($koneksi_db, "SELECT ID_Alter FROM data_alternatif");

		// menangkap nilai bobot
		$nilBobot = mysqli_query($koneksi_db, "SELECT Nilai_Bobot FROM data_kriteria");
		$bo = [];
		while ($bobot = mysqli_fetch_assoc($nilBobot)) {
			$bo[] = $bobot;
		}
		
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

		header('Location: ../../index.php?page=hasil_perhitungan');
		exit;

	} else if ($jmlHasilNorm == 0 && $jmlHasilPref == 0) {

		// perulangan nilai dalam kriteria berdasarkan jumlah data alter
		while ($nama = mysqli_fetch_assoc($alterSiswa)) {

			// menangkap data penilaian dari masing" kriteria berdasarkan nama alternatif
			$queryNilai = mysqli_query($koneksi_db, "SELECT data_penilaian.ID_Penilaian, data_penilaian.ID_Alter, data_alternatif.
			Nama_Siswa, data_penilaian.ID_Kriteria, data_kriteria.Atribut, data_kriteria.Nama_Kriteria, data_penilaian.Nilai FROM 
			data_penilaian INNER JOIN data_kriteria ON data_penilaian.ID_Kriteria = data_kriteria.ID_Kriteria INNER JOIN
			data_alternatif ON data_penilaian.ID_Alter = data_alternatif.ID_Alter WHERE Nama_Siswa = '$nama[Nama_Siswa]'");
			
			// perulangan data penilaian awal
			$column = [];
			while ($nilaiAlt = mysqli_fetch_assoc($queryNilai)) {

				// mengecek atribut kriteria benefit / cost
				if ($nilaiAlt['Atribut'] == 'Benefit') {
					// mengambil nilai tertinggi (max)
					$idkrit = "SELECT MAX(Nilai) FROM data_penilaian WHERE ID_Kriteria = '$nilaiAlt[ID_Kriteria]'";
					$nilai = mysqli_query($koneksi_db, $idkrit);
					$nilaiKrit = mysqli_fetch_row($nilai);
				} 
				else if ($nilaiAlt['Atribut'] == 'Cost') {
					// mengambil nilai terendah (min)
					$idkrit = "SELECT MIN(Nilai) FROM data_penilaian WHERE ID_Kriteria = '$nilaiAlt[ID_Kriteria]'";
					$nilai = mysqli_query($koneksi_db, $idkrit);
					$nilaiKrit = mysqli_fetch_row($nilai);
				}

				// nilai dari penilaian awal dibagi nilai max dari masing kriteria 
				$column[] = $nilaiAlt['Nilai'] / $nilaiKrit[0];
			}

			// hasil normalisasi masuk ke dalam database (normalisasi)
			for ($i=0; $i < $jumKrit ; $i++) { 
				$insNorm = "INSERT INTO hasil_normalisasi VALUES ('', '$nama[ID_Alter]', '$IDkrit[$i]', '$column[$i]')";
				mysqli_query($koneksi_db, $insNorm);
			}
		}

		// menangkap data id alternatif 
		$IdAlter = mysqli_query($koneksi_db, "SELECT ID_Alter FROM data_alternatif");

		// menangkap nilai bobot
		$nilBobot = mysqli_query($koneksi_db, "SELECT Nilai_Bobot FROM data_kriteria");
		$bo = [];
		while ($bobot = mysqli_fetch_assoc($nilBobot)) {
			$bo[] = $bobot;
		}
		
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

		header('Location: ../../index.php?page=hasil_perhitungan');
		exit;
	}

?>