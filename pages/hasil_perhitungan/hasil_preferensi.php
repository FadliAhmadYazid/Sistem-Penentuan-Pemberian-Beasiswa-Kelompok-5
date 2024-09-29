<?php  
$pref = mysqli_query($koneksi_db, "SELECT hasil_preferensi.ID_Pref, hasil_preferensi.ID_Alter, data_alternatif.Nama_Mahasiswa, 
hasil_preferensi.hasil_pref FROM hasil_preferensi INNER JOIN data_alternatif ON 
hasil_preferensi.ID_Alter = data_alternatif.ID_Alter");
?>

<div class="card mb-4 rounded-0">
    <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
        <h6 class="m-0 text-gray-800">Hasil Preferensi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center" width="100%" cellspacing="0">
                <thead class="thead-light">
                    <tr>
                        <th class="text-nowrap">No</th>
                        <th class="text-nowrap">Nama Mahasiswa</th>
                        <th class="text-nowrap">Hasil Preferensi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;  
                    while ($res = mysqli_fetch_assoc($pref)) :
                        $no++;	
                    ?>
                    <tr>
                        <td class="text-nowrap"><?= $no; ?></td>
                        <td class="text-nowrap text-uppercase"><?= htmlspecialchars($res['Nama_Mahasiswa']); ?></td>
                        <td class="text-nowrap"><?= round($res['hasil_pref'], 3); ?></td>  
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
