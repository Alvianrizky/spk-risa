<?php
include "koneksi.php";

if(isset($_GET['id_subkriteria'])){
	$kode=$_GET['id_subkriteria'];
	$sql="delete from subkriteria where id_subkriteria='$kode'";
	$sql2="delete from subkriteria_temp where id_subkriteria='$kode'";
	
	$query2=mysqli_query($koneksi,$sql2);
	$query=mysqli_query($koneksi,$sql);
	echo "<script language='javascript'>
	alert('Data SUbKriteria berhasil dihapus');
	document.location='m_subkriteria.php';
	</script>";
	}else{
	echo "Data yang dihapus belum dipilih";
}
?>