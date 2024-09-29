<?php
session_start();  
require '../../config/connect_db.php';

// Proses tambah penilaian
$penilaian = $_GET['id'];

// Menangkap data alternatif sesuai nama mahasiswa
$namaMahasiswa = "SELECT * FROM data_alternatif WHERE ID_Alter = '$penilaian'";
$rendMahasiswa = mysqli_query($koneksi_db, $namaMahasiswa);
$res = mysqli_fetch_assoc($rendMahasiswa);

// Hitung nilai berdasarkan input
$pekerjaan = htmlspecialchars($_POST['pekerjaan']);
$penghasilan = htmlspecialchars($_POST['penghasilan']);
$tanggungan = htmlspecialchars($_POST['tanggungan']);
$ipk = htmlspecialchars($_POST['ipk']);
$bukti_keterangan = htmlspecialchars($_POST['bukti_keterangan']);
$mahasiswa_aktif = htmlspecialchars($_POST['mahasiswa_aktif']);

// Skor untuk Pekerjaan Orang Tua
$skor_pekerjaan = ($pekerjaan == 'wirausaha') ? 1 : (($pekerjaan == 'wiraswasta') ? 2 : 3);

// Skor untuk Penghasilan Orang Tua
$skor_penghasilan = ($penghasilan == 1) ? 1 : (($penghasilan == 2) ? 2 : 3);

// Skor untuk Jumlah Tanggungan Orang Tua
$skor_tanggungan = ($tanggungan == 3) ? 3 : (($tanggungan == 2) ? 2 : 1);

// Skor untuk IPK
$skor_ipk = ($ipk >= 3) ? 3 : (($ipk >= 2) ? 2 : 1);

// Skor untuk Bukti Keterangan Tidak Mampu
$skor_bukti_keterangan = ($bukti_keterangan == 'sktm') ? 3 : 1;

// Skor untuk Mahasiswa Aktif
$skor_mahasiswa_aktif = ($mahasiswa_aktif == 'pddikti') ? 3 : 1;

// Simpan skor ke database
$sql = "INSERT INTO data_penilaian (ID_Alter, ID_Kriteria, Nilai) VALUES 
    ('$penilaian', '1', '$skor_pekerjaan'),
    ('$penilaian', '2', '$skor_penghasilan'),
    ('$penilaian', '3', '$skor_tanggungan'),
    ('$penilaian', '4', '$skor_ipk'),
    ('$penilaian', '5', '$skor_bukti_keterangan'),
    ('$penilaian', '6', '$skor_mahasiswa_aktif')";

$send = mysqli_query($koneksi_db, $sql);

if ($send) {
    $_SESSION['pesan'] = 'Penilaian berhasil ditambahkan!';
    $_SESSION['status'] = 'success';
    header('Location: ../../index.php?page=data_penilaian');
    exit;
} else {
    $_SESSION['pesan'] = 'Penilaian gagal ditambahkan!';
    $_SESSION['status'] = 'danger';
    header('Location: ../../index.php?page=data_penilaian');
    exit;
}
?>
