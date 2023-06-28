<?php  
	$sql = "SELECT * FROM data_alternatif";
	$siswa = mysqli_query($koneksi_db, $sql);

	// fungsi delete
	if (isset($_GET['delete'])) {
		$nisn = $_GET['delete'];
		$sqlDel = "DELETE FROM data_alternatif WHERE NISN = '$nisn'";
		$query = mysqli_query($koneksi_db, $sqlDel);

		echo '<script>
            document.location.href = "index.php?page=data_siswa";
        </script>';
	}

?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Alternatif (Siswa)</h1>
<!-- <p class="mb-4">Data siswa merupakan sebuah data alternatif atau pilihan untuk
menenntukan siswa berprestasi.</p> -->

<!-- DataTales Example -->
<div class="card shadow mb-4 rounded-0">
    <div class="card-header py-3 d-flex align-items-center justify-content-between">
    		<a href="index.php?page=tambah_alter" class="btn btn-primary btn-square btn-sm rounded-0">
          <i class="fas fa-plus fa-sm"></i> Tambah Alternatif
        </a>
        <h6 class="m-0 font-weight-bold text-primary">Tabel Data Alternatif Siswa</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                      <th>Kode</th>
                      <th>NISN</th>
                      <th>Nama Siswa</th>
                      <th>JK</th>
                      <th>Kelas</th>
                      <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
              		<?php 
              			$kode = 0;
              			while ($alter = mysqli_fetch_assoc($siswa)) :	
              			$kode++;
              		?>
                    <tr>
                      <td><?= 'A'. $kode; ?></td>
                      <td><?= $alter['NISN']; ?></td>
                      <td><?= $alter['Nama_Siswa']; ?></td>
                      <td><?= $alter['JK']; ?></td>
                      <td><?= $alter['Kelas']; ?></td>
                      <td class="text-center">
                      	<a href="index.php?page=edit_alter&edit=<?= $alter['NISN']; ?>&id=<?= $alter['ID_Alter']; ?>" class="btn btn-warning btn-square rounded-0">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="index.php?page=data_siswa&delete=<?= $alter['NISN']; ?>" class="btn btn-danger btn-square rounded-0" onclick="return confirm('Hapus Alternatif?');">
                            <i class="fas fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                	<?php 
                		endwhile; 
                	?>  
                </tbody>
            </table>
        </div>
    </div>
</div>