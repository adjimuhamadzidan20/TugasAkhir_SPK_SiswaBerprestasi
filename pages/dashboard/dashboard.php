<?php  
    $queryKrit = mysqli_query($koneksi_db, "SELECT COUNT(Nama_Kriteria) FROM data_kriteria");
    $queryAlt= mysqli_query($koneksi_db, "SELECT COUNT(Nama_Siswa) FROM data_alternatif");
    $querySub = mysqli_query($koneksi_db, "SELECT COUNT(Nama_Subkriteria) FROM data_subkriteria");

    $resKrit = mysqli_fetch_row($queryKrit);
    $resAlt = mysqli_fetch_row($queryAlt);
    $resSub = mysqli_fetch_row($querySub);

?>


<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 text-uppercase">SPK Siswa Berprestasi SMKN 9 Kota Bekasi</h1>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2 rounded-0">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Kriteria</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Total <?= $resKrit[0]; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2 rounded-0">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Alternatif</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Total <?= $resAlt[0]; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2 rounded-0">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Subkriteria
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Total <?= $resSub[0]; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>