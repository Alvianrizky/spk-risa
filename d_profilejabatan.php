<?php
include "koneksi.php";

if(isset($_GET['id_jabatan'])){
	$id_jabatan=$_GET['id_jabatan'];
	$sql="delete from target where id_jabatan='$id_jabatan'";
	
	$query=mysqli_query($koneksi,$sql);
	echo "<script language='javascript'>
	alert('Data Profil Jabatan berhasil direset');
	document.location='m_target.php';
	</script>";
}
?>