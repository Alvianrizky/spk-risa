<?php
include "koneksi.php";
	
	$periode= date('Y');


	$j="select a.id_kriteria_1, b.nm_kriteria from banding_kriteria a, kriteria b where a.id_kriteria_1 = b.id_kriteria and a.periode='$periode' group by a.id_kriteria_1";
            $k=mysqli_query($koneksi,$j);

            while($l=mysqli_fetch_array($k)){

              $update = "update kriteria set eigenvector_kriteria = 0 where id_kriteria =  '".$l['id_kriteria_1']."' ";
              $hasil_update = mysqli_query($koneksi, $update);
                
              }

	$sql="delete from analisa_kriteria where periode='$periode'";
	


	
	$query=mysqli_query($koneksi,$sql);
	echo "<script language='javascript'>
	alert('Data Analisa Kriteria berhasil direset');
	document.location='home.php';
	</script>";
?>