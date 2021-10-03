<?php
include "koneksi.php";
	
$periode= date('Y');
$id_jabatan = $_GET['id_jabatan'];;

	$j="delete from banding where id_jabatan='$id_jabatan' and periode='$periode'";
	$k=mysqli_query($koneksi,$j);
	
	$l="delete from punya where flag='$id_jabatan' and periode='$periode'";
	$m=mysqli_query($koneksi,$l);
	
	$n="delete from hasil where id_jurusan='$id_jabatan' and periode='$periode'";
    $o=mysqli_query($koneksi,$n);

	echo "<script language='javascript'>
	alert('Data Analisa Alternatif berhasil direset');
	document.location='home.php';
	</script>";
?>