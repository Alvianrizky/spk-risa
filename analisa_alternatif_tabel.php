<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['username'])) {
   header('location:index.php'); 
} else { 
   $username = $_SESSION['username']; 
   $hak_akses = $_SESSION['hak_akses']; 
}
?>

<?php

if(isset($_POST['simpan'])){
include 'koneksi.php';
    $sql="select count(id_subkriteria) as 'total_subkriteria' from subkriteria";
    $query=mysqli_query($koneksi,$sql);
    $data=mysqli_fetch_array($query);

    $periode = $_POST['periode'];
    $id_subkriteria = $_POST['id_subkriteria'];
    $id_jabatan = $_POST['id_jabatan'];
    $nilai = $_POST['NL'];
    $id_calon_karyawan = $_POST['id_calon_karyawan'];

    $id_usia = $_POST['id_usia'];
    $nil_usia = $_POST['nil_usia'];
    
    
    $id_pendidikan = $_POST['id_pendidikan'];
    $nil_pendidikan = $_POST['nil_pendidikan'];

    $id_pengalaman = $_POST['id_pengalaman'];
    $nil_pengalaman = $_POST['nil_pengalaman'];


    $id_tu = $_POST['id_tu'];
    $nil_tu = $_POST['nil_tu'];

    $id_wawancara = $_POST['id_wawancara'];
    $nil_wawancara = $_POST['nil_wawancara'];

    $id_komunikasi = $_POST['id_komunikasi'];
    $nil_komunikasi = $_POST['nil_komunikasi'];

    $id_cs = $_POST['id_cs'];
    $nil_cs = $_POST['nil_cs'];

    $id_keterampilan = $_POST['id_keterampilan'];
    $nil_keterampilan = $_POST['nil_keterampilan'];

    $jumlah_dipilih = count($id_calon_karyawan);

    for($x=0;$x<$jumlah_dipilih;$x++){
      if ($nil_usia[$x] >= 19 & $nil_usia[$x] <= 21)
      {
        $usia[$x] = 1;
      }elseif($nil_usia[$x] >= 22 & $nil_usia[$x] <= 24)
      {
        $usia[$x] = 2;
      }else
        $usia[$x] = 3;

      if ($nil_pengalaman[$x] <= 1)
      {
        $pengalaman[$x] = 1;
      }elseif($nil_pengalaman[$x] > 1 & $nil_pengalaman[$x] <=3)
      {
        $pengalaman[$x] = 2;
      }else
        $kela[$x] = 3;

      if ($nil_tu[$x] <= 60)
      {
        $tu[$x] = 1;
      }elseif($nil_tu[$x] >= 61 & $nil_tu[$x] <=70)
      {
        $tu[$x] = 2;
      }elseif($nil_tu[$x] >= 71 & $nil_tu[$x] <=80)
      {
        $tu[$x] = 3;
      }elseif($nil_tu[$x] >= 81 & $nil_tu[$x] <=90)
      {
        $tu[$x] = 4;
      }else
        $tu[$x] = 5;

      if ($nil_wawancara[$x] <= 60)
      {
        $wawancara[$x] = 1;
      }elseif($nil_wawancara[$x] >= 61 & $nil_wawancara[$x] <=70)
      {
        $wawancara[$x] = 2;
      }elseif($nil_wawancara[$x] >= 71 & $nil_wawancara[$x] <=80)
      {
        $wawancara[$x] = 3;
      }elseif($nil_wawancara[$x] >= 81 & $nil_wawancara[$x] <=90)
      {
        $wawancara[$x] = 4;
      }else
        $wawancara[$x] = 5;

      if ($nil_cs[$x] <= 60)
      {
        $cs[$x] = 1;
      }elseif($nil_cs[$x] >= 61 & $nil_cs[$x] <=70)
      {
        $cs[$x] = 2;
      }elseif($nil_cs[$x] >= 71 & $nil_cs[$x] <=80)
      {
        $cs[$x] = 3;
      }elseif($nil_cs[$x] >= 81 & $nil_cs[$x] <=90)
      {
        $cs[$x] = 4;
      }else
        $cs[$x] = 5;

      if ($nil_keterampilan[$x] <= 60)
      {
        $keterampilan[$x] = 1;
      }elseif($nil_keterampilan[$x] >= 61 & $nil_keterampilan[$x] <=70)
      {
        $keterampilan[$x] = 2;
      }elseif($nil_keterampilan[$x] >= 71 & $nil_keterampilan[$x] <=80)
      {
        $keterampilan[$x] = 3;
      }elseif($nil_keterampilan[$x] >= 81 & $nil_keterampilan[$x] <=90)
      {
        $keterampilan[$x] = 4;
      }else
        $keterampilan[$x] = 5;

       $query_multiinsert="INSERT INTO punya values ('$id_calon_karyawan[$x]','$id_usia[$x]','$usia[$x]','$periode[$x]','$id_jabatan[$x]')";
       $hasil_multiinsert = mysqli_query($koneksi, $query_multiinsert);
       
       $query_multiinsert2="INSERT INTO punya values ('$id_calon_karyawan[$x]','$id_pendidikan[$x]','$nil_pendidikan[$x]','$periode[$x]','$id_jabatan[$x]')";
       $hasil_multiinsert2 = mysqli_query($koneksi, $query_multiinsert2); 

       $query_multiinsert3="INSERT INTO punya values ('$id_calon_karyawan[$x]','$id_pengalaman[$x]','$pengalaman[$x]','$periode[$x]','$id_jabatan[$x]')";
       $hasil_multiinsert3 = mysqli_query($koneksi, $query_multiinsert3); 

       $query_multiinsert4="INSERT INTO punya values ('$id_calon_karyawan[$x]','$id_tu[$x]','$tu[$x]','$periode[$x]','$id_jabatan[$x]')";
       $hasil_multiinsert4 = mysqli_query($koneksi, $query_multiinsert4); 

       $query_multiinsert5="INSERT INTO punya values ('$id_calon_karyawan[$x]','$id_wawancara[$x]','$wawancara[$x]','$periode[$x]','$id_jabatan[$x]')";
       $hasil_multiinsert5 = mysqli_query($koneksi, $query_multiinsert5); 

       $query_multiinsert6="INSERT INTO punya values ('$id_calon_karyawan[$x]','$id_komunikasi[$x]','$nil_komunikasi[$x]','$periode[$x]','$id_jabatan[$x]')";
       $hasil_multiinsert6 = mysqli_query($koneksi, $query_multiinsert6);
       
       $query_multiinsert7="INSERT INTO punya values ('$id_calon_karyawan[$x]','$id_cs[$x]','$cs[$x]','$periode[$x]','$id_jabatan[$x]')";
       $hasil_multiinsert7 = mysqli_query($koneksi, $query_multiinsert7); 

       $query_multiinsert8="INSERT INTO punya values ('$id_calon_karyawan[$x]','$id_keterampilan[$x]','$keterampilan[$x]','$periode[$x]','$id_jabatan[$x]')";
       $hasil_multiinsert8 = mysqli_query($koneksi, $query_multiinsert8); 


       $query_multiinsert11="INSERT INTO banding values ('$id_calon_karyawan[$x]','$id_jabatan[$x]','$id_usia[$x]','','','','$periode[$x]')";
       $hasil_multiinsert11 = mysqli_query($koneksi, $query_multiinsert11);  
       
       $query_multiinsert22="INSERT INTO banding values ('$id_calon_karyawan[$x]','$id_jabatan[$x]','$id_pendidikan[$x]','','','','$periode[$x]')";
       $hasil_multiinsert22 = mysqli_query($koneksi, $query_multiinsert22);

       $query_multiinsert33="INSERT INTO banding values ('$id_calon_karyawan[$x]','$id_jabatan[$x]','$id_pengalaman[$x]','','','','$periode[$x]')";
       $hasil_multiinsert33 = mysqli_query($koneksi, $query_multiinsert33);

       $query_multiinsert44="INSERT INTO banding values ('$id_calon_karyawan[$x]','$id_jabatan[$x]','$id_tu[$x]','','','','$periode[$x]')";
       $hasil_multiinsert44 = mysqli_query($koneksi, $query_multiinsert44);

       $query_multiinsert55="INSERT INTO banding values ('$id_calon_karyawan[$x]','$id_jabatan[$x]','$id_wawancara[$x]','','','','$periode[$x]')";
       $hasil_multiinsert55 = mysqli_query($koneksi, $query_multiinsert55);

       $query_multiinsert66="INSERT INTO banding values ('$id_calon_karyawan[$x]','$id_jabatan[$x]','$id_komunikasi[$x]','','','','$periode[$x]')";
       $hasil_multiinsert66 = mysqli_query($koneksi, $query_multiinsert66);

       $query_multiinsert77="INSERT INTO banding values ('$id_calon_karyawan[$x]','$id_jabatan[$x]','$id_cs[$x]','','','','$periode[$x]')";
       $hasil_multiinsert77 = mysqli_query($koneksi, $query_multiinsert77);

       $query_multiinsert88="INSERT INTO banding values ('$id_calon_karyawan[$x]','$id_jabatan[$x]','$id_keterampilan[$x]','','','','$periode[$x]')";
       $hasil_multiinsert88 = mysqli_query($koneksi, $query_multiinsert88);
    }  
}
	

