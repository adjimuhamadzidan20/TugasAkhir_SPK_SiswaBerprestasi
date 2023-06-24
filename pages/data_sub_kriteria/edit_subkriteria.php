<?php
    // mengambil data id kriteria   
    // $sql = "SELECT * FROM data_kriteria WHERE ID_Kriteria = '$_GET[idkriteria]'";
    // $kriteria = mysqli_query($koneksi_db, $sql);
    // $data = mysqli_fetch_assoc($kriteria);

    // $data_sub = "SELECT data_subkriteria.ID_Sub, data_kriteria.ID_Kriteria, data_kriteria.Nama_Kriteria, data_subkriteria.
    // Nama_Subkriteria, data_subkriteria.Keterangan, data_subkriteria.Nilai FROM data_subkriteria INNER JOIN data_kriteria ON 
    // data_subkriteria.ID_Kriteria = data_kriteria.ID_Kriteria WHERE Nama_Kriteria = '$_GET[kriteria]'";
    // $sub = mysqli_query($koneksi_db, $data_sub);
    $idSub = $_GET['edit'];
    $sqlSub = mysqli_query($koneksi_db, "SELECT data_subkriteria.ID_Sub, data_kriteria.ID_Kriteria, data_kriteria.Nama_Kriteria, 
    data_subkriteria.Nama_Subkriteria, data_subkriteria.Keterangan, data_subkriteria.Nilai FROM data_subkriteria INNER JOIN 
    data_kriteria ON data_subkriteria.ID_Kriteria = data_kriteria.ID_Kriteria WHERE ID_Sub = '$idSub'");
    $dataSub = mysqli_fetch_assoc($sqlSub);

    if (isset($_POST['edit'])) {
        $idKriteria = htmlspecialchars($_POST['idkriteria']);
        $subkriteria = htmlspecialchars($_POST['sub_kriteria']);
        $keterangan = htmlspecialchars($_POST['ket']);
        $nilai = htmlspecialchars($_POST['nilai']);

        $sql = "UPDATE data_subkriteria SET ID_Kriteria = '$idKriteria', Nama_Subkriteria = '$subkriteria', Keterangan = '$keterangan',
        Nilai = '$nilai' WHERE ID_Sub = '$idSub'";
        mysqli_query($koneksi_db, $sql);

        // die();

        echo '<script>
            document.location.href = "index.php?page=sub_kriteria";
        </script>';
    }

?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Edit Sub Kriteria <?= $dataSub['Nama_Kriteria']; ?></h1>

<!-- DataTales Example -->
<div class="card shadow mb-4 rounded-0">
    <div class="card-body">
        <form action="" method="post">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">ID Kriteria</label>
              <input type="text" class="form-control rounded-0" id="exampleFormControlInput1" name="idkriteria" 
              value="<?= $dataSub['ID_Kriteria']; ?>" readonly="readonly">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Sub Kriteria</label>
              <input type="text" class="form-control rounded-0" id="exampleFormControlInput1" name="sub_kriteria" 
              value="<?= $dataSub['Nama_Subkriteria']; ?>">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Keterangan</label>
              <input type="text" class="form-control rounded-0" id="exampleFormControlInput1" name="ket" 
              value="<?= $dataSub['Keterangan']; ?>">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Nilai</label>
              <input type="text" class="form-control rounded-0" id="exampleFormControlInput1" name="nilai"
              value="<?= $dataSub['Nilai']; ?>">
            </div>
            <button type="submit" class="btn btn-success btn-square rounded-0" name="edit">
                Edit
            </button>
            <a href="index.php?page=tambah_subkriteria&idkriteria=<?= $dataSub['ID_Kriteria']; ?>&kriteria=<?= $dataSub['Nama_Kriteria']; ?>" class="btn btn-success btn-square rounded-0">
                Kembali
            </a>
        </form>
    </div>
</div>