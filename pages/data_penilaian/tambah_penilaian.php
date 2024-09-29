<?php
    // Query to get the name of the criteria
    $namaKriteria = "SELECT Nama_Kriteria FROM data_kriteria";
    $rendKriteria = mysqli_query($koneksi_db, $namaKriteria);

    // Fetch data for the student based on the selected student ID
    $idAlt = $_GET['penilaian'];
    $namaMahasiswa = "SELECT * FROM data_alternatif WHERE ID_Alter = '$idAlt'";
    $rendMahasiswa = mysqli_query($koneksi_db, $namaMahasiswa);
    $res = mysqli_fetch_assoc($rendMahasiswa);
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-3">
    <h1 class="h3 text-gray-800">Nama Mahasiswa : <?= $res['Nama_Mahasiswa']; ?></h1>
</div>

<!-- DataTales Example -->
<div class="card mb-4 rounded-0 shadow-sm">
    <div class="card-header bg-white py-3 d-flex">
        <h6 class="m-0 text-gray-800">Tambah Penilaian</h6>
    </div>
    <div class="card-body">
        <form action="pages/data_penilaian/proses_tambah_penilaian.php?id=<?= $_GET['penilaian']; ?>" method="post">
            
            <!-- Dropdown Pekerjaan Orang Tua -->
            <div class="form-group row mb-3">
                <label for="pekerjaan" class="col-sm-3 col-form-label">Pekerjaan Orang Tua</label>
                <div class="col-sm-9">
                    <select class="form-control" name="pekerjaan" required>
                        <option value="wirausaha">Wirausaha (Skor 1)</option>
                        <option value="wiraswasta">Wiraswasta (Skor 2)</option>
                        <option value="buruh">Buruh (Skor 3)</option>
                    </select>
                </div>
            </div>

            <!-- Dropdown Penghasilan Orang Tua -->
            <div class="form-group row mb-3">
                <label for="penghasilan" class="col-sm-3 col-form-label">Penghasilan Orang Tua</label>
                <div class="col-sm-9">
                    <select class="form-control" name="penghasilan" required>
                        <option value="1">5.000.000 keatas (Skor 1)</option>
                        <option value="2">2.000.000 - 5.000.000 (Skor 2)</option>
                        <option value="3">0 - 2.000.000 (Skor 3)</option>
                    </select>
                </div>
            </div>

            <!-- Dropdown Jumlah Tanggungan Orang Tua -->
            <div class="form-group row mb-3">
                <label for="tanggungan" class="col-sm-3 col-form-label">Jumlah Tanggungan Orang Tua</label>
                <div class="col-sm-9">
                    <select class="form-control" name="tanggungan" required>
                        <option value="1">1-2 orang (Skor 1)</option>
                        <option value="2">3-4 orang (Skor 2)</option>
                        <option value="3">5 orang keatas (Skor 3)</option>
                    </select>
                </div>
            </div>

            <!-- Dropdown IPK -->
            <div class="form-group row mb-3">
                <label for="ipk" class="col-sm-3 col-form-label">IPK</label>
                <div class="col-sm-9">
                    <select class="form-control" name="ipk" required>
                        <option value="3">3.20 – 4.00 (Skor 3)</option>
                        <option value="2">2.8 – 3.20 (Skor 2)</option>
                        <option value="1">2.8 ke bawah (Skor 1)</option>
                    </select>
                </div>
            </div>

            <!-- Dropdown Bukti Keterangan Tidak Mampu -->
            <div class="form-group row mb-3">
                <label for="bukti_keterangan" class="col-sm-3 col-form-label">Bukti Keterangan Tidak Mampu</label>
                <div class="col-sm-9">
                    <select class="form-control" name="bukti_keterangan" required>
                        <option value="sktm">SKTM (Skor 3)</option>
                        <option value="kartu_phk">Kartu PHK (Skor 1)</option>
                    </select>
                </div>
            </div>

            <!-- Dropdown Mahasiswa Aktif -->
            <div class="form-group row mb-3">
                <label for="mahasiswa_aktif" class="col-sm-3 col-form-label">Mahasiswa Aktif</label>
                <div class="col-sm-9">
                    <select class="form-control" name="mahasiswa_aktif" required>
                        <option value="ktm">KTM (Skor 1)</option>
                        <option value="pddikti">Terdaftar di PDDIKTI (Skor 3)</option>
                    </select>
                </div>
            </div>

            <!-- Button Section -->
            <div class="form-group row">
                <div class="col-sm-9 offset-sm-3">
                    <a href="index.php?page=data_penilaian" class="btn btn-secondary btn-square rounded-0">
                        <i class="fas fa-chevron-left fa-sm"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-custom btn-square rounded-0">
                        <i class="fas fa-save fa-sm"></i> Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
