<?php
    // mengambil data kriteria 
    $namaKrit = $_GET['edit']; 
    $sqlEdit = "SELECT * FROM data_kriteria WHERE Nama_Kriteria = '$namaKrit'";
    $queryEdit = mysqli_query($koneksi_db, $sqlEdit);
    $data = mysqli_fetch_assoc($queryEdit);
    
    // fungsi edit
    if (isset($_POST['edit'])) {
        $kriteria = htmlspecialchars($_POST['nama_kriteria']);
        $bobot = htmlspecialchars($_POST['bobot']);
        $atribut = htmlspecialchars($_POST['atribut']);

        $sql = "UPDATE data_kriteria SET Nama_Kriteria = '$kriteria', Nilai_Bobot = '$bobot', Atribut = '$atribut'
        WHERE ID_Kriteria = '$_GET[id]'";
        mysqli_query($koneksi_db, $sql);

        echo '<script>
            document.location.href = "index.php?page=data_kriteria";
        </script>';
    }

?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Edit Kriteria</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4 rounded-0">
    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data Kriteria</h6>
    </div>
    <div class="card-body">
        <form action="" method="post">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Nama Kriteria</label>
              <input type="text" class="form-control rounded-0" id="exampleFormControlInput1" name="nama_kriteria" value="<?= $data['Nama_Kriteria']; ?>" required>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Nilai Bobot</label>
              <input type="text" class="form-control rounded-0" id="exampleFormControlInput1" name="bobot" value="<?= $data['Nilai_Bobot']; ?>" required>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Atribut</label>
              <select class="form-control rounded-0" aria-label="Default select example" name="atribut" required>
                  <option selected value="<?= $data['Atribut']; ?>" class="bg-secondary text-white"><?= $data['Atribut']; ?></option>
                  <option value="Benefit">Benefit</option>
                  <option value="Cost">Cost</option>
                </select>
            </div>
            <a href="index.php?page=data_kriteria" class="btn btn-success btn-square rounded-0">
                Kembali
            </a>
            <button type="submit" class="btn btn-success btn-square rounded-0" name="edit">
                Edit
            </button>
        </form>
    </div>
</div>