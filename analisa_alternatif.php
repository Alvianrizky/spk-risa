<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['username'])) {
   header('location:index.php'); 
} else { 
   $username = $_SESSION['username'];  
   $hak_akses = $_SESSION['hak_akses']; 
}
include "koneksi.php";
$id_jabatan = $_GET['id_jabatan'];
$query = "select * from jabatan where id_jabatan = '$id_jabatan'";
$exec =mysqli_query($koneksi,$query);
$data=mysqli_fetch_array($exec);
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
        <small><a href="analisa_alternatif_tabel.php?id_jabatan=<?php echo $id_jabatan;?>">Analisa Alternatif</small></a>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Analisa </a></li>
        <li class="active"><a href="analisa_kriteria_tabel.php">Analisa Alternatif</li></a>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
      
        <div class="col-xs-12">
        

          <div class="box">
         
          
            <!-- /.box-header -->
            <h4>&nbsp;&nbsp;&nbsp;&nbsp;<label>Jabatan <?php echo $data['nm_jabatan'];?></label></h4>
            <div class="col-xs-14 col-md-2">
            <div class="form-group">
            <h6><label>Nama Alternatif</label></h6>
            </div>
            </div>

            <div class="col-xs-14 col-md-1">
            <div class="form-group">
            <h6><label>Usia</label></h6>
            </div>
            </div>

            <div class="col-xs-14 col-md-2">
            <div class="form-group">
            <h6><label>Pendidikan</label></h6>
            </div>
            </div>

            <div class="col-xs-14 col-md-1">
            <div class="form-group">
            <h6><label>Pengalaman</label></h6>
            </div>
            </div>

            <div class="col-xs-14 col-md-1">
            <div class="form-group">
            <h6><label>Interview User</label></h6>
            </div>
            </div>

            <div class="col-xs-14 col-md-1">
            <div class="form-group">
            <h6><label>Skill Test</label></h6>
            </div>
            </div>
            
            <div class="col-xs-14 col-md-2">
            <div class="form-group">
            <h6><label>Tes Koran</label></h6>
            </div>
            </div>

            <div class="col-xs-14 col-md-1">
            <div class="form-group">
            <h6><label>Tes Warteg</label></h6>
            </div>
            </div>

            <div class="col-xs-14 col-md-1">
            <div class="form-group">
            <h6><label>Tes Aritmatika</label></h6>
            </div>
            </div>

            </div>
			
			      
 

          <form role="form" method="post" action="analisa_alternatif_tabel.php?id_jabatan=<?php echo $id_jabatan;?>">
          <div class="box-body">

          
          <!-- ===============================START 1================================ --> 
          <?php
          include 'koneksi.php';
          $periode=date('Y');
          $sql="select count(id_subkriteria) as 'total_subkriteria' from subkriteria";
          $query=mysqli_query($koneksi,$sql);
          $data=mysqli_fetch_array($query);

          $sql2="select count(id_calon_karyawan) as 'total_calon_karyawan' from calon_karyawan";
          $query2=mysqli_query($koneksi,$sql2);
          $data2=mysqli_fetch_array($query2);

          $jumlah = $data2['total_calon_karyawan'];
          $sql8="select * from calon_karyawan";
          $query8=mysqli_query($koneksi,$sql8);
          // $data8=mysqli_fetch_array($query8);
          while($data8=mysqli_fetch_array($query8)){

          for($a=1; $a<=$jumlah; $a++)
          {
          ?>
          <input type="hidden" name="periode[]" class="form-control" value="<?php echo date('Y'); ?>">
          <input type="hidden" name="id_jabatan[]" class="form-control" value="<?php echo $id_jabatan; ?>">
          <?php
              include "koneksi.php";
              $periode=date('Y');
              
              
            ?>
            <div class='col-xs-12 col-md-2'>
              <div class='form-group'>
              <input type="hidden" name="id_calon_karyawan[]" class="form-control" value="<?php echo $data8['id_calon_karyawan'];?>" >
              <input type="text" class="form-control" placeholder="Nama Calon Karyawan" value="<?php echo $data8['nm_calon_karyawan'];?>" readonly>
              </div>
            </div>
            <?php
             
            ?>

            <!-- ===============================Usia================================ --> 
            <?php
              include "koneksi.php";
              $sql="select * from subkriteria where id_subkriteria='SKRT01'";
              $query=mysqli_query($koneksi,$sql);
              $data=mysqli_fetch_array($query);
            ?>
            <div class='col-xs-12 col-md-1'>
              <div class='form-group'>
                <input type="hidden" name="id_usia[]" class="form-control" value="<?php echo $data['id_subkriteria'];?>" >
                <input type="text" name="nil_usia[]" class="form-control" placeholder="Nilai" value="" >
              </div>
            </div>

            <!-- ===============================Pendidikan================================ --> 
            <?php
              include "koneksi.php";
              $sql2="select * from subkriteria where id_subkriteria='SKRT02'";
              $query2=mysqli_query($koneksi,$sql2);
              $data2=mysqli_fetch_array($query2);
            ?>
            <div class='col-xs-12 col-md-2'>
            <div class='form-group'>
              <input type="hidden" name="id_pendidikan[]" class="form-control" value="<?php echo $data2['id_subkriteria'];?>" >
              <select class="form-control" name="nil_pendidikan[]">
                        <option value="1">SMK / SMA</option>";
                        <option value="2">D3</option>";
                        <option value="3">S1</option>";
              </select>
            </div>
            </div>

            <!-- ===============================Pengalaman================================ --> 
            <?php
              include "koneksi.php";
              $sql3="select * from subkriteria where id_subkriteria='SKRT03'";
              $query3=mysqli_query($koneksi,$sql3);
              $data3=mysqli_fetch_array($query3);
            ?>
            <div class='col-xs-12 col-md-1'>
            <div class='form-group'>
              <input type="hidden" name="id_pengalaman[]" class="form-control" value="<?php echo $data3['id_subkriteria'];?>" >
              <input type="text" name="nil_pengalaman[]" class="form-control" placeholder="Nilai" value="" >
            </div>
            </div>

            <!-- ===============================Test Umum================================ --> 
            <?php
              include "koneksi.php";
              $sql4="select * from subkriteria where id_subkriteria='SKRT04'";
              $query4=mysqli_query($koneksi,$sql4);
              $data4=mysqli_fetch_array($query4);
            ?>
            <div class='col-xs-12 col-md-1'>
              <div class='form-group'>
              <input type="hidden" name="id_tu[]" class="form-control" value="<?php echo $data4['id_subkriteria'];?>" >
              <input type="text" name="nil_tu[]" class="form-control" placeholder="Nilai" value="" >
              </div>
            </div>

            <!-- ===============================Wawancara================================ --> 
            <?php
              include "koneksi.php";
              $sql5="select * from subkriteria where id_subkriteria='SKRT05'";
              $query5=mysqli_query($koneksi,$sql5);
              $data5=mysqli_fetch_array($query5);
            ?>
            <div class='col-xs-12 col-md-1'>
              <div class='form-group'>
              <input type="hidden" name="id_wawancara[]" class="form-control" value="<?php echo $data5['id_subkriteria'];?>" >
              <input type="text" name="nil_wawancara[]" class="form-control" placeholder="Nilai" value="" >
              </div>
            </div>

            <!-- ===============================Komunikasi================================ --> 
            <?php
              include "koneksi.php";
              $sql6="select * from subkriteria where id_subkriteria='SKRT06'";
              $query6=mysqli_query($koneksi,$sql6);
              $data6=mysqli_fetch_array($query6);
            ?>
            <div class='col-xs-12 col-md-2'>
              <div class='form-group'>
              <input type="hidden" name="id_komunikasi[]" class="form-control" value="<?php echo $data6['id_subkriteria'];?>" >
              <select class="form-control" name="nil_komunikasi[]">
                        <option value="1">Kurang Sekali</option>";
                        <option value="2">Kurang</option>";
                        <option value="3">Cukup</option>";
                        <option value="4">Baik</option>";
                        <option value="5">Baik Sekali</option>";
              </select>
              </div>
            </div>

            <!-- ===============================Computer Skill================================ --> 
            <?php
              include "koneksi.php";
              $sql7="select * from subkriteria where id_subkriteria='SKRT07'";
              $query7=mysqli_query($koneksi,$sql7);
              $data7=mysqli_fetch_array($query7);
            ?>
            <div class='col-xs-12 col-md-1'>
              <div class='form-group'>
              <input type="hidden" name="id_cs[]" class="form-control" value="<?php echo $data7['id_subkriteria'];?>" >
              <input type="text" name="nil_cs[]" class="form-control" placeholder="Nilai" value="" >
              </div>
            </div>

            <!-- ===============================Keterampilan================================ --> 
            <?php
              include "koneksi.php";
              $sql9="select * from subkriteria where id_subkriteria='SKRT08'";
              $query9=mysqli_query($koneksi,$sql9);
              $data9=mysqli_fetch_array($query9);
            ?>
            <div class='col-xs-12 col-md-1'>
              <div class='form-group'>
              <input type="hidden" name="id_keterampilan[]" class="form-control" value="<?php echo $data9['id_subkriteria'];?>" >
              <input type="text" name="nil_keterampilan[]" class="form-control" placeholder="Nilai" value="" >
              </div>
            </div>

          <?php
          break;
          }
       
           }
          
          ?>
          
           <div class='col-xs-12 col-md-3'>
            <button type="submit" name="simpan" class="btn btn-primary"> Selanjutnya <span class="fa fa-arrow-right"></span></button>
           </div>   
          </div>    
           
      </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
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
</html>