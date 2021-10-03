<?php
include "koneksi.php";
	
	$periode= date('Y');


	$j="select a.id_subkriteria_1, b.nm_subkriteria from banding_sub a, subkriteria b where a.id_subkriteria_1 = b.id_subkriteria and a.periode='$periode' group by a.id_subkriteria_1";
            $k=mysqli_query($koneksi,$j);

            while($l=mysqli_fetch_array($k)){

              $update = "update subkriteria set eigenvector_sub = 0 where id_subkriteria =  '".$l['id_subkriteria_1']."' ";
              $hasil_update = mysqli_query($koneksi, $update);
                
              }

	$sql="delete from analisa_subkriteria where periode='$periode'";
	


	
	$query=mysqli_query($koneksi,$sql);
	echo "<script language='javascript'>
	alert('Data Analisa Kriteria berhasil direset');
	document.location='home.php';
	</script>";
?>