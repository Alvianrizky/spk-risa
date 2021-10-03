<?php
include "koneksi.php";

if(isset($_GET['id_calon_karyawan'])){
	$kode=$_GET['id_calon_karyawan'];
	$sql="delete from calon_karyawan where id_calon_karyawan='$kode'";
	
	$query=mysqli_query($koneksi,$sql);
	echo "<script language='javascript'>
	alert('Data Calon Karyawan berhasil dihapus');
	document.location='m_calon_karyawan.php';
	</script>";
	}else{
	echo "Data yang dihapus belum dipilih";
}
?>