/*=====================================================================*/

?>

<!DOCTYPE html>
<html>
<head>
 
 
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SPK AHP DAN PROFILE MATCHING - PT. IONs</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SPK</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>PT.</b> IONs</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><b><?php echo $username;?></b></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo $username;?> - <?php echo $hak_akses;?>
                </p>
              </li>
              <!-- Menu Body -->
          
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $username;?></p> 
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i>
            <span>Home</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="home.php"><i class="fa fa-circle-o"></i> Dashboard</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cogs"></i>
            <span>Data Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="m_calon_karyawan.php"><i class="fa fa-circle-o"></i> Calon Karyawan</a></li>
            <li><a href="m_jabatan.php"><i class="fa fa-circle-o"></i> Jabatan</a></li>
            <li><a href="m_kriteria.php"><i class="fa fa-circle-o"></i> Kriteria</a></li>
            <li><a href="m_subkriteria.php"><i class="fa fa-circle-o"></i> Sub Kriteria</a></li>
            <li><a href="m_target.php"><i class="fa fa-circle-o"></i> Profil Jabatan</a></li>
          </ul>
        </li>
		
        <li class="treeview">
          <a href="#">
            <i class="fa fa-calculator"></i>
            <span>Perhitungan AHP</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="analisa_kriteria.php"><i class="fa fa-circle-o"></i> Analisa Kriteria</a></li>
          </ul>
        </li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-calculator"></i>
            <span>Perhitungan PM</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="analisa_data_alternatif.php"><i class="fa fa-circle-o"></i> Analisa Alternatif</a></li>
            <li><a href="cek_analisa.php"><i class="fa fa-circle-o"></i> Penjurusan</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cogs"></i>
            <span>Data Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="l_perhitungan_kriteria.php"><i class="fa fa-circle-o"></i> Perhitungan Kriteria</a></li>
			      <li><a href="l_profilejabatan.php"><i class="fa fa-circle-o"></i> Rekap Profile Jabatan</a></li>
			      <li><a href="l_rankingjabatan.php"><i class="fa fa-circle-o"></i> Ranking</a></li>
            <li><a href="l_Keputusan.php"><i class="fa fa-circle-o"></i> Rekap Rekomendasi</a></li>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Analisa
        <small>Analisa Alternatif</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Analisa</a></li>
        <li class="active">Analisa Alternatif</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

            <!-- /.box-header -->
            
              
          

        <form method="post" action="analisa_kriteria_tabel.php">
        <div class="box-body">
        <div class="row">
            <div class="col-xs-12 col-md-3">
            <div class="form-group">
              <h4><label>Perbandingan Nilai Alternatif</label></h4>
            </div>
            </div>           
        </div>
          
          
          <!-- ===============================START ================================ -->  
            
      <table width="100%" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th> </th>
                <?php
                include 'koneksi.php';
                $a="select * from subkriteria order by id_subkriteria";
                $b=mysqli_query($koneksi,$a);

                while($c=mysqli_fetch_array($b)){
                ?>
                <th><?php echo $c['nm_subkriteria'] ?></th>
                <?php
                }
                ?>
            </tr>
        </thead>

        <tbody>
        <?php
        include 'koneksi.php';
        $periode = date('Y');
        $id_jabatan = $_GET['id_jabatan'];
        $d="select a.id_calon_karyawan, a.nm_calon_karyawan from calon_karyawan a, punya b, target c 
        where a.id_calon_karyawan = b.id_calon_karyawan and b.periode = '$periode' and c.id_jabatan = '$id_jabatan '
        group by b.id_calon_karyawan
        order by b.id_calon_karyawan";
        $e=mysqli_query($koneksi,$d);
        while($f=mysqli_fetch_array($e)){
        ?>
            <tr>
                <th style="vertical-align:middle;"><?php echo $f['nm_calon_karaywan'] ?></th>
                <?php          
                include 'koneksi.php';
                $periode = date('Y');
                $id_jabatan = $_GET['id_jabatan'];
                $g="select a.id_subkriteria from punya a, target b
                where a.periode = '$periode' and b.id_jabatan = '$id_jabatan'
                group by a.id_subkriteria
                order by a.id_subkriteria";
                $h=mysqli_query($koneksi,$g);
                while($i=mysqli_fetch_array($h)){
                ?>         
        
                <td style="vertical-align:middle;">
                  <?php 
                  include 'koneksi.php';
                  $periode= date('Y');
                  if($f['id_subkriteria']==$i['id_subkriteria']){

                  echo '1.000';
                  }else{
                  $periode = date('Y');
                  $id_jabatan = $_GET['id_jabatan'];
                  $j="select nilai from punya a, banding b where a.id_subkriteria='".$i['id_subkriteria']."' 
                  and a.periode='$periode' and b.id_jabatan = '$id_jabatan' and a.id_calon_karyawan = '".$f['id_calon_karyawan']."' and a.flag='$id_jabatan'  LIMIT 0,1";
                  $k=mysqli_query($koneksi,$j);

                  while($l=mysqli_fetch_array($k)){
                  echo $l['nilai'];

                }
                  }
                
                  }
                  ?>
                </td>
                 <?php
                 }              
                 ?>
            </tr>
        </tbody>
        
      </table>
               
          </div>          
        </form>


