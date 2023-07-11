<?php
    // mengambil data kriteria 
    $idKrit = $_GET['edit']; 
    $sqlEdit = "SELECT * FROM data_kriteria WHERE ID_Kriteria = '$idKrit'";
    $queryEdit = mysqli_query($koneksi_db, $sqlEdit);
    $data = mysqli_fetch_assoc($queryEdit);
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-1">
    <h1 class="h3 text-gray-800">Edit Kriteria</h1>
</div>

<!-- DataTales Example -->
<div class="card mb-4 rounded-0">
    <div class="card-header bg-white py-3 d-flex">
        <h6 class="m-0 text-gray-800">Edit Data Kriteria</h6>
    </div>
    <div class="card-body">
        <form action="pages/data_kriteria/proses_edit_kriteria.php?id=<?= $_GET['edit']; ?>" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Kriteria</label>
                <input type="text" class="form-control rounded-0" id="exampleFormControlInput1" name="nama_kriteria" 
                value="<?= $data['Nama_Kriteria']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nilai Bobot</label>
                <input type="text" class="form-control rounded-0" id="exampleFormControlInput1" name="bobot" 
                value="<?= $data['Nilai_Bobot']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Atribut</label>
                <select class="form-control rounded-0" aria-label="Default select example" name="atribut" required>
                    <option selected value="<?= $data['Atribut']; ?>" class="bg-secondary text-white"><?= $data['Atribut']; ?></option>
                    <option value="Benefit">Benefit</option>
                    <option value="Cost">Cost</option>
                </select>
            </div>
            <a href="index.php?page=data_kriteria" class="btn btn-secondary btn-square rounded-0">
                <i class="fas fa-chevron-left fa-sm"></i> Kembali
            </a>
            <button type="submit" class="btn btn-success btn-square rounded-0">
                <i class="fas fa-edit fa-sm"></i> Edit
            </button>
        </form>
    </div>
</div>