<?php
  session_start();
	require '../../config/connect_db.php';

	// proses tambah
  $mahasiswa = htmlspecialchars($_POST['nama_mahasiswa']);
  $jk = htmlspecialchars($_POST['jenis_kelamin']);
  $semester = htmlspecialchars($_POST['semester']);
  $alamat = htmlspecialchars($_POST['alamat']);

  $sql = "INSERT INTO data_alternatif VALUES ('', '$mahasiswa', '$jk', '$semester', '$alamat')";
  $send = mysqli_query($koneksi_db, $sql);

  if ($send) {
    $_SESSION['pesan'] = 'Data mahasiswa berhasil tersimpan!';
    $_SESSION['status'] = 'success';
    header('Location: ../../index.php?page=data_mahasiswa');
    exit;
  } else {
    $_SESSION['pesan'] = 'Data mahasiswa gagal tersimpan!';
    $_SESSION['status'] = 'danger';
    header('Location: ../../index.php?page=data_mahasiswa');
  }
?>