<?php

include 'koneksi.php';
 function array_split($array, $pieces=2) 
{   
    if ($pieces < 2) 
        return array($array); 
    $newCount = ceil(count($array)/$pieces); 
    $a = array_slice($array, 0, $newCount); 
    $b = array_split(array_slice($array, $newCount), $pieces-1); 
    return array_merge(array($a),$b); 
}

function perkalian_matriks($matriks_a, $matriks_b) {
    $hasil = array();
    for ($i=0; $i<sizeof($matriks_a); $i++) {
        for ($j=0; $j<sizeof($matriks_b[0]); $j++) {
            $temp = 0;
            for ($k=0; $k<sizeof($matriks_b); $k++) {
                $temp += $matriks_a[$i][$k] * $matriks_b[$k][$j];
            }
            $hasil[$i][$j] = $temp;
        }
    }
    return $hasil;
}
 $periode=date('Y');
 $count = "select count(DISTINCT id_kriteria) as 'jumlah' from banding_kriteria where periode='$periode'";
 $count_k=mysqli_query($koneksi,$count);
 $data_k=mysqli_fetch_array($count_k);
 
 $j="select nilai_banding from banding_kriteria where periode='$periode'";
                  $k=mysqli_query($koneksi,$j);
                  $data = array(); 

                  while($row=mysqli_fetch_array($k)){
                    $data_arr = $row[nilai_banding];
                    $data[] = $data_arr;
                    }
                    $array_terpecah = array_split($data,$data_k['jumlah']);
                //print_r($array_terpecah);

