<?php
$idAlt = $_GET['edit'];
$datPenilai = "SELECT data_penilaian.ID_Penilaian, data_penilaian.ID_Alter, data_alternatif.Nama_Mahasiswa, 
data_penilaian.ID_Kriteria, data_kriteria.Nama_Kriteria, data_penilaian.Nilai FROM data_penilaian INNER JOIN 
data_alternatif ON data_penilaian.ID_Alter = data_alternatif.ID_Alter INNER JOIN data_kriteria ON 
data_penilaian.ID_Kriteria = data_kriteria.ID_Kriteria WHERE Nama_Mahasiswa = '$idAlt'";
$quePen = mysqli_query($koneksi_db, $datPenilai);

// menangkap data alternatif sesuai nama mahasiswa
$namaMahasiswa = "SELECT * FROM data_alternatif WHERE ID_Alter = '$_GET[id]'";
$rendMahasiswa = mysqli_query($koneksi_db, $namaMahasiswa);
$res = mysqli_fetch_assoc($rendMahasiswa);

// menangkap nama kriteria
$namaKriteria = "SELECT Nama_Kriteria FROM data_kriteria";
$rendKriteria = mysqli_query($koneksi_db, $namaKriteria);

// menangkap id kriteria
$querykrit = "SELECT ID_Kriteria FROM data_kriteria";
$hasil = mysqli_query($koneksi_db, $querykrit);

$row = [];
while ($resKrit = mysqli_fetch_assoc($hasil)) {
    $row[] = $resKrit['ID_Kriteria'];
}

// jumlah data kriteria  
$cekJuml = "SELECT COUNT(ID_Kriteria) FROM data_kriteria";
$total = mysqli_query($koneksi_db, $cekJuml);
$tes = mysqli_fetch_row($total);
$jumlah = $tes[0];

// fungsi edit penilaian
if (isset($_POST['edit'])) {
    $i = 1;
    while ($i <= $jumlah) {
        $idPenilaian = htmlspecialchars($_POST['id_penilai'][$i - 1]);
        $idalternatif = $res['ID_Alter'];
        $idkriteria = htmlspecialchars($_POST['id_kriteria'][$i - 1]);
        $nilai = htmlspecialchars($_POST['nilai'][$i - 1]);

        $sql = "UPDATE data_penilaian SET ID_Alter = '$idalternatif', ID_Kriteria = '$idkriteria', Nilai = '$nilai'
        WHERE ID_Penilaian = '$idPenilaian'";
        $send = mysqli_query($koneksi_db, $sql);

        $i++;
    }

    if ($send) {
        $_SESSION['pesan'] = 'Penilaian berhasil terubah!';
        $_SESSION['status'] = 'success';
        echo '<script>
            document.location.href = "index.php?page=data_penilaian";
        </script>';
    } else {
        $_SESSION['pesan'] = 'Penilaian gagal terubah!';
        $_SESSION['status'] = 'danger';
        echo '<script>
            document.location.href = "index.php?page=data_penilaian";
        </script>';
    }
}
?>

<!-- DataTales Example -->
<div class="card mb-4 rounded-0">
    <div class="card-header bg-white py-3 d-flex">
        <h6 class="m-0 text-gray-800">Edit Penilaian : <?= $res['Nama_Mahasiswa']; ?></h6>
    </div>
    <div class="card-body">
        <form action="" method="post">
            <?php
            $i = 1;  
            while ($i <= $jumlah) :   
                $no = 0;
                while ($krit = mysqli_fetch_assoc($quePen)) : 
                    $no++;
                    $nilaiKeterangan = '';
                    $options = '';

                    switch ($krit['ID_Kriteria']) {
                        case 1:
                            $options = [
                                '1' => 'Wirausaha (Skor 1)',
                                '2' => 'Wiraswasta (Skor 2)',
                                '3' => 'Buruh (Skor 3)',
                            ];
                            break;
                        case 2:
                            $options = [
                                '1' => '5.000.000 keatas (Skor 1)',
                                '2' => '2.000.000 - 5.000.000 (Skor 2)',
                                '3' => '0 - 2.000.000 (Skor 3)',
                            ];
                            break;
                        case 3:
                            $options = [
                                '1' => '1-2 orang (Skor 1)',
                                '2' => '3-4 orang (Skor 2)',
                                '3' => ' 5 orang keatas (Skor 3)',
                            ];
                            break;
                        case 4:
                            $options = [
                                '3' => '3.20 – 4.00 (Skor 3)',
                                '2' => '2.8 – 3.20 (Skor 2)',
                                '1' => '2.8 ke bawah (Skor 1)',
                            ];
                            break;
                        case 5:
                            $options = [
                                '3' => 'SKTM (Skor 3)',
                                '1' => 'Kartu PHK (Skor 1)',
                            ];
                            break;
                        case 6:
                            $options = [
                                '1' => 'KTM (Skor 1)',
                                '3' => 'Terdaftar di PDDIKTI (Skor 3)',
                            ];
                            break;
                    }
            ?>
                <!-- id_penilaian -->
                <input type="text" class="form-control rounded-0" id="exampleFormControlInput1" name="id_penilai[]" 
                value="<?= $krit['ID_Penilaian']; ?>" readonly="readonly" hidden="hidden">

                <!-- id_kriteria -->
                <input type="text" class="form-control rounded-0" id="exampleFormControlInput1" name="id_kriteria[]" 
                value="<?= $krit['ID_Kriteria']; ?>" readonly="readonly" hidden="hidden">

                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="form-label">
                    (<?= 'C'. $kode = str_pad($no, 2, '0', STR_PAD_LEFT); ?>) <?= $krit['Nama_Kriteria']; ?></label>
                    <select class="form-control" name="nilai[]">
                        <option value="<?= $krit['Nilai']; ?>" selected><?= $options[$krit['Nilai']]; ?></option>
                        <?php foreach ($options as $value => $label): ?>
                            <option value="<?= $value; ?>"><?= $label; ?></option>
                        <?php endforeach; ?>
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
            <button type="submit" class="btn btn-custom btn-square rounded-0" name="edit">
                <i class="fas fa-edit fa-sm"></i> Edit
            </button>
        </form>
    </div>
</div>
