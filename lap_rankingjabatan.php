<?php
session_start();
include 'koneksi.php';

//ProsesCetak
	
	ob_start();
	require ("html2pdf/html2pdf.class.php");
	//$now = date('Y-m-d-His');
	//$now2 = date('d-m-Y');
	$filename ="Laporan Rangking Jabatan.pdf";
	$content = ob_get_clean();
	
    //Menampilkan Data
    
  $periode = $_POST['periode'];
  $id_jabatan = $_POST['id_jabatan'];

  $query = mysqli_query($koneksi, "select a.id_calon_karyawan, b.nm_calon_karyawan, c.nm_jabatan, a.total from hasil a, calon_karyawan b, jabatan c where a.id_calon_karyawan = b.id_calon_karyawan and
  a.id_jabatan = c.id_jabatan and a.periode = '$periode' and a.id_jabatan = '$id_jabatan' order by a.total desc");
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
<tr>
</tr>
  </table>
        <h5 align='center'>LAPORAN RANGKING JABATAN <br>
        $data[nm_jabatan]
        <br>PERIODE $periode</h5>
		
		
		
	
	<table cellpadding='0' cellspacing='1' style='width: 210mm;' border=0.5 align='center'>
		<tr align='center' bgcolor='#CCCCCC'>
			<th style='width: 30px; height: 20px'>No.</th>
			<th style='width: 180px; height: 20px'>Id Calon Karyawan</th>
			<th style='width: 150px; height: 20px'>Nama Calon Karyawan</th>
			<th style='width: 150px; height: 20px'>Total</th>	
		</tr>";
		
		//Menampilkan Data
		  $periode = $_POST['periode'];
		  $id_jabatan = $_POST['id_jabatan'];
			  $query = "select a.id_calon_karyawan, b.nm_calon_karyawan, c.nm_jabatan, a.total from hasil a, calon_karyawan b, jabatan c where a.id_calon_karyawan = b.id_calon_karyawan and
              a.id_jabatan = c.id_jabatan and a.periode = '$periode' and a.id_jabatan = '$id_jabatan' order by a.total desc";

	  $sql = mysqli_query($koneksi, $query); 
      $no = 1; // nomor baris
      while ($r = mysqli_fetch_array($sql)) {
		  
      $content.="<tr bgcolor='#0000' align='center'>
        <td>$no</td>
        <td style='text-align:center'>$r[id_calon_karyawan]</td>
        <td style='text-align:center'>$r[nm_calon_karyawan]</td>
		<td style='text-align:center'>$r[total]</td>		
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

