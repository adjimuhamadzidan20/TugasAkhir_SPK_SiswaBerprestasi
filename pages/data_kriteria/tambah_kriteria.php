<?php   
    if (isset($_POST['simpan'])) {
        $kriteria = htmlspecialchars($_POST['nama_kriteria']);
        $bobot = htmlspecialchars($_POST['bobot']);
        $atribut = htmlspecialchars($_POST['atribut']);

        $query = mysqli_query($koneksi_db, "SELECT Nama_Kriteria FROM data_kriteria WHERE Nama_Kriteria = '$kriteria'");
        $namaKrit = mysqli_num_rows($query);

        // validasi input nama kriteria sudah ada atau belum
        if ($namaKrit > 0) {
            echo '<script>
                alert("Nama kriteria sudah ada!");
                document.location.href = "index.php?page=tambah_kriteria";
            </script>';
        } else {
            $sql = "INSERT INTO data_kriteria VALUES ('', '$kriteria', '$bobot', '$atribut')";
            mysqli_query($koneksi_db, $sql);

            echo '<script>
                document.location.href = "index.php?page=data_kriteria";
            </script>';
        }
    }

?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-1">
  <h1 class="h3 text-gray-800">Tambah Kriteria</h1>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4 rounded-0">
    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary">Masukkan Data Kriteria Baru</h6>
    </div>
    <div class="card-body">
        <form action="" method="post">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Nama Kriteria</label>
              <input type="text" class="form-control rounded-0" id="exampleFormControlInput1" name="nama_kriteria" placeholder="Masukkan Kriteria" required>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Nilai Bobot</label>
              <input type="text" class="form-control rounded-0" id="exampleFormControlInput1" name="bobot" placeholder="Masukkan Bobot" required>
            </div>
            <div class="mb-4">
              <label for="exampleFormControlInput1" class="form-label">Atribut</label>
              <select class="form-control rounded-0" aria-label="Default select example" name="atribut" required>
                  <option selected disabled>-- Pilih Atribut --</option>
                  <option value="Benefit">Benefit</option>
                  <option value="Cost">Cost</option>
                </select>
            </div>
            <a href="index.php?page=data_kriteria" class="btn btn-success btn-square rounded-0">
                <i class="fas fa-chevron-left fa-sm"></i> Kembali
            </a>
            <button type="submit" class="btn btn-success btn-square rounded-0" name="simpan">
                <i class="fas fa-save fa-sm"></i> Simpan
            </button>
        </form>
    </div>
</div>