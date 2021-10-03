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

/*=====================================================================*/
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
 $count = "select count(DISTINCT id_kriteria) as 'jumlah' from ada where periode='$periode'";
 $count_k=mysqli_query($koneksi,$count);
 $data_k=mysqli_fetch_array($count_k);
 
 $j="select nilai from ada where periode='$periode'";
                  $k=mysqli_query($koneksi,$j);
                  $data = array(); 

                  while($row=mysqli_fetch_array($k)){
                    $data_arr = $row[eigenvector_alternatif];
                    $data[] = $data_arr;
                    }
                    $array_terpecah = array_split($data,$data_k['jumlah']);
                //print_r($array_terpecah);
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
            <li class="active"><a href="rangking.php"><i class="fa fa-circle-o"></i> Perangkingan</a></li>
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
        Analisa
        <small>Perangkingan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Analisa</a></li>
        <li class="active">Perangkingan</li>
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
              <h4><label>Matriks Alternatif Kriteria</label></h4>
            </div>
            </div>           
        </div>
          
          
          <!-- ===============================START ================================ -->  
            
      <table width="100%" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th rowspan="2" style="vertical-align: middle" class="text-center">Alternatif</th>
                    <?php
            include 'koneksi.php';
            $a="select count(id_kriteria) as 'count_kriteria' from kriteria order by id_kriteria";
            $b=mysqli_query($koneksi,$a);
            while($c=mysqli_fetch_array($b)){
          ?>
                    <th colspan="<?php echo $c['count_kriteria'] ?>" class="text-center">Kriteria</th>
          <?php
          }
          ?>
                   
        </tr>
                
        <tr>
          <?php
          include 'koneksi.php';
          $d="select * from kriteria order by id_kriteria ";
          $e=mysqli_query($koneksi,$d);
          while($f=mysqli_fetch_array($e)){
          ?>
          <th><?php echo $f['nm_kriteria'] ?></th>
          <?php
            }
          ?>
                </tr>
        
            </thead>
    
            <tbody>

        <?php 
      if(count($B) > 0) {
        foreach($B as $nim=>$kategori) {
      ?>
            <tr>
              <td>
        <?php echo $nama[$nim];?></td>
        <?php
          $total = 0;
          foreach(array_reverse($kategori) as $kategori=>$nilai) {
          ?>
                <td>
          <?php echo number_format($B[$nim][$kategori],3);?>
        </td>
          <?php
          $total = $total + $B[$nim][$kategori];
        }
        ?>
        <td><?php echo number_format($total,3);?></td>
        </td> 
            </tr>
            <?php
      
        
        }
            ?>
            <?php
      }
      else {
        $sql = "SELECT * FROM supplier";
        $res = mysqli_query($koneksi, $sql);
        while($data = mysqli_fetch_assoc($res)) {
        $nim = $data['nm_supplier'];
        $nim1 = $data['id_supplier']
            ?>
            <tr>
              <td><?php echo $nim;?></td>
              <?php
        $total = 0;
        $sql = "SELECT * FROM ada WHERE id_supplier = '$nim1'";
        $fetchResult = mysqli_query($koneksi, $sql);
        while($nilai = mysqli_fetch_assoc($fetchResult)) {
                ?>
                  <td><?php echo $nilai['eigenvector_alternatif'];?></td>
                <?php
                
              }
              ?>
             
      
            </tr>
            <?php
      
            }
          }
      
        ?>
    
      </tbody>
        </table>
               
          </div>          
        </form>


      <div class="box-body">
        <div class="row">
            <div class="col-xs-12 col-md-3">
            <div class="form-group">
              <h4><label>Bobot Kriteria</label></h4>
            </div>
            </div>           
        </div>

        <table width="100%" class="table table-striped table-bordered">
          <thead>
                <tr>
                  
                  <th>Nama Kriteria</th>
                  <th>Nilai Eigenvector</th>
                </tr>
                </thead>
           <tbody>
                <?php
                  include "koneksi.php";
                ?>
                <?php
                  $a="select * from kriteria order by id_kriteria";
                  $b=mysqli_query($koneksi,$a);
                  $no=1;
                  while($c=mysqli_fetch_array($b)){
                  ?>
                    <tr>
                      
                      <td><?php echo '<b>'.$c['nm_kriteria'].'</b>';?></td>
                      <td><?php echo '<b>'.$c['eigenvector_kriteria'].'</b>';?></td>
                    </tr>
                    <?php $no++; } ?>                       
                </tbody>
        </table>

      </div>

      <div class="box-body">
        <div class="row">
            <div class="col-xs-12 col-md-3">
            <div class="form-group">
              <h4><label>Rangking</label></h4>
            </div>
            </div>           
        </div>

        <table width="100%" class="table table-striped table-bordered">
          <thead>
                <tr>
                  <th>Nama Alternatif</th>
                  <th>Nilai Akhir</th>
                  <th>Rangking</th>
                </tr>
                </thead>
           <tbody>
                <?php
                  include "koneksi.php";
                ?>
                <?php
                  $periode = date('Y');
                  $a="select a.id_supplier, c.nm_supplier, sum(a.eigenvector_alternatif * b.eigenvector_kriteria) as rangking from ada a, kriteria b, supplier c
                      where a.id_kriteria = b.id_kriteria and a.id_supplier = c.id_supplier and a.periode = '$periode'
                      group by a.id_supplier order by sum(a.eigenvector_alternatif * b.eigenvector_kriteria) desc";
                  $b=mysqli_query($koneksi,$a);
                  $no=1;
                  while($c=mysqli_fetch_array($b)){
                  ?>
                    <tr>
                      
                      <td><?php echo '<b>'.$c['nm_supplier'].'</b>';?></td>
                      <td><?php echo '<b>'.$c['rangking'].'</b>';?></td>
                      <td><?php echo '<b>'.$no.'</b>';?></td>
                    </tr>
                    <?php
                    $update = "update supplier set eigenvector = '".$c['rangking']."' where id_supplier =  '".$c['id_supplier']."' ";
                    $hasil_update = mysqli_query($koneksi, $update);

                     ?>
                    <?php $no++; } ?>                       
                </tbody>
        </table>

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