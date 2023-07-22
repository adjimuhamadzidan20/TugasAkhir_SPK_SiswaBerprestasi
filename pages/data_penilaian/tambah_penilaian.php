<?php
    // nama kriteria
    $namaKriteria = "SELECT Nama_Kriteria FROM data_kriteria";
    $rendKriteria = mysqli_query($koneksi_db, $namaKriteria);

    // menangkap data alternatif sesuai nama siswa
    $idAlt = $_GET['penilaian'];
    $namaSiswa = "SELECT * FROM data_alternatif WHERE ID_Alter = '$idAlt'";
    $rendSiswa = mysqli_query($koneksi_db, $namaSiswa);
    $res = mysqli_fetch_assoc($rendSiswa);

    // jumlah data kriteria  
    $cekJuml = "SELECT COUNT(ID_Kriteria) FROM data_kriteria";
    $total = mysqli_query($koneksi_db, $cekJuml);
    $tes = mysqli_fetch_row($total);
    $jumlah = $tes[0];
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-1">
  <h1 class="h3 text-gray-800">Nama Siswa : <?= $res['Nama_Siswa']; ?></h1>
</div>

<!-- DataTales Example -->
<div class="card mb-4 rounded-0">
    <div class="card-header bg-white py-3 d-flex">
        <h6 class="m-0 text-gray-800">Tambah Penilaian</h6>
    </div>
    <div class="card-body">
        <form action="pages/data_penilaian/proses_tambah_penilaian.php?id=<?= $_GET['penilaian']; ?>" method="post">
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
                            <option value="<?= $res['Nilai']; ?>"><?= $res['Nama_Subkriteria']; ?> - <?= $res['Keterangan']; ?> - 
                            <?= $res['Nilai']; ?>
                            </option>
                          <?php endwhile; ?>
                        </select>
                    </div>
                <?php endwhile; ?>
            <?php 
                $i++;
                endwhile; 
            ?>
            <a href="index.php?page=data_penilaian" class="btn btn-secondary btn-square rounded-0">
                <i class="fas fa-chevron-left fa-sm"></i> Kembali
            </a>
            <button type="submit" class="btn btn-success btn-square rounded-0">
                <i class="fas fa-save fa-sm"></i> Simpan
            </button>
        </form>
    </div>
</div>