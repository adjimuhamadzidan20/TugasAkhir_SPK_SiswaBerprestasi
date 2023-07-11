<?php
    $idSub = $_GET['edit'];
    $sqlSub = mysqli_query($koneksi_db, "SELECT data_subkriteria.ID_Sub, data_kriteria.ID_Kriteria, data_kriteria.Nama_Kriteria, 
    data_subkriteria.Nama_Subkriteria, data_subkriteria.Keterangan, data_subkriteria.Nilai FROM data_subkriteria INNER JOIN 
    data_kriteria ON data_subkriteria.ID_Kriteria = data_kriteria.ID_Kriteria WHERE ID_Sub = '$idSub'");
    $dataSub = mysqli_fetch_assoc($sqlSub);
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-1">
  <h1 class="h3 text-gray-800">Edit Sub Kriteria <?= $dataSub['Nama_Kriteria']; ?></h1>
</div>

<!-- DataTales Example -->
<div class="card mb-4 rounded-0">
    <div class="card-body">
        <form action="pages/data_sub_kriteria/proses_edit_subkriteria.php?id=<?= $_GET['edit']; ?>" method="post">
            <input type="text" class="form-control rounded-0" id="exampleFormControlInput1" name="idkriteria" 
            value="<?= $dataSub['ID_Kriteria']; ?>" hidden="hidden">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Sub Kriteria</label>
                <input type="text" class="form-control rounded-0" id="exampleFormControlInput1" name="sub_kriteria" 
              value="<?= $dataSub['Nama_Subkriteria']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Keterangan</label>
                <input type="text" class="form-control rounded-0" id="exampleFormControlInput1" name="ket" 
              value="<?= $dataSub['Keterangan']; ?>" required>
            </div>
            <div class="mb-4">
                <label for="exampleFormControlInput1" class="form-label">Nilai</label>
                <input type="text" class="form-control rounded-0" id="exampleFormControlInput1" name="nilai"
              value="<?= $dataSub['Nilai']; ?>" required>
            </div>
            <a href="index.php?page=tambah_subkriteria&idkriteria=<?= $dataSub['ID_Kriteria']; ?>&kriteria=<?= $dataSub['Nama_Kriteria']; ?>" class="btn btn-secondary btn-square rounded-0">
                <i class="fas fa-chevron-left fa-sm"></i> Kembali
            </a>
            <button type="submit" class="btn btn-success btn-square rounded-0">
                <i class="fas fa-edit fa-sm"></i> Edit
            </button>
        </form>
    </div>
</div>