<?php  
$sql = "SELECT * FROM data_alternatif";
$mahasiswa = mysqli_query($koneksi_db, $sql);
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 text-gray-800">Data Nilai Mahasiswa</h1>
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
    <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
        <h6 class="m-0 text-gray-800">Tabel Data Mahasiswa</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-light">
                    <tr>
                        <th class="text-nowrap">Kode</th>
                        <th class="text-nowrap">Nama Mahasiswa</th>
                        <th class="text-nowrap">Penilaian</th>
                        <th class="text-nowrap">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 0;
                    while ($alter = mysqli_fetch_assoc($mahasiswa)) :
                    $no++;  
                    ?>
                        <tr>
                            <td class="text-nowrap"><?= 'D' . str_pad($no, 2, '0', STR_PAD_LEFT); ?></td>
                            <td class="text-nowrap text-uppercase"><?= htmlspecialchars($alter['Nama_Mahasiswa']); ?></td>
                            <td class="text-center text-nowrap">
                                <?php  
                                $jmlData = mysqli_query($koneksi_db, "SELECT * FROM data_penilaian WHERE ID_Alter = '$alter[ID_Alter]'");
                                $jml = mysqli_num_rows($jmlData);

                                if ($jml == 0) {
                                ?>
                                    <a href="index.php?page=tambah_penilaian&penilaian=<?= $alter['ID_Alter']; ?>" class="btn btn-secondary btn-square rounded-0" title="Tambah Penilaian">
                                        <i class="fas fa-plus fa-sm"></i> Masukkan Penilaian
                                    </a>
                                <?php } else if ($jml > 0) { ?>
                                    <button class="btn btn-success btn-square rounded-0" title="Penilaian Telah Diinput" readonly="readonly">
                                        <i class="fas fa-check fa-sm"></i> Penilaian Terinput
                                    </button>
                                <?php } ?>  
                            </td>
                            <td class="text-center text-nowrap">
                                <button type="button" data-mahasiswa="<?= $alter['Nama_Mahasiswa']; ?>" class="cek btn btn-info btn-square rounded-0" title="Lihat Penilaian">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <a href="index.php?page=edit_penilaian&edit=<?= $alter['Nama_Mahasiswa']; ?>&id=<?= $alter['ID_Alter']; ?>" class="btn btn-warning btn-square rounded-0" title="Edit Penilaian">
                                    <i class="fas fa-edit"></i>
                                </a>
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

<!-- Modal Lihat Penilaian -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h6 class="modal-title text-gray-800" id="exampleModalLabel">Lihat Penilaian</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="cek_penilaian"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm rounded-0" data-dismiss="modal"><i class="fas fa-chevron-left fa-sm"></i> Kembali</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<!-- Fungsi untuk melihat penilaian -->
<script type="text/javascript">
$(document).ready(function() {
    $('.cek').click(function() {
        let nama_mahasiswa = $(this).data('mahasiswa');
        $.ajax({
            url: 'pages/data_penilaian/lihat_penilaian.php',
            method: 'POST',
            data: {nama_mahasiswa: nama_mahasiswa},
            success: function (data) {
                $('#cek_penilaian').html(data);
                $('#exampleModal').modal('show');
            }
        });
    });
});
</script>

<style>
    /* Custom styles for tables */
    .table th, .table td {
        vertical-align: middle;
    }
    .table-hover tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.075);
    }
    .modal-header {
        border-bottom: 1px solid #dee2e6;
    }
</style>
