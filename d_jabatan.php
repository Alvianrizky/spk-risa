<?php
include "koneksi.php";

if(isset($_GET['id_jabatan'])){
	$kode=$_GET['id_jabatan'];
	$sql="delete from jabatan where id_jabatan='$kode'";
	
	$query=mysqli_query($koneksi,$sql);
	echo "<script language='javascript'>
	alert('Data Jabatan berhasil dihapus');
	document.location='m_jabatan.php';
	</script>";
	}else{
	echo "Data yang dihapus belum dipilih";
}
?>