?>

      <div class="box-body">
        <div class="row">
            <div class="col-xs-12 col-md-3">
            <div class="form-group">
              <h4><label>Perbandingan Nilai Target</label></h4>
            </div>
            </div>           
        </div>

        <table width="100%" class="table table-striped table-bordered">
        <thead>
            <tr>
                
                <?php
                include 'koneksi.php';
                $a="select * from subkriteria order by id_subkriteria";
                $b=mysqli_query($koneksi,$a);

                while($c=mysqli_fetch_array($b)){
                ?>
                <th><?php echo $c['nm_subkriteria'] ?></th>
                <?php
                }
                ?>
            </tr>
        </thead>

        <tbody>
            <tr>
                
                <?php          
                include 'koneksi.php';
                $periode = date('Y');
                $id_jabatan = $_GET['id_jabatan'];
                $g="select a.id_subkriteria from punya a, target b
                where a.periode = '$periode' and b.id_jabatan = '$id_jabatan'
                group by a.id_subkriteria
                order by a.id_subkriteria";
                $h=mysqli_query($koneksi,$g);
                while($i=mysqli_fetch_array($h)){
                ?>
                <td style="vertical-align:middle;">
                  <?php
                  include 'koneksi.php';
                  $periode= date('Y');
                  $id_jabatan = $_GET['id_jabatan'];
                  $j="select * from target where id_subkriteria='".$i['id_subkriteria']."' and periode='$periode' and id_jabatan = '$id_jabatan'  LIMIT 0,1";
                  $k=mysqli_query($koneksi,$j);

                  while($l=mysqli_fetch_array($k)){
                  echo $l['target'];
                }
              }
                
                  ?>
                </td>
                 
            </tr>
        </tbody>
        
      </table>

      </div>

      <div class="box-body">
        <div class="row">
            <div class="col-xs-12 col-md-3">
            <div class="form-group">
              <h4><label>Hasil Nilai GAP</label></h4>
            </div>
            </div>           
        </div>

        <table width="100%" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th> </th>
                <?php
                include 'koneksi.php';
                $a="select * from subkriteria order by id_subkriteria";
                $b=mysqli_query($koneksi,$a);

                while($c=mysqli_fetch_array($b)){
                ?>
                <th><?php echo $c['nm_subkriteria'] ?></th>
                <?php
                }
                ?>
            </tr>
        </thead>

        <tbody>
        <?php
        include 'koneksi.php';
        $periode = date('Y');
        $id_jabatan = $_GET['id_jabatan'];
        $d="select a.id_calon_karyawan, a.nm_calon_karyawan from calon_karyawan a, punya b, target c
        where a.id_calon_karyawan = b.id_calon_karyawan and b.periode = '$periode' and c.id_jabatan = '$id_jabatan'
        group by b.id_calon_karyawan
        order by b.id_calon_karyawan";
        $e=mysqli_query($koneksi,$d);
        while($f=mysqli_fetch_array($e)){
        ?>
            <tr>
                <th style="vertical-align:middle;"><?php echo $f['nm_calon_karyawan'] ?></th>
                <?php          
                include 'koneksi.php';
                $periode = date('Y');
                $id_jabatan = $_GET['id_jabatan'];
                $g="select a.id_subkriteria from punya a, target b
                where a.periode = '$periode' and b.id_jabatan = '$id_jabatan'
                group by a.id_subkriteria
                order by a.id_subkriteria";
                $h=mysqli_query($koneksi,$g);
                while($i=mysqli_fetch_array($h)){
                ?>         
        
                <td style="vertical-align:middle;">
                  <?php 
                  include 'koneksi.php';
                  $periode= date('Y');
                  if($f['id_subkriteria']==$i['id_subkriteria']){

                  echo 'aaa';
                  }else{
                  $periode = date('Y');
                  $id_jabatan = $_GET['id_jabatan'];
                  include 'koneksi.php';
                  if(isset($_POST['simpan'])){
                  $update = "update banding a, punya b, target c set a.gap= b.nilai - c.target where 
                  a.id_subkriteria = b.id_subkriteria and a.id_subkriteria = c.id_subkriteria and
                  b.id_subkriteria = c.id_subkriteria and a.id_subkriteria='".$i['id_subkriteria']."'
                  and b.periode='$periode' and a.id_jabatan = '$id_jabatan' and c.id_jabatan = '$id_jabatan' and b.flag = '$id_jabatan'
                  and b.id_calon_karyawan = '".$f['id_calon_karyawan']."'";
                  $update_gap=mysqli_query($koneksi,$update);
                }
                  $j="select * from banding where id_subkriteria='".$i['id_subkriteria']."' and periode='$periode' and id_jabatan = '$id_jabatan' and id_calon_karyawan = '".$f['id_calon_karyawan']."'  LIMIT 0,1";
                  $k=mysqli_query($koneksi,$j);

                  while($l=mysqli_fetch_array($k)){
                  // $update1 = "update banding set gap= '".$l['gap']."' where id_subkriteria='".$i['id_subkriteria']."' and periode='$periode' and id_jurusan = '$id_jurusan' and id_calon_karyawan = '".$f['id_calon_karyawan']."'";
                  // $update_gap1=mysqli_query($koneksi,$update1);
                  //echo $update1;
                  echo $l['gap'];
                }
                
              
                  }
                
                  }

                  
                  ?>
                </td>
                 <?php
                 }
                 
                 if(isset($_POST['simpan'])){
                 $dd="select a.id_calon_karyawan, a.id_subkriteria, a.id_jabatan, b.nilai - c.target as anjing from banding a, punya b, target c where 
                 a.id_calon_karyawan = b.id_calon_karyawan and a.id_subkriteria = b.id_subkriteria and b.id_subkriteria = c.id_subkriteria and
                 a.periode = '$periode' and a.id_jabatan= '$id_jabatan' and c.id_jabatan = '$id_jabatan' and b.flag = '$id_jabatan' group by a.id_calon_karyawan, a.id_subkriteria";
                  $ee=mysqli_query($koneksi,$dd);
                  //echo $dd;
                  while($ff=mysqli_fetch_array($ee)){  
                    
                    $update1 = "update banding a set a.gap= '".$ff['anjing']."' where 
                    a.id_subkriteria='".$ff['id_subkriteria']."'
                   and a.periode='$periode' and a.id_jabatan = '$id_jabatan' 
                   and a.id_calon_karyawan = '".$ff['id_calon_karyawan']."'";
                   //echo $update1;
                   $update_gap1=mysqli_query($koneksi,$update1);
                }
              }
                 ?>
            </tr>
        </tbody>
        
      </table>
      </div>

      <div class="box-body">
        <div class="row">
            <div class="col-xs-12 col-md-3">
            <div class="form-group">
              <h4><label>Konversi GAP ke Bobot</label></h4>
            </div>
            </div>           
        </div>

        <table width="100%" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th> </th>
                <?php
                include 'koneksi.php';
                $a="select * from subkriteria order by id_subkriteria";
                $b=mysqli_query($koneksi,$a);

                while($c=mysqli_fetch_array($b)){
                ?>
                <th><?php echo $c['nm_subkriteria'] ?></th>
                <?php
                }
                ?>
            </tr>
        </thead>

        <tbody>
        <?php
        include 'koneksi.php';
        $periode = date('Y');
        $id_jabatan = $_GET['id_jabatan'];
        $d="select a.id_calon_karyawan, a.nm_calon_karyawan from calon_karyawan a, punya b, target c 
        where a.id_calon_karyawan = b.id_calon_karyawan and b.periode = '$periode' and c.id_jabatan = '$id_jabatan'
        group by b.id_calon_karyawan
        order by b.id_calon_karyawan";
        $e=mysqli_query($koneksi,$d);
        while($f=mysqli_fetch_array($e)){
        ?>
            <tr>
                <th style="vertical-align:middle;"><?php echo $f['nm_calon_karyawan'] ?></th>
                <?php          
                include 'koneksi.php';
                $periode = date('Y');
                $id_jabatan = $_GET['id_jabatan'];
                $g="select a.id_subkriteria from punya a, target b
                where a.periode = '$periode' and b.id_jabatan = '$id_jabatan'
                group by a.id_subkriteria
                order by a.id_subkriteria";
                $h=mysqli_query($koneksi,$g);
                while($i=mysqli_fetch_array($h)){
                ?>         
        
                <td style="vertical-align:middle;">
                  <?php 
                  include 'koneksi.php';
                  $periode= date('Y');
                  if($f['id_subkriteria']==$i['id_subkriteria']){

                  echo '1.000';
                  }else{
                  $periode = date('Y');
                  $id_jabatan = $_GET['id_jabatan'];
                  $j="select * from banding where id_subkriteria='".$i['id_subkriteria']."' and periode='$periode' and id_jabatan = '$id_jabatan' and id_calon_karyawan = '".$f['id_calon_karyawan']."'";
                  $k=mysqli_query($koneksi,$j);

                  while($l=mysqli_fetch_array($k)){
                    if($l['gap'] == 0){
                      if(isset($_POST['simpan'])){
                        $periode= date('Y');
                        $id_jabatan = $_GET['id_jabatan'];
                        $update = "update banding set bobot_gap= 5 where 
                        id_subkriteria='".$i['id_subkriteria']."'
                        and periode='$periode' and id_jabatan = '$id_jabatan' 
                        and id_calon_karyawan = '".$f['id_calon_karyawan']."'";
                        $update_gap=mysqli_query($koneksi,$update);
                        }
                      echo 5;
                    }elseif($l['gap'] == 1){
                      if(isset($_POST['simpan'])){
                        $periode= date('Y');
                        $id_jabatan = $_GET['id_jabatan'];
                        $update = "update banding set bobot_gap= 4.5 where 
                        id_subkriteria='".$i['id_subkriteria']."'
                        and periode='$periode' and id_jabatan = '$id_jabatan' 
                        and id_calon_karyawan = '".$f['id_calon_karyawan']."'";
                        $update_gap=mysqli_query($koneksi,$update);
                        }
                      echo 4.5;
                    }elseif($l['gap'] == -1){
                      if(isset($_POST['simpan'])){
                        $periode= date('Y');
                        $id_jabatan = $_GET['id_jabatan'];
                        $update = "update banding set bobot_gap= 4 where 
                        id_subkriteria='".$i['id_subkriteria']."'
                        and periode='$periode' and id_jabatan = '$id_jabatan' 
                        and id_calon_karyawan = '".$f['id_calon_karyawan']."'";
                        $update_gap=mysqli_query($koneksi,$update);
                        }
                      echo 4;
                    }elseif($l['gap'] == 2){
                      if(isset($_POST['simpan'])){
                        $periode= date('Y');
                        $id_jabatan = $_GET['id_jabatan'];
                        $update = "update banding set bobot_gap= 3.5 where 
                        id_subkriteria='".$i['id_subkriteria']."'
                        and periode='$periode' and id_jabatan = '$id_jabatan' 
                        and id_calon_karyawan = '".$f['id_calon_karyawan']."'";
                        $update_gap=mysqli_query($koneksi,$update);
                        }
                      echo 3.5;
                    }elseif($l['gap'] == -2){
                      if(isset($_POST['simpan'])){
                        $periode= date('Y');
                        $id_jabatan = $_GET['id_jabatan'];
                        $update = "update banding set bobot_gap= 3 where 
                        id_subkriteria='".$i['id_subkriteria']."'
                        and periode='$periode' and id_jabatan = '$id_jabatan' 
                        and id_calon_karyawan = '".$f['id_calon_karyawan']."'";
                        $update_gap=mysqli_query($koneksi,$update);
                        }
                      echo 3;
                    }elseif($l['gap'] == 3){
                      if(isset($_POST['simpan'])){
                        $periode= date('Y');
                        $id_jabatan = $_GET['id_jabatan'];
                        $update = "update banding set bobot_gap= 2.5 where 
                        id_subkriteria='".$i['id_subkriteria']."'
                        and periode='$periode' and id_jabatan = '$id_jabatan' 
                        and id_calon_karyawan = '".$f['id_calon_karyawan']."'";
                        $update_gap=mysqli_query($koneksi,$update);
                        }
                      echo 2.5;
                    }elseif($l['gap'] == -3){
                      if(isset($_POST['simpan'])){
                        $periode= date('Y');
                        $id_jabatan = $_GET['id_jabatan'];
                        $update = "update banding set bobot_gap= 2 where 
                        id_subkriteria='".$i['id_subkriteria']."'
                        and periode='$periode' and id_jabatan = '$id_jabatan' 
                        and id_calon_karyawan = '".$f['id_calon_karyawan']."'";
                        $update_gap=mysqli_query($koneksi,$update);
                        }
                      echo 2;
                    }elseif($l['gap'] == 4){
                      if(isset($_POST['simpan'])){
                        $periode= date('Y');
                        $id_jabatan = $_GET['id_jabatan'];
                        $update = "update banding set bobot_gap= 1.5 where 
                        id_subkriteria='".$i['id_subkriteria']."'
                        and periode='$periode' and id_jabatan = '$id_jabatan' 
                        and id_calon_karyawan = '".$f['id_calon_karyawan']."'";
                        $update_gap=mysqli_query($koneksi,$update);
                        }
                      echo 1.5;
                    }else{
                      if(isset($_POST['simpan'])){
                        $periode= date('Y');
                        $id_jabatan = $_GET['id_jabatan'];
                        $update = "update banding set bobot_gap= 1 where 
                        id_subkriteria='".$i['id_subkriteria']."'
                        and periode='$periode' and id_jabatan = '$id_jabatan' 
                        and id_calon_karyawan = '".$f['id_calon_karyawan']."'";
                        $update_gap=mysqli_query($koneksi,$update);
                        }
                      echo 1;
                  }
                }
                }
                  }
                  ?>
                </td>
                 <?php
                 }              
                 ?>
            </tr>
        </tbody>
        
      </table>

      </div>

      <div class="box-body">
        <div class="row">
            <div class="col-xs-12 col-md-3">
            <div class="form-group">
              <h4><label>Perhitungan Core & Secondary Factor</label></h4>
            </div>
            </div>           
        </div>

        <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>id_calon_karyawan</th>
                  <th>Nama Kriteria</th>
                  <th>Nama SubKriteria</th>
                  <th>Nilai</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  include "koneksi.php";
                ?>
                <?php
                  $periode= date('Y');
                  $id_jabatan = $_GET['id_jabatan'];
                  $a1="select id_calon_karyawan from banding where periode='$periode' and id_jabatan = '$id_jabatan' group by id_calon_karyawan order by id_calon_karyawan";
                  $b1=mysqli_query($koneksi,$a1);
                  while($c1=mysqli_fetch_array($b1)){

                  $a2="select f.id_calon_karyawan, e.nm_calon_karyawan, c.id_kriteria, d.nm_kriteria, f.id_subkriteria, c.nm_subkriteria, 
                  ((sum(f.bobot_gap))/count(f.bobot_gap)) as hitung, 'Core' 
                  from target a, punya b, subkriteria c, kriteria d, calon_karyawan e, banding f where 
                  a.id_jabatan = f.id_jabatan 
                  and f.id_subkriteria = b.id_subkriteria
                  and a.id_subkriteria = c.id_subkriteria
                  and b.id_subkriteria = c.id_subkriteria
                  and c.id_kriteria = d.id_kriteria
                  and f.id_calon_karyawan = e.id_calon_karyawan
                  and a.periode = '$periode' 
                  and a.id_jabatan = '$id_jabatan'
                  and a.status = 'Core'
                  and f.id_calon_karyawan = '".$c1['id_calon_karyawan']."' 
                  group by f.id_calon_karyawan, c.id_kriteria, f.id_subkriteria
                  union all
                  select f.id_calon_karyawan, e.nm_calon_karyawan, c.id_kriteria, d.nm_kriteria, f.id_subkriteria, c.nm_subkriteria, 
                  ((sum(f.bobot_gap))/count(f.bobot_gap)) as hitung, 'Secondary' 
                  from target a, punya b, subkriteria c, kriteria d, calon_karyawan e, banding f where 
                  a.id_jabatan = f.id_jabatan 
                  and f.id_subkriteria = b.id_subkriteria
                  and a.id_subkriteria = c.id_subkriteria
                  and b.id_subkriteria = c.id_subkriteria
                  and c.id_kriteria = d.id_kriteria
                  and f.id_calon_karyawan = e.id_calon_karyawan
                  and a.periode = '$periode' 
                  and a.id_jabatan = '$id_jabatan'
                  and a.status = 'Secondary'
                  and f.id_calon_karyawan = '".$c1['id_calon_karyawan']."' 
                  group by f.id_calon_karyawan, c.id_kriteria, f.id_subkriteria";
                  $b2=mysqli_query($koneksi,$a2);

                  if(isset($_POST['simpan'])){
                  $view = "
                    select f.periode, f.id_jabatan, f.id_calon_karyawan, f.id_subkriteria, e.nm_calon_karyawan, c.id_kriteria, d.nm_kriteria, 'Core',
                    (0.6 * (sum(f.bobot_gap)/count(a.status = 'Core'))) as hitung
                    from target a, punya b, subkriteria c, kriteria d, calon_karyawan e, banding f where 
                    f.id_subkriteria = b.id_subkriteria
                    and a.id_jabatan = f.id_jabatan 
                    and a.id_subkriteria = c.id_subkriteria
                    and b.id_subkriteria = c.id_subkriteria
                    and c.id_kriteria = d.id_kriteria
                    and f.id_calon_karyawan = e.id_calon_karyawan
                    and a.periode = '$periode' 
                    and a.id_jabatan = '$id_jabatan'
                    and f.id_calon_karyawan = '".$c1['id_calon_karyawan']."' 
                    and a.status = 'Core' 
                    group by f.id_calon_karyawan, e.nm_calon_karyawan, c.id_kriteria, d.nm_kriteria, a.id_subkriteria
                    
                    union all
                    
                    select f.periode, f.id_jabatan, f.id_calon_karyawan, f.id_subkriteria, e.nm_calon_karyawan, c.id_kriteria, d.nm_kriteria, 'Secondary',
                    (0.4 * (sum(f.bobot_gap)/count(a.status = 'Secondary'))) as hitung
                    from target a, punya b, subkriteria c, kriteria d, calon_karyawan e, banding f where 
                    f.id_subkriteria = b.id_subkriteria
                    and a.id_jabatan = f.id_jabatan 
                    and a.id_subkriteria = c.id_subkriteria
                    and b.id_subkriteria = c.id_subkriteria
                    and c.id_kriteria = d.id_kriteria
                    and f.id_calon_karyawan = e.id_calon_karyawan
                    and a.periode = '$periode' 
                    and a.id_jabatan = '$id_jabatan'
                    and f.id_calon_karyawan = '".$c1['id_calon_karyawan']."' 
                    and a.status = 'Secondary' 
                    group by f.id_calon_karyawan, e.nm_calon_karyawan, c.id_kriteria, d.nm_kriteria, a.id_subkriteria";
                    $select_view=mysqli_query($koneksi,$view);
                    
                    while($c11=mysqli_fetch_array($select_view)){
                    $update_hasil = "update banding set hasil_nilai = '".$c11['hitung']."' where id_jabatan = '$id_jabatan' and periode = '$periode' and id_calon_karyawan = '".$c11['id_calon_karyawan']."' and id_subkriteria = '".$c11['id_subkriteria']."' ";
                    
                    $query_update=mysqli_query($koneksi,$update_hasil);
                    }
                }
                  while($c2=mysqli_fetch_array($b2)){
                  ?>
                    <tr>
                      <td><?php echo $c2['nm_calon_karyawan'];?></td>
                      <td><?php echo $c2['nm_kriteria'];?></td>
                      <td><?php echo $c2['nm_subkriteria'];?></td>
                      <td><?php echo $c2['hitung'];?></td>
                      <td><?php echo $c2['Core'];?></td>
                    </tr>
                    <?php } $no++; } ?>                       
                </tbody>
                <tfoot>
                
                </tfoot>
              </table>
      </div>

      <div class="box-body">
        <div class="row">
            <div class="col-xs-12 col-md-3">
            <div class="form-group">
              <h4><label>Hasil Perhitungan Rangking</label></h4>
            </div>
            </div>           
        </div>

        <table width="100%" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th> </th>
                <?php
                include 'koneksi.php';
                $a="select * from kriteria order by id_kriteria";
                $b=mysqli_query($koneksi,$a);

                while($c=mysqli_fetch_array($b)){
                ?>
                <th><?php echo $c['nm_kriteria'] ?></th>
                <?php
                }
                ?>
            </tr>
        </thead>

        <tbody>
        <?php
        include 'koneksi.php';
        $periode = date('Y');
        $id_jabatan = $_GET['id_jabatan'];
        $d="select a.id_calon_karyawan, a.nm_calon_karyawan from calon_karyawan a, banding b 
        where a.id_calon_karyawan = b.id_calon_karyawan and b.periode = '$periode' and b.id_jabatan = '$id_jabatan'
        group by b.id_calon_karyawan
        order by b.id_calon_karyawan";
        $e=mysqli_query($koneksi,$d);
        while($f=mysqli_fetch_array($e)){
        ?>
            <tr>
                <th style="vertical-align:middle;"><?php echo $f['nm_calon_karyawan'] ?></th>
                <?php          
                include 'koneksi.php';
                $periode = date('Y');
                $id_jabatan = $_GET['id_jabatan'];
                $g="select b.id_kriteria from banding a, subkriteria b, kriteria c
                where a.id_subkriteria = b.id_subkriteria and b.id_kriteria = c.id_kriteria 
                and a.periode = '$periode' and a.id_jabatan = '$id_jabatan'
                group by c.id_kriteria
                order by c.id_kriteria";
                $h=mysqli_query($koneksi,$g);
                while($i=mysqli_fetch_array($h)){
                ?>         
        
                <td style="vertical-align:middle;">
                  <?php 
                  include 'koneksi.php';
                  $periode= date('Y');
                  if($f['id_kriteria']==$i['id_kriteria']){

                  echo '1.000';
                  }else{
                  $periode = date('Y');
                  $id_jabatan = $_GET['id_jabatan'];
                  $j="select b.id_kriteria, a.periode, a.id_jabatan, a.id_calon_karyawan, sum(a.hasil_nilai * b.eigenvector_kriteria) as 
                  total from banding a, kriteria b, subkriteria c where a.id_subkriteria = c.id_subkriteria and b.id_kriteria = c.id_kriteria and 
                  c.id_kriteria='".$i['id_kriteria']."' and a.periode='$periode' and a.id_jabatan = '$id_jabatan' and a.id_calon_karyawan = '".$f['id_calon_karyawan']."'  LIMIT 0,1";

                  //select a.id_kriteria, a.periode, a.id_jurusan, a.id_calon_karyawan, sum(a.hitung * b.eigenvector_kriteria) as total from temp a, kriteria b where a.id_kriteria = b.id_kriteria and a.id_kriteria='".$i['id_kriteria']."' and a.periode='$periode' and a.id_jurusan = '$id_jurusan' and a.id_calon_karyawan = '".$f['id_calon_karyawan']."'  LIMIT 0,1";
                  $k=mysqli_query($koneksi,$j);

                  while($l=mysqli_fetch_array($k)){
                  echo $l['total'];
                }
              
                  }
                
                  }
                  ?>
                </td>
                 <?php
                 }              
                 ?>
            </tr>
        </tbody>
        
      </table>
      </div>

      <div class="box-body">
        <div class="row">
            <div class="col-xs-12 col-md-3">
            <div class="form-group">
              <h4><label>Hasil Rangking</label></h4>
            </div>
            </div>           
        </div>

        <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id Calon Karyawan</th>
                  <th>Nama Calon Karyawan</th>
                  <th>Total</th>
                  <th>Rangking</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  include "koneksi.php";
                ?>
                <?php
                  
                  $periode = date('Y');
                  $id_jabatan = $_GET['id_jabatan'];
                  $a="select a.id_calon_karyawan, d.nm_calon_karyawan, sum(a.hasil_nilai * c.eigenvector_kriteria) as total from banding a, subkriteria b, kriteria c, calon_karyawan d
                  where a.id_subkriteria = b.id_subkriteria and b.id_kriteria = c.id_kriteria and a.id_calon_karyawan = d.id_calon_karyawan and a.periode = '$periode' and a.id_jabatan = '$id_jabatan' group by a.id_calon_karyawan order by total desc";
                  $b=mysqli_query($koneksi,$a);
                  $no=1;
                  while($c=mysqli_fetch_array($b)){
                  $insert_hasil = "insert into hasil values('".$c['id_calon_karyawan']."','$id_jabatan','".$c['total']."','$periode')";
                  $exec_hasil=mysqli_query($koneksi,$insert_hasil);
                  ?>
                    <tr>
                      <td><?php echo $c['id_calon_karyawan'];?></td>
                      <td><?php echo $c['nm_calon_karyawan'];?></td>
                      <td><?php echo $c['total'];?></td>
                      <td><?php echo $no;?></td>
                    </tr>
                    <?php $no++; } ?>                       
                </tbody>
                <tfoot>
                
                </tr>
                </tfoot>
              </table>
      

      <br>
      <a class="btn btn-danger" href="javascript:if(confirm('Yakin ingin mereset data?'))
                      {document.location='d_analisa_alternatif.php?id_jabatan=<?php echo $id_jabatan; ?>';}">
                      Reset Data</a>
                      
      </div>


        
     </form>
   </div>
 </div>
</div>
</section>


            
        <!-- /.col -->
      
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2021 <a href="#">PT. IONs</a>.</strong>
  </footer>

  
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
<!--<script type="text/javascript">
if (location.href.indexOf('reload')==-1)
{
   location.href=location.href+'?reload';
}
</script>-->
</html>