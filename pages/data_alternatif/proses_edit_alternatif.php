<?php
  session_start();
	require '../../config/connect_db.php';

	// proses edit
	$id = $_GET['id'];  
	$mahasiswa = htmlspecialchars($_POST['nama_mahasiswa']);
  $jk = htmlspecialchars($_POST['jenis_kelamin']);
  $semester = htmlspecialchars($_POST['semester']);
  $alamat = htmlspecialchars($_POST['alamat']);

  $sql = "UPDATE data_alternatif SET Nama_Mahasiswa = '$mahasiswa', Jenis_Kelamin = '$jk', semester = '$semester', Alamat = '$alamat' 
  WHERE ID_Alter = '$id'";
  $send = mysqli_query($koneksi_db, $sql);

  if ($send) {
    $_SESSION['pesan'] = 'Data mahasiswa berhasil terubah!';
    $_SESSION['status'] = 'success';
    header('Location: ../../index.php?page=data_mahasiswa');
    exit;
  } 
  else {
    $_SESSION['pesan'] = 'Data mahasiswa gagal terubah!';
    $_SESSION['status'] = 'danger';
    header('Location: ../../index.php?page=data_mahasiswa');
    exit;
  }
  
?>