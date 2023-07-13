<?php
    // if untuk handling notice error
    if (isset($_GET['idkriteria']) AND isset($_GET['kriteria'])) {
        $id = $_GET['idkriteria'];
        $krit = $_GET['kriteria'];

        // mengambil data id kriteria   
        $sql = "SELECT * FROM data_kriteria WHERE ID_Kriteria = '$id'";
        $kriteria = mysqli_query($koneksi_db, $sql);
        $data = mysqli_fetch_assoc($kriteria);

        $data_sub = "SELECT data_subkriteria.ID_Sub, data_kriteria.ID_Kriteria, data_kriteria.Nama_Kriteria, data_subkriteria.
        Nama_Subkriteria, data_subkriteria.Keterangan, data_subkriteria.Nilai FROM data_subkriteria INNER JOIN data_kriteria ON 
        data_subkriteria.ID_Kriteria = data_kriteria.ID_Kriteria WHERE Nama_Kriteria = '$krit'";
        $sub = mysqli_query($koneksi_db, $data_sub);

    } else {
        // setting blank index
        $id = '';
        $krit = '';

        // fungsi delete
        if (isset($_GET['delete'])) {
            $namaSub = $_GET['delete'];
            $sqlDel = "DELETE FROM data_subkriteria WHERE Nama_Subkriteria = '$namaSub'";
            $query = mysqli_query($koneksi_db, $sqlDel);

            echo '<script>
                document.location.href = "index.php?page=sub_kriteria";
            </script>';
        }
    }
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-1">
  <h1 class="h3 text-gray-800">Tambah Sub Kriteria <?= $data['Nama_Kriteria']; ?></h1>
</div>

<!-- popup status -->
<?php  
    if (isset($_SESSION['pesan']) && isset($_SESSION['status'])) :
?>
    <div class="alert alert-<?= $_SESSION['status']; ?> rounded-0" role="alert" id="notif">
      <?= $_SESSION['pesan']; ?>
    </div>
<?php  
    unset($_SESSION['pesan']);
    unset($_SESSION['status']);
    endif;
?>

<!-- DataTales Example -->
<div class="card mb-4 rounded-0">
    <div class="card-body">
        <form action="pages/data_sub_kriteria/proses_tambah_subkriteria.php?id=<?= $_GET['idkriteria']; ?>&nama=<?= $_GET['kriteria']; ?>" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Sub Kriteria</label>
                <input type="text" class="form-control rounded-0" id="exampleFormControlInput1" name="sub_kriteria" placeholder="Masukkan Nama Sub" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Keterangan</label>
                <input type="text" class="form-control rounded-0" id="exampleFormControlInput1" name="ket" placeholder="Masukkan Keterangan" required>
            </div>
            <div class="mb-4">
                <label for="exampleFormControlInput1" class="form-label">Nilai</label>
                <input type="text" class="form-control rounded-0" id="exampleFormControlInput1" name="nilai" placeholder="Masukkan Nilai" required>
            </div>
            <a href="index.php?page=sub_kriteria" class="btn btn-secondary btn-square rounded-0">
                <i class="fas fa-chevron-left fa-sm"></i> Kembali
            </a>
            <button type="submit" class="btn btn-success btn-square rounded-0">
                <i class="fas fa-save fa-sm"></i> Simpan
            </button>
        </form>
    </div>
</div>
<div class="card rounded-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-nowrap">No</th>
                        <th class="text-nowrap">Kriteria</th>
                        <th class="text-nowrap">Sub Kriteria</th>
                        <th class="text-nowrap">Keterangan</th>
                        <th class="text-nowrap">Nilai</th>
                        <th class="text-nowrap">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                        $no = 0;
                        while ($subkrit = mysqli_fetch_assoc($sub)) :
                        $no++;
                    ?>
                    <tr>
                        <td class="text-nowrap"><?= $no; ?></td>
                        <td class="text-nowrap"><?= $subkrit['Nama_Kriteria']; ?></td>
                        <td class="text-nowrap"><?= $subkrit['Nama_Subkriteria']; ?></td>
                        <td class="text-nowrap"><?= $subkrit['Keterangan']; ?></td>
                        <td class="text-nowrap"><?= $subkrit['Nilai']; ?></td>
                        <td class="text-center text-nowrap">
                            <a href="index.php?page=edit_subkriteria&edit=<?= $subkrit['ID_Sub']; ?>" title="Edit Sub" class="btn btn-success btn-square rounded-0">
                                <i class="fas fa-edit"></i>
                            </a>
                            
                            <button class="btn btn-success btn-square rounded-0" title="Hapus Sub" data-toggle="modal" data-target="#hapusid<?= $subkrit['ID_Sub']; ?>">
                                <i class="fas fa-trash"></i>
                            </button>

                            <!--Modal Hapus Data-->
                            <div class="modal fade" id="hapusid<?= $subkrit['ID_Sub']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content rounded-0 border-0">
                                        <div class="modal-body">
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true"><i class="fas fa-times fa-xs"></i></span>
                                           </button>
                                            <p class="modal-title text-left" id="exampleModalLabel">Hapus Sub kriteria?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary rounded-0" type="button" data-dismiss="modal"><i class="fas fa-chevron-left fa-sm"></i> Kembali</button>
                                            <a class="btn btn-success rounded-0" href="index.php?page=tambah_subkriteria&delete=<?= $subkrit['Nama_Subkriteria']; ?>"><i class="fas fa-trash fa-sm"></i> Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
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