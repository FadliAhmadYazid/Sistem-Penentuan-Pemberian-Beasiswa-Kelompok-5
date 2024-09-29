<?php
$pref = mysqli_query($koneksi_db, "SELECT hasil_preferensi.ID_Pref, hasil_preferensi.ID_Alter, data_alternatif.Nama_Mahasiswa, 
hasil_preferensi.hasil_pref FROM hasil_preferensi INNER JOIN data_alternatif ON 
hasil_preferensi.ID_Alter = data_alternatif.ID_Alter ORDER BY hasil_pref DESC");
?>

<div class="card mb-4 rounded-0">
    <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
        <h6 class="m-0 text-gray-800">Hasil Akhir (Perankingan)</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center" width="100%" cellspacing="0">
                <thead class="thead-light">
                    <tr>
                        <th class="text-nowrap">Nama Mahasiswa</th>
                        <th class="text-nowrap">Nilai Akhir (Preferensi)</th>
                        <th class="text-nowrap">Peringkat</th>
                        <th class="text-nowrap">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    while ($res = mysqli_fetch_assoc($pref)) :
                        $no++;
                        $hasil_pref = $res['hasil_pref'];

                        // Tentukan keterangan dan warna berdasarkan hasil preferensi
                        if ($hasil_pref <= 70) {
                            $status = "Tidak Layak Diterima";
                            $row_class = "table-danger";
                        } elseif ($hasil_pref > 70 && $hasil_pref <= 90) {
                            $status = "Cukup Layak";
                            $row_class = "table-warning";
                        } else {
                            $status = "Layak";
                            $row_class = "table-success";
                        }
                    ?>
                        <tr class="<?= $row_class ?>">
                            <td class="text-nowrap text-uppercase"><?= htmlspecialchars($res['Nama_Mahasiswa']); ?></td>
                            <td class="text-nowrap"><?= round($hasil_pref, 3); ?></td>
                            <td class="text-nowrap"><?= $no; ?></td>
                            <td class="text-nowrap"><?= $status; ?></td>
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
