<?php
session_start();
include 'koneksi.php';

//ProsesCetak
	
	ob_start();
	require ("html2pdf/html2pdf.class.php");
	//$now = date('Y-m-d-His');
	//$now2 = date('d-m-Y');
	$filename ="Laporan Perhitungan Kriteria.pdf";
	$content = ob_get_clean();
	
	//Menampilkan Data
  $periode = $_POST['periode'];
  //$id_hasil=$_GET['id_hasil'];
  
  $query = mysqli_query($koneksi, "SELECT * from kriteria, banding_kriteria
		    WHERE kriteria.id_kriteria = banding_kriteria.id_kriteria and banding_kriteria.periode='$periode' 
               group by banding_kriteria.id_kriteria");
  $data = mysqli_fetch_array($query);
  
	$content = "<style>
  p.kop{
    margin-left:45px;
  }
    p.kop1{
    margin-left:50px;
  }
  
  </style>
  <br><br><br>
  <table class='kop' border='0' align='center'>

 <tr>
 <td><img src='kopions.png' align='left'></td>

</tr>
  </table>
		<h5 align='center'>LAPORAN PERHITUNGAN KRITERIA PERIODE $periode</h5>
		
		
		
	
	<table cellpadding='0' cellspacing='1' style='width: 210mm;' border=0.5 align='center'>
		<tr align='center' bgcolor='#CCCCCC'>
			<th style='width: 100px; height: 20px'>Id kriteria</th>
			<th style='width: 150px; height: 20px'>Nama Kriteria</th>
			<th style='width: 100px; height: 20px'>Eigenvector</th>

			
		
		</tr>";
		
		//Menampilkan Data
		  $periode = $_POST['periode'];
		  
			  $query = "SELECT * from kriteria, banding_kriteria
		    WHERE kriteria.id_kriteria = banding_kriteria.id_kriteria and banding_kriteria.periode='$periode' 
               group by banding_kriteria.id_kriteria";

	  $sql = mysqli_query($koneksi, $query); 
      $no = 1; // nomor baris
      while ($r = mysqli_fetch_array($sql)) {
		  
      $content.="<tr bgcolor='#0000' align='center'>
        
        <td style='text-transform:capitalize'>$r[id_kriteria]</td>
        <td style='text-align:center'>$r[nm_kriteria]</td>
		<td style='text-align:center'>$r[eigenvector_kriteria]</td>
		
		
		
		
      </tr>";
	  
      $no++;
      }
		
		
    
		
		$content.="
	</table>
	<br>
	<br>
	<br><br>
	<table cellpadding='0' style='width: 210mm;'  align='left'>
		<tr align='center'>
		<th style='width: 50px; height: 20px'></th>
			<th style='width: 160px; height: 20px'></th>
			<th style='width: 150px; height: 20px'></th>
			<th style='width: 110px; height: 20px'></th>
			<th style='width: 250px; height: 20px'>Direktur</th>
		
			
		
		</tr>
		<th style='width: 50px; height: 20px'></th>
			<th style='width: 155px; height: 20px'></th>
			<th style='width: 150px; height: 20px'></th>
			<th style='width: 110px; height: 20px'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
			<th style='width: 250px; height: 20px'></th>

		</table>
		<br><br><br><br>
		
	<table cellpadding='0' style='width: 210mm;'  align='left'>
		<tr align='center'>
		<th style='width: 50px; height: 20px'></th>
			<th style='width: 155px; height: 20px'></th>
			<th style='width: 150px; height: 20px'></th>
			<th style='width: 110px; height: 20px'></th>
			<th style='width: 250px; height: 20px'></th>
		
			
		
		</tr>
		<th style='width: 50px; height: 20px'></th>
			<th style='width: 155px; height: 20px'></th>
			<th style='width: 150px; height: 20px'></th>
			<th style='width: 110px; height: 20px'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
			<th style='width: 250px; height: 20px'></th>

		</table>
		<br><br>

	<table cellpadding='0' style='width: 210mm;'  align='left'>
		<tr align='center'>
		<th style='width: 50px; height: 20px'></th>
			<th style='width: 160px; height: 20px'></th>
			<th style='width: 150px; height: 20px'></th>
			<th style='width: 110px; height: 20px'></th>
			<th style='width: 250px; height: 20px'>Drs H Purwono</th>
		
			
		
		</tr>
		<th style='width: 50px; height: 20px'></th>
			<th style='width: 155px; height: 20px'></th>
			<th style='width: 150px; height: 20px'></th>
			<th style='width: 110px; height: 20px'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
			<th style='width: 250px; height: 20px'></th>

		</table>
	
  ";
  
  
	ob_end_clean();
	// conversion HTML => PDF
	try
	{
		$html2pdf = new HTML2PDF('P', 'A4','fr', false, 'ISO-8859-15',array(2, 2, 2, 2)); 
		$html2pdf->setDefaultFont('Arial');
		$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
		$html2pdf->Output($filename);
	}
	catch(HTML2PDF_exception $e) { echo $e; }
?>

