<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['username'])) {
   header('location:index.php'); 
} else { 
   $username = $_SESSION['username'];  
   $hak_akses = $_SESSION['hak_akses']; 
}
$id_kriteria = $_GET['id_kriteria'];
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
        <li class=" treeview">
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
          </ul>
        </li>
		
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-edit"></i>
            <span>Perhitungan AHP</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="analisa_kriteria.php"><i class="fa fa-circle-o"></i> Analisa Kriteria</a></li>
            <li class="active"><a href="m_analisasub.php"><i class="fa fa-circle-o"></i> Analisa Sub Kriteria</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i>
            <span>Perhitungan Profile Matching</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="analisa_jurusan.php"><i class="fa fa-circle-o"></i> Analisa Jurusan</a></li>
            <li><a href="hasil_analisa.php"><i class="fa fa-circle-o"></i> Hasil Analisa</a></li>
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
      <li><a href="l_keputusan_supplier.php"><i class="fa fa-circle-o"></i> Hasil Keputusan</a></li>
      <li><a href="l_perangkingan_supplier.php"><i class="fa fa-circle-o"></i> Perangkingan</a></li>
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
        <small><a href="analisa_subkriteria_tabel.php?id_kriteria=<?php echo $id_kriteria;?>">Analisa Sub Kriteria</small></a>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Analisa</a></li>
        <li class="active"><a href="analisa_subkriteria_tabel.php?id_kriteria=<?php echo $c['id_kriteria'];?>">Sub Kriteria</li></a>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          

          <div class="box">

            <!-- /.box-header -->
            <div class="box-body">
              
            <div class="col-xs-12 col-md-3">
            <div class="form-group">
            <h4><label>SubKriteria Pertama</label></h4>
            </div>
            </div>

            <div class="col-xs-12 col-md-3">
            <div class="form-group">
            <h4><label>Penilaian Maks</label></h4></strong>
            </div>
            </div>
			
			      <div class="col-xs-12 col-md-3">
            <div class="form-group">
            <h4><label>Penilaian</label></h4></strong>
            </div>
            </div>

            <div class="col-xs-12 col-md-3">
            <div class="form-group">
            <h4><label>SubKriteria Kedua</label></h4>
            </div>
            </div>
 

          <form role="form" method="post" action="analisa_subkriteria_tabel.php?id_kriteria=<?php echo $_GET['id_kriteria'];?>" >
          <div class="box-body">

          
          <!-- ===============================START 1================================ --> 
          <?php
          include 'koneksi.php';
          $id_kriteria = $_GET['id_kriteria'];
          $sql="select count(id_subkriteria) as 'total_subkriteria' from subkriteria where id_kriteria='$id_kriteria'";
          $query=mysqli_query($koneksi,$sql);
          $data=mysqli_fetch_array($query);

          $jumlah = $data['total_subkriteria'] * ($data['total_subkriteria'] - 1) / 2;

          for($a=1; $a<=$jumlah; $a++)
          {
          ?>
          <input type="hidden" name="periode" class="form-control" value="<?php echo date('Y'); ?>">
          <input type="hidden" name="id_kriteria" class="form-control" value="<?php echo $id_kriteria; ?>">
            <div class='col-xs-12 col-md-3'>
              <div class='form-group'>
              <select class="form-control" name="subkriteria_kiri[]">
                        <option >Pilih</option>
                          <?php
                            include "koneksi.php";
                            $id_kriteria = $_GET['id_kriteria'];
                            $query = "SELECT * FROM subkriteria where id_kriteria='$id_kriteria'";
                            $hasil = mysqli_query($koneksi,$query);
                            while ($data = mysqli_fetch_array($hasil))
                            {
                            echo "<option value='".$data['id_subkriteria']."'>".$data['nm_subkriteria']."</option>";
                            }
                          ?>
                        </select>
              </div>
            </div>

            <div class='col-xs-12 col-md-3'>
            <div class='form-group'>
              <select class="form-control" name="NL[]">
                        <option >Pilih</option>
                        <option value="1">1 - Sama Penting</option>
                        <option value="2">2 - Nilai Tengah Sedikit Lebih Penting</option>
                        <option value="3">3 - Sedikit Lebih Penting</option>
                        <option value="4">4 - Nilai Tengah Lebih Penting</option>
                        <option value="5">5 - Lebih Penting</option>
                        <option value="6">6 - Nilai Tengah Sangat Penting</option>
                        <option value="7">7 - Sangat Penting</option>
                        <option value="8">8 - Nilai Tengah Mutlak</option>
                        <option value="9">9 - Mutlak Lebih Penting</option>
              </select>
            </div>
            </div>
			
			<div class='col-xs-12 col-md-3'>
            <div class="form-group">
                    <input type="number" name="NL1[]" step="any" class="form-control">
                </div>
            </div>

            <div class='col-xs-12 col-md-3'>
              <div class='form-group'>
              <select class="form-control" name="subkriteria_kanan[]">
                        <option >Pilih</option>
                          <?php
                            include "koneksi.php";
                            $id_kriteria = $_GET['id_kriteria'];
                            $query = "SELECT * FROM subkriteria where id_kriteria='$id_kriteria'";
                            $hasil = mysqli_query($koneksi,$query);
                            while ($data = mysqli_fetch_array($hasil))
                            {
                            echo "<option value='".$data['id_subkriteria']."'>".$data['nm_subkriteria']."</option>";
                            }
                          ?>
                        </select>
              </div>
            </div>

          <?php
           }
          ?>
          
           <div class='col-xs-12 col-md-3'>
            <button type="submit" name="simpan" class="btn btn-primary" href="analisa_subkriteria_tabel.php?id_subkriteria=<?php echo $c['id_subkriteria'];?>" > Selanjutnya <span class="fa fa-arrow-right"></span></button>
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