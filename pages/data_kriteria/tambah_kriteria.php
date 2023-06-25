<?php  
    
    if (isset($_POST['simpan'])) {
        $kriteria = htmlspecialchars($_POST['nama_kriteria']);
        $bobot = htmlspecialchars($_POST['bobot']);
        $atribut = htmlspecialchars($_POST['atribut']);

        $sql = "INSERT INTO data_kriteria VALUES ('', '$kriteria', '$bobot', '$atribut')";
        mysqli_query($koneksi_db, $sql);

        echo '<script>
            document.location.href = "index.php?page=data_kriteria";
        </script>';
    }

?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tambah Kriteria</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4 rounded-0">
    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary">Masukkan Data Kriteria Baru</h6>
    </div>
    <div class="card-body">
        <form action="" method="post">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Nama Kriteria</label>
              <input type="text" class="form-control rounded-0" id="exampleFormControlInput1" name="nama_kriteria" required>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Nilai Bobot</label>
              <input type="text" class="form-control rounded-0" id="exampleFormControlInput1" name="bobot" required>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Atribut</label>
              <select class="form-control rounded-0" aria-label="Default select example" name="atribut" required>
                  <option selected disabled>-- Pilih Atribut --</option>
                  <option value="Benefit">Benefit</option>
                  <option value="Cost">Cost</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success btn-square rounded-0" name="simpan">
                Simpan
            </button>
            <a href="index.php?page=data_kriteria" class="btn btn-success btn-square rounded-0">
                Kembali
            </a>
        </form>
    </div>
</div>