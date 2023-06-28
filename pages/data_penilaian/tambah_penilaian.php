<?php
    // menangkap data alternatif sesuai nama siswa
    $namaSiswa = "SELECT * FROM data_alternatif WHERE ID_Alter = '$_GET[penilaian]'";
    $rendSiswa = mysqli_query($koneksi_db, $namaSiswa);
    $res = mysqli_fetch_assoc($rendSiswa);

    // nama kriteria
    $namaKriteria = "SELECT Nama_Kriteria FROM data_kriteria";
    $rendKriteria = mysqli_query($koneksi_db, $namaKriteria);

    // id kriteria
    $querykrit = "SELECT ID_Kriteria FROM data_kriteria";
    $hasil = mysqli_query($koneksi_db, $querykrit);

    // memasukan semua data id kriteria ke array
    $row = [];
    while ($resKrit = mysqli_fetch_assoc($hasil)) {
        $row[] = $resKrit['ID_Kriteria'];
    }
  
    // jumlah data kriteria  
    $cekJuml = "SELECT COUNT(ID_Kriteria) FROM data_kriteria";
    $total = mysqli_query($koneksi_db, $cekJuml);
    $tes = mysqli_fetch_row($total);
    $jumlah = $tes[0];
    
    if (isset($_POST['simpan'])) {
        $i = 1;
        while ($i <= $jumlah) {
            $alternatif = $res['ID_Alter'];
            $kriteria = $row[$i-1];
            $nilai = htmlspecialchars($_POST['nilai'][$i-1]);

            // var_dump($alternatif .' & '.$kriteria. ' & ' .$nilai);

            $sql = "INSERT INTO data_penilaian VALUES ('', '$alternatif', '$kriteria', '$nilai')";
            $tes = mysqli_query($koneksi_db, $sql);

            $i++;
        }

        // die();
        echo '<script>
            document.location.href = "index.php?page=data_penilaian";
        </script>';
    }

?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-1">
  <h1 class="h3 text-gray-800"><?= $res['Nama_Siswa']; ?></h1>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4 rounded-0">
    <div class="card-header py-3 d-flex">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Penilaian</h6>
    </div>
    <div class="card-body">
        <form action="" method="post">
            <?php
                $i = 1;  
                while ($i <= $jumlah) :   
            ?>
                <?php 
                    while ($krit = mysqli_fetch_assoc($rendKriteria)) : 
                ?>
                    <div class="mb-4">
                      <label for="exampleFormControlInput1" class="form-label"><?= $krit['Nama_Kriteria']; ?></label>
                        <select class="form-control rounded-0" aria-label="Default select example" name="nilai[]" required>
                          <option selected disabled>-- Pilih Penilaian --</option>
                          <?php 
                            $sub = "SELECT data_subkriteria.ID_Sub, data_kriteria.ID_Kriteria, data_kriteria.Nama_Kriteria, 
                            data_subkriteria.Nama_Subkriteria, data_subkriteria.Keterangan, data_subkriteria.Nilai FROM 
                            data_subkriteria INNER JOIN data_kriteria ON data_subkriteria.ID_Kriteria = data_kriteria.ID_Kriteria 
                            WHERE Nama_Kriteria = '$krit[Nama_Kriteria]'";

                            $datasub = mysqli_query($koneksi_db, $sub);

                            while ($res = mysqli_fetch_assoc($datasub)) :
                          ?>  
                            <option value="<?= $res['Nilai']; ?>"><?= $res['Nama_Subkriteria']; ?> - <?= $res['Nilai']; ?> - 
                            <?= $res['Keterangan']; ?></option>
                          <?php endwhile; ?>
                        </select>
                    </div>
                <?php endwhile; ?>
            <?php 
                $i++;
                endwhile; 
            ?>
            <a href="index.php?page=data_penilaian" class="btn btn-success btn-square rounded-0">
                <i class="fas fa-chevron-left fa-sm"></i> Kembali
            </a>
            <button type="submit" class="btn btn-success btn-square rounded-0" name="simpan">
                <i class="fas fa-save fa-sm"></i> Simpan
            </button>
        </form>
    </div>
</div>