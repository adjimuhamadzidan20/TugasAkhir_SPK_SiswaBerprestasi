<?php  

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

<nav aria-label="...">
  <ul class="pagination pagination-md">
    <li class="page-item" aria-current="page">
      <a class="page-link rounded-0" href="index.php?page=hasil_perhitungan&hasil=normalisasi">Hasil Normalisasi</a>
    </li>
    <li class="page-item"><a class="page-link rounded-0" href="index.php?page=hasil_perhitungan&hasil=preferensi">Hasil Preferensi</a></li>
    <li class="page-item"><a class="page-link rounded-0" href="index.php?page=hasil_perhitungan&hasil=perankingan">Perankingan</a></li>
  </ul>
</nav>

<!-- DataTales Example -->
<div class="card shadow mb-4 rounded-0">
	<?php require 'config/control_hasil.php'; ?>
</div>

<div class="d-flex justify-content-start">
	<form action="" method="post">
		<button type="submit" class="btn btn-success btn-square rounded-0" name="reset" onclick="return confirm('Reset hasil perhitungan? Semua hasil perhitungan akan dibersihkan');">
    	<i class="fas fa-undo fa-sm"></i> Reset Hasil
  	</button>
	</form> 	
</div>