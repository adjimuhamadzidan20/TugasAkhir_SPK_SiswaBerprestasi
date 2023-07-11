<?php
    // menangkap data alternatif
    $idAlt = $_GET['edit'];
    $sqlSis = "SELECT * FROM data_alternatif WHERE ID_Alter = '$idAlt'";
    $querySis = mysqli_query($koneksi_db, $sqlSis);
    $data = mysqli_fetch_assoc($querySis);
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-1">
  <h1 class="h3 text-gray-800">Edit Alternatif</h1>
</div>

<!-- DataTales Example -->
<div class="card mb-4 rounded-0">
    <div class="card-header bg-white py-3 d-flex">
        <h6 class="m-0 text-gray-800">Edit Data Alternatif</h6>
    </div>
    <div class="card-body">
        <form action="pages/data_alternatif/proses_edit_alternatif.php?id=<?= $_GET['edit']; ?>" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">NISN</label>
                <input type="text" class="form-control rounded-0" id="exampleFormControlInput1" name="nisn" value="<?= $data['NISN']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Siswa</label>
                <input type="text" class="form-control rounded-0" id="exampleFormControlInput1" name="nama_siswa" 
                value="<?= $data['Nama_Siswa']; ?>" required>
            </div>
            <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">JK</label>
                <select class="form-control rounded-0" aria-label="Default select example" name="jenis_kelamin" required>
                    <option selected value="<?= $data['JK']; ?>" class="bg-secondary text-white"><?= $data['JK']; ?></option>
                    <option value="L">L</option>
                    <option value="P">P</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="exampleFormControlInput1" class="form-label">Kelas</label>
                <select class="form-control rounded-0" aria-label="Default select example" name="kelas" required>
                    <option selected value="<?= $data['Kelas']; ?>" class="bg-secondary text-white"><?= $data['Kelas']; ?></option>
                    <option value="X DKV 1">X DKV 1</option>
                    <option value="X DKV 2">X DKV 2</option>
                    <option value="X DKV 3">X DKV 3</option>
                    <option value="XI DKV 1">XI DKV 1</option>
                    <option value="XI DKV 2">XI DKV 2</option>
                    <option value="XI DKV 3">XI DKV 3</option>
                    <option value="XII DKV 1">XII DKV 1</option>
                    <option value="XII DKV 2">XII DKV 2</option>
                    <option value="XII DKV 3">XII DKV 3</option>
                    <option value="X PBKM 1">X PBKM 1</option>
                    <option value="X PBKM 2">X PBKM 2</option>
                    <option value="X PBKM 3">X PBKM 3</option>
                    <option value="XI PBKM 1">XI PBKM 1</option>
                    <option value="XI PBKM 2">XI PBKM 2</option>
                    <option value="XI PBKM 3">XI PBKM 3</option>
                    <option value="XII PBKM 1">XII PBKM 1</option>
                    <option value="XII PBKM 2">XII PBKM 2</option>
                    <option value="XII PBKM 3">XII PBKM 3</option>
                    <option value="X SIJA 1">X SIJA 1</option>
                    <option value="X SIJA 2">X SIJA 2</option>
                    <option value="X SIJA 3">X SIJA 3</option>
                    <option value="XI SIJA 1">XI SIJA 1</option>
                    <option value="XI SIJA 2">XI SIJA 2</option>
                    <option value="XI SIJA 3">XI SIJA 3</option>
                    <option value="XII SIJA 1">XII SIJA 1</option>
                    <option value="XII SIJA 2">XII SIJA 2</option>
                    <option value="XII SIJA 3">XII SIJA 3</option>
                </select>
            </div>
            <a href="index.php?page=data_siswa" class="btn btn-secondary btn-square rounded-0">
                <i class="fas fa-chevron-left fa-sm"></i> Kembali
            </a>
            <button type="submit" class="btn btn-success btn-square rounded-0">
                <i class="fas fa-edit fa-sm"></i> Edit
            </button>
        </form>
    </div>
</div>