<?php  
    if (@$_GET['page'] == 'dashboard') {
        $activ1 = 'active';
        $activ2 = '';
        $activ3 = '';
        $activ4 = '';
        $activ5 = '';
        $activ6 = '';
        $activ7 = '';
        $activ8 = '';
    } else if (@$_GET['page'] == 'data_mahaiswa') {
        $activ1 = '';
        $activ2 = 'active';
        $activ3 = '';
        $activ4 = '';
        $activ5 = '';
        $activ6 = '';
        $activ7 = '';
        $activ8 = '';
    } else if (@$_GET['page'] == 'data_kriteria') {
        $activ1 = '';
        $activ2 = '';
        $activ3 = 'active';
        $activ4 = '';
        $activ5 = '';
        $activ6 = '';
        $activ7 = '';
        $activ8 = ''; 
    } else if (@$_GET['page'] == 'data_penilaian') {
        $activ1 = '';
        $activ2 = '';
        $activ3 = '';
        $activ4 = 'active';
        $activ5 = '';
        $activ6 = '';
        $activ7 = '';
        $activ8 = '';
    } else if (@$_GET['page'] == 'proses_perhitungan') {
        $activ1 = '';
        $activ2 = '';
        $activ3 = '';
        $activ4 = '';
        $activ5 = 'active';
        $activ6 = '';
        $activ7 = '';
        $activ8 = '';
    } else if (@$_GET['page'] == 'hasil_perhitungan') {
        $activ1 = '';
        $activ2 = '';
        $activ3 = '';
        $activ4 = '';
        $activ5 = '';
        $activ6 = 'active';
        $activ7 = '';
        $activ8 = '';
    } else if (@$_GET['page'] == 'laporan') {
        $activ1 = '';
        $activ2 = '';
        $activ3 = '';
        $activ4 = '';
        $activ5 = '';
        $activ6 = '';
        $activ7 = 'active';
        $activ8 = '';
    } else if (@$_GET['page'] == 'informasi') {
        $activ1 = '';
        $activ2 = '';
        $activ3 = '';
        $activ4 = '';
        $activ5 = '';
        $activ6 = '';
        $activ7 = '';
        $activ8 = 'active';
    } else {
        $activ1 = '';
        $activ2 = '';
        $activ3 = '';
        $activ4 = '';
        $activ5 = '';
        $activ6 = '';
        $activ7 = '';
        $activ8 = '';
    }
?>

<!-- Nav Item - Dashboard -->
<li class="nav-item <?= $activ1 ?>">
    <a class="nav-link" href="index.php?page=dashboard">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Beranda</span></a>
</li>

<!-- Nav Item - Data Mahasiswa -->
<li class="nav-item <?= $activ2 ?>">
    <a class="nav-link collapsed" href="index.php?page=data_mahasiswa"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-tasks"></i>
        <span>Data Mahasiswa</span>
    </a>
</li>

<!-- Nav Item - Data Kriteria -->
<li class="nav-item <?= $activ3 ?>">
    <a class="nav-link collapsed" href="index.php?page=data_kriteria"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-tasks"></i>
        <span>Data Kriteria</span>
    </a>
</li>

<!-- Nav Item - Data Nilai Mahasiswa -->
<li class="nav-item <?= $activ4 ?>">
    <a class="nav-link collapsed" href="index.php?page=data_penilaian"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-tasks"></i>
        <span>Data Nilai Mahasiswa</span>
    </a>
</li>

<!-- Nav Item - Proses Perhitungan -->
<li class="nav-item <?= $activ5 ?>">
    <a class="nav-link collapsed" href="index.php?page=proses_perhitungan"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-calculator"></i>
        <span>Proses Perhitungan</span>
    </a>
</li>

<!-- Nav Item - Hasil Perhitungan -->
<li class="nav-item <?= $activ6 ?>">
    <a class="nav-link collapsed" href="index.php?page=hasil_perhitungan"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-table"></i>
        <span>Hasil Perhitungan</span>
    </a>
</li>
