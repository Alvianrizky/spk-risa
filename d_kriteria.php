<?php
include "koneksi.php";

if(isset($_GET['id_kriteria'])){
	$kode=$_GET['id_kriteria'];
	$sql="delete from kriteria where id_kriteria='$kode'";
	$sql2="delete from kriteria_temp where id_kriteria='$kode'";
	
	$query2=mysqli_query($koneksi,$sql2);
	$query=mysqli_query($koneksi,$sql);
	echo "<script language='javascript'>
	alert('Data Kriteria berhasil dihapus');
	document.location='m_kriteria.php';
	</script>";
	}else{
	echo "Data yang dihapus belum dipilih";
}
?>