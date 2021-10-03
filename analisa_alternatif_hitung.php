<?php
include "../../../koneksi.php";

if(isset($_POST['tambah'])){ // Proses Insert Tabel temp_profass
  $nisn             = $_POST['nisn[]'];
  $id_subkriteria   = $_POST['id_subkriteria[]'];
  $nilai            = $_POST['NL[]'];
  $periode          =


  $cekid = mysqli_query($connect, "SELECT * FROM temp_profass WHERE nisn[] = '$nisn' AND id_subkriteria[] = '$id_subkriteria'");

  //cek POSISI-KRITERIA di temp_profpo

  if (mysqli_num_rows($cekid) <> 0){
    echo "<script>alert('Profil Asisten Sudah Ditambahkan!');window.location='abalisa_alternatif1.php';</script>";
  } else {
  $tambah = mysqli_query($connect,"INSERT INTO temp_profass VALUES('$nisn', '$id_subkriteria', '$nilai', '$ta')");
    if($tambah){
      header("Location: analisa_alternatif1.php");
    }
  }
}else{
  $nisn         = $_GET['nisn[]'];
  $id_subkriteria = $_GET['id_subkriteria'];

  $hapus = mysqli_query($connect, "DELETE FROM temp_profass WHERE nisn[]='$nisn' AND id_subkriteria[]='$id_subkriteria' ");

  if($hapus){
    header("Location: analisa_alternatif1.php");
  }
}
?>