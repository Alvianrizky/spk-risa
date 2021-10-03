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
$id_jurusan = $_GET['id_jurusan'];
$query = "select * from jurusan where id_jurusan = '$id_jurusan'";
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
			      <li><a href="l_profilejabatan.php"><i class="fa fa-circle-o"></i> Rekap Profile Jabatan</a></li>
			      <li><a href="l_rankingjabatan.php"><i class="fa fa-circle-o"></i> Ranking</a></li>
            <li><a href="l_rankingsiswa.php"><i class="fa fa-circle-o"></i> Rekomendasi Per Siswa</a></li>
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
        <small><a href="analisa_alternatif_tabel.php?id_jurusan=<?php echo $id_jurusan;?>">Analisa Alternatif</small></a>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Analisa </a></li>
        <li class="active"><a href="analisa_kriteria_tabel.php">Analisa Alternatif</li></a>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="box">
      <!-- /.box-header -->
      <div class="box-body">

      <form action="analisa_.php" method="POST" enctype="multipart/form-data" class="form-horizontal ">
		<div class="form-group row">
			<?php 
			$query2 =  mysqli_query($koneksi,"SELECT * FROM jurusan ORDER BY id_jurusan");?>
			<label class="col-md-2 form-control-label" for="text-input">Nama Materi</label>
			<div class="col-md-5">
				<select name="nmJurusan" class="form-control" required>
					<option value='belum memilih' selected>-- Pilih Jurusan --</option>
					<?php while($b=mysqli_fetch_array($query2)) { ?>
						<option value="<?php echo $b['id_jurusan'] ?>"> <?php echo $b['nm_jurusan'] ?> </option>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<?php
			$query2 =  mysqli_query($koneksi,"SELECT * FROM subkriteria ORDER BY id_subkriteria");?>
			<label class="col-md-2 form-control-label" for="text-input">Nama Subkriteria</label>
			<div class="col-md-5">
				<select name="nmSubkriteria" class="form-control" required="">
					<option value='belum memilih' selected>-- Pilih Subkriteria --</option>
					<?php
					while($b=mysqli_fetch_array($query2)) { ?>
						<option value="<?php echo $b['id_subkriteria'] ?>"> <?php echo $b['nm_subkriteria'] ?> </option>
					<?php } ?>
				</select>
			</div>
		</div>
    <div class="form-group row">
            <label class="col-md-2 form-control-label" for="text-input">Status</label>
            <div class="col-md-5">
              <select name="status" class="form-control">
                <option value="belum memilih" selected="">-- Pilih Status --</option>
                <option value="C">Core Factor</option>
                <option value="S">Secondary Factor</option>
              </select>
            </div>
            <button name="tambah" type="submit" id="tambah" class="btn btn-default">TAMBAH</button>
          </div>
		<div class="form-group row">
			<label class="col-md-2 form-control-label" for="text-input">Nilai Target</label>
			<div class="col-md-5">
				<input type="text" id="nitar" name="nitar" maxlength="1" onkeypress="return hanyaAngka(event)" class="form-control" placeholder="Nilai Target" required="">
			</div>
			<button name="tambah" type="submit" id="tambah" class="btn btn-default">TAMBAH</button>
		</div>
		<div class="form-group row">
			<label class="col-md-2 form-control-label" for="text-input"></label>
			<div class="col-md-10 table-responsive">
				<table class="table">
					<tr>
						<th>No.</th>
						<th>Jurusan</th>
						<th>Kriteria</th>
						<th>Subkriteria</th>
						<th>Nilai Target</th>
						<th>Status</th>
						<th>Opsi</th>
					</tr>
					<tr>
						<?php
						$no = 1;
						$get = mysqli_query($koneksi,"SELECT
                                `materi`.`nama_materi`,
                                `kriteria`.`nama_kriteria`,
                                `subkriteria`.`nama_subkriteria`,
                                `temp_target`.`nilai_target`,
                                `subkriteria`.`status`,
                                `temp_target`.`id_jurusan`,
                                `temp_target`.`id_subkriteria`
                              FROM
                                `materi`
                                INNER JOIN `temp_target` ON `materi`.`id_materi` = `temp_target`.`id_materi`
                                INNER JOIN `subkriteria` ON `subkriteria`.`id_subkriteria` =
                                  `temp_target`.`id_subkriteria`
                                INNER JOIN `kriteria` ON `kriteria`.`id_kriteria` =
                                  `subkriteria`.`id_kriteria`");
						while ($tampil=mysqli_fetch_array($get)) {
							?>
							<td><?php echo $no++; ?></td>
							<td><?php echo $tampil['nama_materi']; ?></td>
							<td><?php echo $tampil['nama_kriteria']; ?></td>
							<td><?php echo $tampil['nama_subkriteria']; ?></td>
							<td><?php echo $tampil['nilai_target']; ?></td>
							<td><?php echo $tampil['status']; ?></td>
							<td><a name="profpo" onclick="{ location.href='prs_anaprofmat.php?id_materi=<?php echo $tampil['id_materi'];?>&&id_subkriteria=<?php echo $tampil['id_subkriteria'];?>' }" class="btn btn-danger btn-xs">Hapus</a></td> 
						</tr>
						<?php } ?>
				</table>
			</div>
		</div>
	</form>
	<hr>
            <form action="analisa_profass.php" method="POST" enctype="multipart/form-data" class="form-horizontal ">
          <div class="form-group row">
            <?php 
            $query2 =  mysqli_query($connect,"SELECT * FROM siswa ORDER BY nisn");
            ?>
            <label class="col-md-2 form-control-label" for="text-input">Nama Siswa</label>
            <div class="col-md-5">
            <select class="form-control" name="nisn">
                        <option >Pilih</option>
                          <?php
                            include "koneksi.php";
                            $query = "SELECT * FROM siswa order by nisn";
                            $hasil = mysqli_query($koneksi,$query);
                            while ($data = mysqli_fetch_array($hasil))
                            {
                            echo "<option value='".$data['nisn']."'>".$data['nm_siswa']."</option>";
                            }
                          ?>
                        </select>
            </div>
          </div>
          <div class="form-group row">
            <?php 
            $query2 =  mysqli_query($connect,"SELECT * FROM subkriteria ORDER BY id_subkriteria");
            ?>
            <label class="col-md-2 form-control-label" for="text-input">Subkriteria</label>
            <div class="col-md-5">
            <select class="form-control" name="id_subkriteria">
                        <option >Pilih</option>
                          <?php
                            include "koneksi.php";
                            $query = "SELECT * FROM subkriteria order by id_subkriteria";
                            $hasil = mysqli_query($koneksi,$query);
                            while ($data = mysqli_fetch_array($hasil))
                            {
                            echo "<option value='".$data['id_subkriteria']."'>".$data['nm_subkriteria']."</option>";
                            }
                          ?>
                        </select>
            </div>
          </div>
          
          <div class="form-group row">
            <label class="col-md-2 form-control-label" for="text-input">Nilai Siswa</label>
            <div class="col-md-5">
              <input type="text" id="nilai" name="nilai" class="form-control" placeholder="Nilai Siswa" required="">
            </div>
            <button name="tambah" type="submit" id="tambah" class="btn btn-default">TAMBAH</button>
          </div>
          <div class="form-group row">
            <label class="col-md-2 form-control-label" for="text-input"></label>
            <div class="col-md-10 table-responsive">
              <table class="table">
                <tr>
                  <th>No.</th>
                  <th>Siswa</th>
                  <th>Subkriteria</th>
                  <th>Nilai Siswa</th>
                  <th>Opsi</th>
                </tr>
                <tr>
                <?php
                $no = 1;
                $get = mysqli_query($connect,"SELECT
                  `siswa`.`nm_siswa`,
                  `subkriteria`.`nm_subkriteria`,
                  `temp_profass`.*
                  FROM
                  `siswa`
                  INNER JOIN `temp_profass` ON `siswa`.`nisn` = `temp_profass`.`nisn`
                  INNER JOIN `subkriteria` ON `subkriteria`.`id_subkriteria` =
                  `temp_profass`.`id_subkriteria` ORDER BY nisn");
                while ($tampil=mysqli_fetch_array($get)) {
                ?>
                <td><?php echo $no++; ?></td>
                <td><?php echo $tampil['nm_siswa']; ?></td>
                <td><?php echo $tampil['nm_subkriteria']; ?></td>
                <td><?php echo $tampil['nilai']; ?></td>
                <td><a onclick="{ location.href='analisa_profass.php?id_subkriteria=<?php echo $tampil['id_subkriteria']; ?>&&nim=<?php echo $tampil['nim']; ?>'}" class="btn btn-danger btn-xs">Hapus</a></td>
              </tr>
  <?php } ?></table>
            </div>
          </div>
        </form>
        <form action="proses/prs_analisa.php" method="POST" enctype="multipart/form-data" class="form-horizontal ">
          <div class="form-group row">
            <div class="col-md-5">
            </div>
            <button name="hitung" type="submit" id="hitung" class="btn btn-default">HITUNG</button>
          </div>
        </form>	
          </div>
          <!-- /.box body-->
        </div>
        <!-- /.box -->
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