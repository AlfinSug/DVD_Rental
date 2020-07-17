<?php 
include('pegawai_db.php');
$pegawaidb = new pegawai_db();
$results = $pegawaidb->tampil_data();
      

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Rental DVD - Pegawai</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../asset/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../asset/bower_components/font-awesome/css/font-awesome.min.css">
  <link href="../asset/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../asset/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../asset/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../asset/dist/css/AdminLTE.min.css">
  <script type="text/javascript" src="../asset/sweetalert/sweetalert.min.js"></script>
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../asset/dist/css/skins/_all-skins.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../asset/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

        <style>
            .form-pass {
              border: none;
              outline: none;
              background: none;
              font-size: 120%;
            }
        </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">

<?php

if(isset($_GET['msg'])){
  if($_GET['msg'] == "sukses"){
    echo '<script>swal("Tambah Data", "Data berhasil ditambahkan!", "success");</script>';
  }
  else if($_GET['msg'] == "updated"){   
   echo '<script>swal("Ubah Data", "Data berhasil di ubah!", "info");</script>';
  }
}
?>
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Rental</b>DVD</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <?php include("sidebar.php") ?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pegawai
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Pegawai</h3>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fas fa-download fa-sm text-white-50"></i>    Tambah Data Pegawai</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Pegawai</th>
                  <th>Nama Pegawai</th>
                  <th>Password</th>
                  <th colspan="2">Keterangan</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($results as $show) {
                  ?>
                <tr>
                  <td><?php echo $show['id_pgw']; ?></td>
                  <td><?php echo $show['nama_pgw']; ?></td>
                  <td><input class="form-pass" type="password" value="<?php echo $show['password_pgw']; ?>" disabled></td>
                  <td><a class="btn btn-success" data-toggle="modal" href="#modal-update<?php echo $show['id_pgw']; ?>"><i class="fas fa-pen-square"></i>  Update</a></td>
                  <td>
                    <button class="btn btn-danger" onclick="deleted()" ><i class="fas fa-trash"></i>  Delete</button></td>
                </tr>

                <div class="modal fade" id="modal-update<?php echo $show['id_pgw']; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ubah Data Pegawai</h4>
              </div>
              <div class="modal-body">
              <div class="box box-info">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">Update Form</h3> -->
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="../views/action-pegawai.php?aksi=edit&id=<?php echo $show['id_pgw']; ?>" class="form-horizontal">
              <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">ID Pegawai</label>
                  
                    <input type="input" class="form-control" disabled="false" name="id_pgw" value="<?php echo $show['id_pgw']; ?>"/>
              </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Pegawai</label>
                  
                  <input type="input" class="form-control" name="nama_pgw" value="<?php echo $show['nama_pgw']; ?>">
                
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Password</label>
                 
                    <input type="password" class="form-control" name="password_pgw" value="<?php echo $show['password_pgw']; ?>">
                 
                </div>
                
                <div class="form-group">
                <button type="submit" name="edit" class="btn btn-primary">Ubah</button>
                <button type="button"   data-dismiss="modal" class="btn btn-danger">Batal</button>
                </div>
              </div>
              <!-- /.box-body -->
            </form>
          </div>
              </div>
              <div class="modal-footer">
             
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

                <?php } ?>
                </tbody>
              </table>
            </div>

        <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data Pegawai</h4>
              </div>
              <div class="modal-body">
              <div class="box box-info">
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="action-pegawai.php?aksi=save" class="form-horizontal" onsubmit="return validation();">
              <div class="box-body">
              <input type="hidden" class="form-control" name="id_pgw">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Pegawai</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_pgw" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="password_pgw" value="">
                  </div>
                </div>
                <div  class="form-group">
                    
                <button type="submit" name="save" class="btn btn-primary">Tambah</button>
                    
                <button type="button"  data-dismiss="modal" class="btn btn-danger">Batal</button>
                    
                </div>
              </div>
              <!-- /.box-body -->
            </form>
          </div>
              </div>
              <div class="modal-footer">
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          </div>
              </div>
              <div class="modal-footer">
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
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
    
  </footer>

  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../asset/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../asset/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../asset/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../asset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../asset/dist/js/demo.js"></script>
<!-- bootstrap datepicker -->
<script src="../asset/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- page script -->


<script>
function deleted() {
            swal({
                title: "Hapus Data",
                text: "Apakah anda yakin ingin mengahpus film ini?",
                icon: 'warning',
                buttons: true
            }).then(val => {
                if(val) {
                    window.location.href = "action-pegawai.php?aksi=del&id=<?php echo $show['id_pgw']; ?>"
                }
            });     
            
        }
</script>
</body>
</html>
