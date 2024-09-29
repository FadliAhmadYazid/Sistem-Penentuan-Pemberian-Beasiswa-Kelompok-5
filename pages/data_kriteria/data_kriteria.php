<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 text-gray-800">Data Kriteria</h1>
</div>

<!-- Popup Status -->
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
    <div class="card-header bg-white py-3">
        <h6 class="m-0 text-gray-800">Tabel Data Kriteria & Bobot</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-light">
                    <tr>
                        <th class="text-nowrap">Kode</th>
                        <th class="text-nowrap">Nama Kriteria</th>
                        <th class="text-nowrap">Nilai Bobot</th>
                        <th class="text-nowrap">Atribut</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                    $kriteria_static = [
                        ['Kode' => 'C1', 'Nama_Kriteria' => 'Pekerjaan Orang Tua', 'Nilai_Bobot' => '25', 'Atribut' => 'Cost (-)'],
                        ['Kode' => 'C2', 'Nama_Kriteria' => 'Penghasilan Orang Tua', 'Nilai_Bobot' => '25', 'Atribut' => 'Cost (-)'],
                        ['Kode' => 'C3', 'Nama_Kriteria' => 'Jumlah Tanggungan', 'Nilai_Bobot' => '25', 'Atribut' => 'Benefit (+)'],
                        ['Kode' => 'C4', 'Nama_Kriteria' => 'IPK', 'Nilai_Bobot' => '10', 'Atribut' => 'Benefit (+)'],
                        ['Kode' => 'C5', 'Nama_Kriteria' => 'Bukti Keterangan Tidak Mampu', 'Nilai_Bobot' => '20', 'Atribut' => 'Benefit (+)'],
                        ['Kode' => 'C6', 'Nama_Kriteria' => 'Mahasiswa Aktif', 'Nilai_Bobot' => '20', 'Atribut' => 'Benefit (+)'],
                    ];

                    foreach ($kriteria_static as $krit) :
                    ?>
                        <tr>
                            <td class="text-nowrap"><?= htmlspecialchars($krit['Kode']); ?></td>
                            <td class="text-nowrap"><?= htmlspecialchars($krit['Nama_Kriteria']); ?></td>
                            <td class="text-nowrap"><?= htmlspecialchars($krit['Nilai_Bobot']); ?></td>
                            <td class="text-nowrap"><?= htmlspecialchars($krit['Atribut']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    /* Custom styles for tables */
    .table th, .table td {
        vertical-align: middle;
    }
    .table-hover tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.075);
    }
</style>
