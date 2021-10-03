<?php
session_start();
include 'koneksi.php';

//ProsesCetak
	
	ob_start();
	require ("html2pdf/html2pdf.class.php");
	//$now = date('Y-m-d-His');
	//$now2 = date('d-m-Y');
	$filename ="Cetak Hasil Keputusan.pdf";
	$content = ob_get_clean();
	
	//Menampilkan Data
  $periode = $_GET['periode'];
  $id_hasil=$_GET['id_hasil'];
  
  $query = mysqli_query($koneksi, "SELECT a.keputusan, b.nm_supplier, a.nil_akhir FROM hasil a, supplier b
		    WHERE a.id_hasil='$id_hasil' and periode='$periode' and a.keputusan = b.id_supplier");
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
		<td><img src='amc.png' align='left'></td>
		

	</tr>
  </table>
  
 
 
		<p align='center'></p>
		<h5 align='center'>DATA HASIL KEPUTUSAN SUPPLIER TERBAIK PERIODE $periode</h5>
		
		
		
	
	<table cellpadding='0' cellspacing='1' style='width: 210mm;' border=0.5 align='center'>
		<tr align='center' bgcolor='#CCCCCC'>
			<th style='width: 30px; height: 20px'>No.</th>
			<th style='width: 100px; height: 20px'>Id Supplier</th>
			<th style='width: 150px; height: 20px'>Nama Supplier</th>
			<th style='width: 150px; height: 20px'>Nilai Akhir</th>
		
			
		
		</tr>";
		
		//Menampilkan Data
		  $periode = $_GET['periode'];
		  $id_hasil=$_GET['id_hasil'];
		  
			  $query = "SELECT a.keputusan, b.nm_supplier, a.nil_akhir, b.eigenvector FROM hasil a, supplier b
		    WHERE a.id_hasil='$id_hasil' and periode='$periode' and a.keputusan = b.id_supplier order by b.eigenvector desc";

	  $sql = mysqli_query($koneksi, $query); 
      $no = 1; // nomor baris
      while ($r = mysqli_fetch_array($sql)) {
		  
      $content.="<tr bgcolor='#0000' align='center'>
        <td>$no</td>
        <td style='text-transform:capitalize'>$r[keputusan]</td>
        <td style='text-align:center'>$r[nm_supplier]</td>
		<td style='text-align:center'>$r[eigenvector]</td>
		
		
		
      </tr>";
	  
      $no++;
      }
		
		
    
		
		$content.="
	</table>
	<br>
	<br>
	<br>
	<br><br>
	<table cellpadding='0' style='width: 210mm;'  align='left'>
		<tr align='center'>
		<th style='width: 50px; height: 20px'></th>
			<th style='width: 160px; height: 20px'></th>
			<th style='width: 150px; height: 20px'></th>
			<th style='width: 110px; height: 20px'></th>
			<th style='width: 250px; height: 20px'>Dr. Djunaedy R. Saragih</th>
		
			
		
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

