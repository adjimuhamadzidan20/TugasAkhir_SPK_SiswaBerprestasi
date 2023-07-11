<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-1">
  <h1 class="h3 text-gray-800">Hasil Perhitungan</h1>
</div>

<nav aria-label="...">
  <ul class="pagination pagination-md flex-wrap flex-md-nowrap">
    <li class="page-item w-100" aria-current="page">
      <a class="page-link rounded-0 text-gray-800" href="index.php?page=hasil_perhitungan&hasil=normalisasi">Hasil Normalisasi</a>
    </li>
    <li class="page-item w-100">
    	<a class="page-link rounded-0 text-gray-800" href="index.php?page=hasil_perhitungan&hasil=preferensi">Hasil Preferensi</a>
    </li>
    <li class="page-item w-100">
    	<a class="page-link rounded-0 text-gray-800" href="index.php?page=hasil_perhitungan&hasil=perankingan">Perankingan</a>
    </li>
  </ul>
</nav>

<!-- DataTales Example -->
<div class="card mb-4 rounded-0">
	<?php require 'config/control_hasil.php'; ?>
</div>

<div class="d-flex justify-content-start">
	<form method="post" action="pages/hasil_perhitungan/proses_reset_perhitungan.php">
		<button type="submit" class="btn btn-success btn-square rounded-0" name="reset" onclick="return confirm('Reset hasil perhitungan? Semua hasil perhitungan akan dibersihkan');">
    	<i class="fas fa-undo fa-sm"></i> Reset Hasil
  	</button>
	</form> 	
</div>