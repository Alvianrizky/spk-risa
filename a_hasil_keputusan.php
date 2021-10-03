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
include "koneksi.php";
?>
<?php
if(isset($_POST['simpan'])){
$periode=$_POST['periode'];
$id_hasil=$_POST['id_hasil'];
$keputusan=$_POST['keputusan'];
$nilakhir=$_POST['aneh'];
$keputusan_dipilih=count($keputusan);

    if (empty($periode) or empty($keputusan)){
      echo "<script language='javascript'>
alert('Data belum lengkap !');
</script>";
    }else{
		for($x=0;$x<$keputusan_dipilih;$x++){
			
    $a="insert into hasil values('$id_hasil','$periode','$nilakhir[$x]','$keputusan[$x]')";
    $b=mysqli_query($koneksi,$a);
		}
      if ($b) {
        echo "<script language='javascript'>
        alert('Data Hasil Keputusan berhasil disimpan dan dicetak');
		{document.location='c_hasil_keputusan.php?id_hasil=$id_hasil&periode=$periode';}
        </script>";
      }
    }
  }

function autonumber($tabel, $kolom, $lebar=0, $awalan='')
{
  include "koneksi.php";

  $query="select $kolom from $tabel order by $kolom desc limit 1";
  $hasil=mysqli_query($koneksi,$query);
  $jumlahrecord = mysqli_num_rows($hasil);
  if($jumlahrecord == 0)
    $nomor=1;
  else
  {
    $row=mysqli_fetch_array($hasil);
    $nomor=intval(substr($row[0],strlen($awalan)))+1;
  }
  if($lebar>0)
    $angka = $awalan.str_pad($nomor,$lebar,"0",STR_PAD_LEFT);
  else
    $angka = $awalan.$nomor;
  return $angka;
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SPK AHP - Audy</title>
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
      <span class="logo-lg"><b>AMC</b> KLINIK AMC</span>
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
            <li><a href="m_supplier.php"><i class="fa fa-circle-o"></i> Supplier</a></li>
            <li><a href="m_kriteria.php"><i class="fa fa-circle-o"></i> Kriteria</a></li>
          </ul>
        </li>

        <li class="active treeview">
          <a href="#">
            <i class="fa fa-edit"></i>
            <span>Analisa</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="analisa_kriteria.php"><i class="fa fa-circle-o"></i> Analisa Kriteria</a></li>
            <li><a href="cek_analisa_kriteria.php"><i class="fa fa-circle-o"></i> Analisa Alternatif</a></li>
            <li><a href="rangking.php"><i class="fa fa-circle-o"></i> Perangkingan</a></li>
			<li class="active"><a href="a_hasil_keputusan.php"><i class="fa fa-circle-o"></i> Hasil Keputusan</a></li>
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
        <small>Hasil Keputusan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Analisa</a></li>
        <li class="active">Hasil Keputusan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
		<form role="form" method="post">
          <div class="box">
            <div class="box-header">
              <input type="hidden" name="id_hasil" class="form-control" value="<?=autonumber("hasil","id_hasil",2,"HSL")?>">
                  <label class="col-sm-1 control-label">Periode</label>

                  <div class="col-sm-2">
                    <select class="form-control" name="periode">
                    <option value="">Pilih</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>			   
					</select>
                  </div>
                
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Id Supplier</th>
                  <th>Nama Supplier</th>
                  <th>Nilai Akhir</th>
                  <th>Keputusan</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  include "koneksi.php";
                ?>
                <?php
				  $periode = date('Y');
                  $a="select a.id_supplier, b.nm_supplier, b.eigenvector from ada a, supplier b
					  where a.id_supplier = b.id_supplier and a.periode = '$periode' 
					  group by a.id_supplier order by b.eigenvector desc";
                  $b=mysqli_query($koneksi,$a);
                  $no=1;
                  while($c=mysqli_fetch_array($b)){
                  ?>
                    <tr>
                      <td><?php echo $no;?></td>
                      <td><?php echo $c['id_supplier'];?></td>
                      <td><?php echo $c['nm_supplier'];?></td>
                      <td>
                        <?php echo $c['eigenvector'];?>
                        <input type="hidden" name="aneh[]" value="<?php echo $c['eigenvector'];?>">
                      </td>
                      <td><input type="checkbox" name="keputusan[]" value="<?php echo $c['id_supplier'];?>"></td>
                    </tr>
                    <?php $no++; } ?>                       
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Id Supplier</th>
                  <th>Nama Supplier</th>
                  <th>Nilai Akhir</th>
                  <th>Keputusan</th>
                </tr>
                </tfoot>
              </table>
            </div>
			
                <button type="submit" name="simpan" class="btn btn-success">Cetak</button>
            <!-- /.box-body -->
          </div>
		</form>
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
    <strong>Copyright &copy; 2019 <a href="#">Audy</a>.</strong>
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