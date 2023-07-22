<?php  
    $normali = mysqli_query($koneksi_db, "SELECT Nama_Kriteria FROM data_kriteria");
    $siswa = mysqli_query($koneksi_db, "SELECT ID_Alter, Nama_Siswa FROM data_alternatif");
?>

<div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
    <h6 class="m-0 text-gray-800">Hasil Normalisasi</h6>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th class="text-nowrap">No</th>
                    <th class="text-nowrap">Alternatif</th>
                    <?php  
                        while ($krit = mysqli_fetch_assoc($normali)) :
                    ?>
                        <th class="text-nowrap"><?= $krit['Nama_Kriteria']; ?></th>
                    <?php endwhile; ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 0;   
                    while ($sis = mysqli_fetch_assoc($siswa)) :
                    $no++;
                ?>
                <tr>
                    <td class="text-nowrap"><?= $no; ?></td>
                    <td class="text-nowrap"><?= $sis['Nama_Siswa']; ?></td>
                    <?php  
                        $hasil = mysqli_query($koneksi_db, "SELECT Hasil_Norm FROM hasil_normalisasi 
                        WHERE ID_Alter = '$sis[ID_Alter]'");

                        while ($nilai = mysqli_fetch_assoc($hasil)) :
                    ?>
                        <td class="text-nowrap"><?= $nilai['Hasil_Norm']; ?></td>
                    <?php endwhile; ?>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>