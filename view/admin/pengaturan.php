<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BTN Syariah | Admin</title>
  <link rel="shortcut icon" href="../../dist/img/icon-btn.png"  />
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- adminlte-->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="home.php" class="brand-link">
    <img src="../../dist/img/icon-btn.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
    <span class="brand-text font-weight-light">BTN Syariah</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['nama'];  ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="home.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>Home</p>
            </a>
          </li>
          <li class="nav-item active">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-user"></i>
              <p>Pengaturan</p>
            </a>
          </li>
          <li class="nav-header"></li>
          <li class="nav-item">
            <a href="../../controller/logout.php" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pengaturan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="pengaturan.php">Pengaturan</a></li>
              <li class="breadcrumb-item active">Akun Nasabah</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Akun Nasabah</h3>

          <div class="card-tools">
          <button type='button' class='btn btn-tool' href="#tambah" data-toggle='modal' title='Tambah Data'> <i class='fas fa-plus'></i></button> 
          </div>
        </div>
        <div class="card-body">
           <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Nama</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $i=0;
                    include('../../controller/conn.php');
                    $query=mysqli_query($conn,"select * from akun");
                    while($row=mysqli_fetch_array($query)){
                     $i++;
                  ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $row['username']; ?></td>
                  <td><?php echo $row['nama']; ?></td>
                <td>
                  <button type='button' class='btn btn-warning' href="#edit<?php echo $row['username']; ?>" data-toggle='modal' title='Edit Data'> <i class='fas fa-edit'></i></button> 
                  <button type='button' class='btn btn-danger' href="#del<?php echo $row['username']; ?>" data-toggle='modal' title='Hapus Data '> <i class='fas fa-trash'></i></button> 

<!-- Edit -->
    <div class="modal fade" id="edit<?php echo $row['username']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Akun Nasabah</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
              </button>
            </div>
                <div class="modal-body">
        <?php
          $edit=mysqli_query($conn,"select * from akun where username='".$row['username']."'");
          $erow=mysqli_fetch_array($edit);
        ?>
        <div class="container-fluid">
        <form method="POST" action="../../controller/admin/akun.php?id=<?php echo $erow['username']; ?>">
          <div class="form-group row">
            <div class="col-lg-4">
              <label class="control-label">Username</label>
            </div>
            <div class="col-lg-8">
              <input type="text" class="form-control" name="username" value="<?php echo $erow['username']; ?>" readonly>
              </div>
            </div>
          <div class="form-group row">
            <div class="col-lg-4">
              <label class="control-label">Password</label>
            </div>
            <div class="col-lg-8">
              <input type="password" class="form-control" name="password" value="<?php echo $erow['password']; ?>" required>
              </div>
            </div>
           <div class="form-group row">
            <div class="col-lg-4">
              <label class="control-label">Konfirmasi Password</label>
            </div>
            <div class="col-lg-8">
              <input type="password" class="form-control" name="kpassword" value="<?php echo $erow['password']; ?>" required>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
              <label class="control-label">Nama Nasabah</label>
            </div>
            <div class="col-lg-8">
              <input type="text" class="form-control" name="nama" value="<?php echo $erow['nama']; ?>" required>
              </div>
            </div>
          </div> 
          </div>
                <div class="modal-footer">
                    <button name="edit" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</button>
                </div>
        </form>
            </div>
        </div>
    </div>
<!-- /.modal -->

<!-- Modal Delete -->
    <div class="modal fade" id="del<?php echo $row['username']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Konfirmasi Hapus</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
        <?php
          $del=mysqli_query($conn,"select * from akun where username='".$row['username']."'");
          $drow=mysqli_fetch_array($del);
        ?>
        <div class="container-fluid">
          <h5><center>Apakah Anda Yakin Menghapus Nasabah <strong><?php echo $drow['nama']; ?></strong> ?</center></h5> 
                </div> 
        </div>
                <div class="modal-footer">
                  <form method="POST" action="../../controller/admin/akun.php?id=<?php echo $row['username']; ?>">
                    <button name="delete" type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-check"></span> Hapus</button>
                </form>
                </div>
        
            </div>
        </div>
    </div>
<!-- /.modal -->

            </td>
          </tr>
          <?php
        }
      
      ?>
                </tbody>
              </table>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
      <!-- Tambah -->
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Akun Nasabah</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
              </button>
            </div>
                <div class="modal-body">
        <div class="container-fluid">
        <form method="POST" action="../../controller/admin/akun.php">
          <div class="form-group row">
            <div class="col-lg-4">
              <label class="control-label">Username</label>
            </div>
            <div class="col-lg-8">
              <input type="text" class="form-control" name="username" placeholder="Masukkan Username" required="">
              </div>
            </div>
          <div class="form-group row">
            <div class="col-lg-4">
              <label class="control-label">Password</label>
            </div>
            <div class="col-lg-8">
              <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required>
              </div>
            </div>
           <div class="form-group row">
            <div class="col-lg-4">
              <label class="control-label">Konfirmasi Password</label>
            </div>
            <div class="col-lg-8">
              <input type="password" class="form-control" name="kpassword" placeholder="Ketik Ulang Password"  required>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
              <label class="control-label">Nama Nasabah</label>
            </div>
            <div class="col-lg-8">
              <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Nasabah" required>
              </div>
            </div>
          </div> 
                <div class="modal-footer">
                    <button name="tambah" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Tambah</button>
                </div>
        </form>
            </div>
        </div>
    </div>
<!-- /.modal -->

    </section>
    <!-- /.content -->
    
  </div>
  <!-- /.content-wrapper -->


  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2020 <a href="#">BTN Syariah</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script type="text/javascript">
   $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      });
    });
</script>

</body>
</html>
