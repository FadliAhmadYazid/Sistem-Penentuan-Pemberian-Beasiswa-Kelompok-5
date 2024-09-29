<?php  
$normali = mysqli_query($koneksi_db, "SELECT Nama_Kriteria FROM data_kriteria");
$mahasiswa = mysqli_query($koneksi_db, "SELECT ID_Alter, Nama_Mahasiswa FROM data_alternatif");
?>

<div class="card mb-4 rounded-0">
    <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
        <h6 class="m-0 text-gray-800">Hasil Normalisasi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center" width="100%" cellspacing="0">
                <thead class="thead-light">
                    <tr>
                        <th class="text-nowrap">No</th>
                        <th class="text-nowrap">Alternatif</th>
                        <?php  
                        $no = 0;
                        while ($krit = mysqli_fetch_assoc($normali)) :
                            $no++;
                        ?>
                        <th class="text-nowrap"><?= 'C'. str_pad($no, 2, '0', STR_PAD_LEFT); ?></th>
                        <?php endwhile; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;   
                    while ($sis = mysqli_fetch_assoc($mahasiswa)) :
                        $no++;
                    ?>
                    <tr>
                        <td class="text-nowrap"><?= $no; ?></td>
                        <td class="text-nowrap text-uppercase"><?= htmlspecialchars($sis['Nama_Mahasiswa']); ?></td>
                        <?php  
                        $hasil = mysqli_query($koneksi_db, "SELECT Hasil_Norm FROM hasil_normalisasi 
                        WHERE ID_Alter = '$sis[ID_Alter]'");

                        while ($nilai = mysqli_fetch_assoc($hasil)) :
                        ?>
                        <td class="text-nowrap"><?= round($nilai['Hasil_Norm'], 3); ?></td>
                        <?php endwhile; ?>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .table th, .table td {
        vertical-align: middle; /* Center content vertically */
    }
    .table-hover tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.075); /* Light gray on hover */
    }
</style>
