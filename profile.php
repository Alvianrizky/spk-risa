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
if(isset($_SESSION['username'])){
$username= $_SESSION['username']; 
$sql="select * from user where username='$username'";
$query=mysqli_query($koneksi,$sql);
$data=mysqli_fetch_array($query);
}else{
echo "Data yang diubah belum ada";
}
?>
<?php
if(isset($_POST['simpan'])){
$username=$_POST['username'];
$password_lama=$_POST['password_lama'];
$password_baru=$_POST['password_baru'];
$password_konfirmasi=$_POST['password_konfirmasi'];

$sql="select * from user where username='$username' and password='$password_lama'";
$query=mysqli_query($koneksi,$sql);
$data=mysqli_fetch_array($query);


  if(empty($_POST["password_baru"]) && empty($_POST["password_konfirmasi"])){
    echo "<script language='javascript'>
        document.location='profile.php';
        </script>";
  }elseif($_POST["password_lama"] == $data["password"] && empty($_POST["password_baru"])){
    echo "<script language='javascript'>
        alert('New password must filled');
        document.location='profile.php';
        </script>";
  }elseif($_POST["password_lama"] == $data["password"] && empty($_POST["password_konfirmasi"])){
    echo "<script language='javascript'>
        alert('Confirmation password must filled');
        document.location='profile.php';
        </script>";
  }elseif($_POST["password_lama"] != $data["password"]){
    echo "<script language='javascript'>
        alert('password not the same');
        document.location='profile.php';
        </script>";
  }elseif($_POST["password_lama"] == $data["password"] && $_POST["password_baru"] != $_POST["password_konfirmasi"]){
    echo "<script language='javascript'>
        alert('New password not the same as confirmation password');
        document.location='profile.php';
        </script>";  
  }elseif($password_lama == $data["password"] && $_POST["password_baru"] == $_POST["password_konfirmasi"]) {
    $a="update user set password='$password_baru' where username='$username'";
    $b=mysqli_query($koneksi,$a);
    echo "<script language='javascript'>
        alert('password has been changed');
        document.location='profile.php';
        </script>";
  }else{
    echo "<script language='javascript'>
        document.location='profile.php';
        </script>";
  }
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
  <!-- daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="icon" href="favicon.ico">

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
    <a href="home.php" class="logo">
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
          <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i>
            <span>Home</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="home.php"><i class="fa fa-circle-o"></i> Dashboard</a></li>
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
            <li><a href="m_supplier.php"><i class="fa fa-circle-o"></i> Supplier</a></li>
            <li><a href="m_kriteria.php"><i class="fa fa-circle-o"></i> Kriteria</a></li>
          </ul>
        </li>    
        <li class="treeview">
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
            <li><a href="a_hasil_keputusan.php"><i class="fa fa-circle-o"></i> Hasil Keputusan</a></li>
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
        Data Profile
        <small>User</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Profile</a></li>
        <li class="active">User</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Data User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">username</label>
                  <div class="col-sm-4">
                    <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $data['username'];?>" readonly>
                  </div>
                </div>

                <br><br>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password Lama</label>

                  <div class="col-sm-4">
                    <input type="password"  class="form-control" name="password_lama" placeholder="Password Lama" >
                  </div>
                </div>

                <br><br>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password Baru</label>

                  <div class="col-sm-4">
                    <input type="password"  class="form-control" name="password_baru" placeholder="Password Baru">
                  </div>
                </div>

                <br><br>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Konfirmasi Password</label>

                  <div class="col-sm-4">
                    <input type="password"  class="form-control" name="password_konfirmasi" placeholder="Konfirmasi Password">
                  </div>
                </div>
                  
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label"></label>
                  <div class="col-sm-10">
                    <br>
                    <button type="submit" name="simpan" class="btn btn-success">Edit</button>
                    &nbsp;
                    <button type="reset" class="btn btn-danger">&nbsp;&nbsp;Clear&nbsp;&nbsp;</button>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->

            </form>
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
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    $('#datepicker2').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
<script>
function tampilkandata(){
  var nama_fakultas=document.getElementById("asisten").kategori.value;
  if (nama_fakultas=="FTI")
    {
        document.getElementById("tampil").innerHTML="<option value=''>Pilih</option><option value='Sistem Informasi'>Sistem Informasi</option><option value='Sistem Komputer'>Sistem Komputer</option><option value='Teknik Informatika'>Teknik Informatika</option>";
    }
  else if (nama_fakultas=="FIKOM")
    {
        document.getElementById("tampil").innerHTML="<option value=''>Pilih</option><option value='Desain Komunikasi Visual'>Desain Komunikasi Visual</option><option value='Ilmu Komunikasi'>Ilmu Komunikasi</option>";
    }
  else if (nama_fakultas=="FEB")
    {
        document.getElementById("tampil").innerHTML="<option value=''>Pilih</option><option value='Akuntansi'>Akuntansi</option><option value='Manajemen'>Manajemen</option>";
    }
  else if (nama_fakultas=="FISIP")
    {
        document.getElementById("tampil").innerHTML="<option value=''>Pilih</option><option value='Hubungan Internasional'>Hubungan Internasional</option><option value='Kriminologi'>Kriminologi</option>";
    }
  else if (nama_fakultas=="FT")
    {
        document.getElementById("tampil").innerHTML="<option value=''>Pilih</option><option value='Teknik Arsitektur'>Teknik Arsitektur</option>";
    }
  else if (nama_fakultas=="Pilih")
    {
        document.getElementById("tampil").innerHTML="<option value=''>Pilih</option>";
    }
}
</script>
</body>
</html>
