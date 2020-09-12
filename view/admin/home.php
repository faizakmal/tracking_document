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
  <!-- adminlte-->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
     <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
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
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-home"></i>
              <p>Home</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pengaturan.php" class="nav-link">
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
            <h1>Nasabah</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">Nasabah</li>
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
          <h3 class="card-title">Data Nasabah</h3>

          <div class="card-tools">
             <button type='button' class='btn btn-tool' href="#tambah" data-toggle='modal' title='Tambah Data'> <i class='fas fa-plus'></i></button>  
          </div>
        </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No Aplikasi</th>
                  <th>Nama Nasabah</th>
                  <th>Developer</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $i=0;
                    include('../../controller/conn.php');
                    $query=mysqli_query($conn,"select pengajuan.id, akun.nama, pengajuan.no_ktp, pengajuan.developer, pengajuan.status, pengajuan.keterangan from pengajuan, akun where pengajuan.username = akun.username");
                    while($row=mysqli_fetch_array($query)){
                  ?>
                <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['nama']; ?></td>
                  <td><?php echo $row['developer']; ?></td>
                  <td><?php echo $row['status']; ?></td>
                <td>
                  <button type='button' class='btn btn-info' href="#info<?php echo $row['id']; ?>" data-toggle='modal' title='Info Data'> <i class='fas fa-info-circle'></i></button> 
                  <button type='button' class='btn btn-warning' href="#edit<?php echo $row['id']; ?>" data-toggle='modal' title='Edit Data'> <i class='fas fa-edit'></i></button> 
                  <button type='button' class='btn btn-danger' href="#del<?php echo $row['id']; ?>" data-toggle='modal' title='Hapus Data '> <i class='fas fa-trash'></i></button> 
                  <!-- Info -->
    <div class="modal fade" id="info<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Info Aplikasi Nasabah</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
              </button>
            </div>
                <div class="modal-body">
        <?php
          $info=mysqli_query($conn,"select pengajuan.id, akun.nama, pengajuan.no_ktp, pengajuan.developer, pengajuan.status, pengajuan.keterangan from pengajuan, akun where pengajuan.username = akun.username and id='".$row['id']."'");
          $irow=mysqli_fetch_array($info);
        ?>
        <div class="container-fluid">
          <div class="form-group row">
            <div class="col-lg-4">
              <label class="control-label">Nomor Aplikasi</label>
            </div>
            <div class="col-lg-8">
              <input type="text" class="form-control" name="id" value="<?php echo $row['id']; ?>" readonly>
              </div>
            </div>
          <div class="form-group row">
            <div class="col-lg-4">
              <label class="control-label">Nama</label>
            </div>
            <div class="col-lg-8">
              <input type="text" class="form-control" name="nama" value="<?php echo $irow['nama']; ?>" readonly>
              </div>
            </div>
             <div class="form-group row">
            <div class="col-lg-4">
              <label class="control-label">Nomor KTP</label>
            </div>
            <div class="col-lg-8">
              <input type="text" class="form-control" name="no_ktp" value="<?php echo $irow['no_ktp']; ?>" readonly>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
              <label class="control-label">Developer</label>
            </div>
            <div class="col-lg-8">
              <input type="text" class="form-control" name="developer" value="<?php echo $irow['developer']; ?>" readonly>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
              <label class="control-label">Keterangan</label>
            </div>
            <div class="col-lg-8">
              <input type="text" class="form-control" name="keterangan" value="<?php echo $irow['keterangan']; ?>" readonly>
              </div>
            </div>
            <div class="form-group row">
              <table class="table table-bordered">
                <thead>
                <tr>
                  <th><b>Status</th>
                  <th><b>Tanggal</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $kquery=mysqli_query($conn,"select status, tanggal from status where  id='".$row['id']."'");
                    while($krow=mysqli_fetch_array($kquery)){ 
                  ?>
                <tr>
                  <td><?php echo $krow['status']; ?></td>
                  <td><?php echo $krow['tanggal']; ?></td>
                </tr>
          <?php
        }
      ?>
                </tbody>
              </table>
            </div>
          </div> 
            </div>
        </div>
    </div>
    </div>
<!-- /.modal -->

    <!-- Edit -->
    <div class="modal fade" id="edit<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Aplikasi Nasabah</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
              </button>
            </div>
                     <div class="modal-body">
        <?php
          $edit=mysqli_query($conn,"select pengajuan.id, akun.nama, pengajuan.no_ktp, pengajuan.developer, pengajuan.status, pengajuan.keterangan from pengajuan, akun where pengajuan.username = akun.username and id='".$row['id']."'");
          $erow=mysqli_fetch_array($edit);
        ?>
        <div class="container-fluid">
        <form method="POST" action="../../controller/admin/aplikasi.php?id=<?php echo $row['id']; ?>">
          <div class="form-group row">
            <div class="col-lg-4">
              <label class="control-label">Nomor Aplikasi</label>
            </div>
            <div class="col-lg-8">
              <input type="text" class="form-control" name="id" value="<?php echo $row['id']; ?>" readonly>
              </div>
            </div>
          <div class="form-group row">
            <div class="col-lg-4">
              <label class="control-label">Nama</label>
            </div>
            <div class="col-lg-8">
              <select class="select2bs4" style="width: 100%;" name="nama">
                    <?php 
                    $query1 = "SELECT * FROM akun WHERE username NOT IN (
                    SELECT username FROM akun WHERE username = 'Admin'
                   )ORDER BY username ASC";
                    $result1 = mysqli_query($conn, $query1);

                    while($data1 = mysqli_fetch_assoc($result1) ){?>
                      <option value="<?php echo $data1['username']; ?>" <?php if($erow['nama'] == $data1['nama']){ echo 'selected'; } ?> ><?php echo $data1['nama']; ?></option>
                    <?php } ?>
                  </select>
              </div>
            </div>
             <div class="form-group row">
            <div class="col-lg-4">
              <label class="control-label">Nomor KTP</label>
            </div>
            <div class="col-lg-8">
              <input type="text" class="form-control" name="no_ktp" value="<?php echo $erow['no_ktp']; ?>" required>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
              <label class="control-label">Developer</label>
            </div>
            <div class="col-lg-8">
              <input type="text" class="form-control" name="developer" value="<?php echo $erow['developer']; ?>" required>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
              <label class="control-label">Status</label>
            </div>
            <div class="col-lg-8">
                <select class="form-control" name="status">
                  <option value="FS1" <?php if($erow['status'] == 'FS1'){ echo 'selected'; } ?>>FS 1</option>
                  <option value="DBM1" <?php if($erow['status'] == 'DBM1'){ echo 'selected'; } ?>>DBM 1</option>
                  <option value="Analyst" <?php if($erow['status'] == 'Analyst'){ echo 'selected'; } ?>>Analyst</option>
                  <option value="DBM2" <?php if($erow['status'] == 'DBM2'){ echo 'selected'; } ?>>DBM 2</option>
                  <option value="BM" <?php if($erow['status'] == 'BM'){ echo 'selected'; } ?>>BM</option>
                  <option value="FS2" <?php if($erow['status'] == 'FS2'){ echo 'selected'; } ?>>FS 2</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
              <label class="control-label">Keterangan</label>
            </div>
            <div class="col-lg-8">
                <select class="form-control" name="keterangan">
                  <option value="Belum Diterima" <?php if($erow['keterangan'] == 'Belum Diterima'){ echo 'selected'; } ?>>Belum Diterima</option>
                  <option value="Diterima" <?php if($erow['keterangan'] == 'Diterima'){ echo 'selected'; } ?>>Diterima</option>
                </select>
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
<!-- Delete -->
    <div class="modal fade" id="del<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
          $del=mysqli_query($conn,"select pengajuan.id, akun.nama from pengajuan, akun where pengajuan.username = akun.username and id='".$row['id']."'");
          $drow=mysqli_fetch_array($del);
        ?>
        <div class="container-fluid">
          <h5><center>Apakah Anda Yakin Menghapus Aplikasi Nasabah <strong><?php echo $drow['nama']; ?></strong> ?</center></h5> 
                </div> 
        </div>
                <div class="modal-footer">
                  <form method="POST" action="../../controller/admin/aplikasi.php?id=<?php echo $row['id']; ?>">
                    <button name="delete" type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-check"></span> Hapus</button>
                </form>
                </div>
        
            </div>
        </div>
    </div>
<!-- /.modal -->

                 </td>
                </tr>
                </tbody>
                <?php } ?>
              </table>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Aplikasi Nasabah</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
              </button>
            </div>
                <div class="modal-body">
                  <form method="POST" action="../../controller/admin/aplikasi.php">
            <div class="form-group row">
            <div class="col-lg-4">
              <label class="control-label">Nomor Aplikasi</label>
            </div>
            <div class="col-lg-8">
              <input type="text" class="form-control" name="id" placeholder="Nomor Aplikasi" required>
              </div>
            </div>
          <div class="form-group row">
            <div class="col-lg-4">
              <label class="control-label">Nama</label>
            </div>
            <div class="col-lg-8">
              <select class="select2bs4" style="width: 100%;" name="nama">
                    <?php 
                    $query1 = "SELECT * FROM akun WHERE username NOT IN (
                    SELECT username FROM akun WHERE username = 'Admin'
                   )ORDER BY username ASC";
                    $result1 = mysqli_query($conn, $query1);

                    while($data1 = mysqli_fetch_assoc($result1) ){?>
                      <option value="<?php echo $data1['username']; ?>"><?php echo $data1['nama']; ?></option>
                    <?php } ?>
                  </select>
              </div>
            </div>
             <div class="form-group row">
            <div class="col-lg-4">
              <label class="control-label">Nomor KTP</label>
            </div>
            <div class="col-lg-8">
              <input type="text" class="form-control" name="no_ktp" placeholder="Nomor KTP" required>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
              <label class="control-label">Developer</label>
            </div>
            <div class="col-lg-8">
              <input type="text" class="form-control" name="developer" placeholder="Developer" required>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
              <label class="control-label">Status</label>
            </div>
            <div class="col-lg-8">
                <select class="form-control" name="status">
                  <option value="FS1">FS 1</option>
                  <option value="DBM1">DBM 1</option>
                  <option value="Analyst">Analyst</option>
                  <option value="DBM2">DBM 2</option>
                  <option value="BM">BM</option>
                  <option value="FS2">FS 2</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-lg-4">
              <label class="control-label">Keterangan</label>
            </div>
            <div class="col-lg-8">
                  <select class="form-control" name="keterangan">
                  <option value="Belum Diterima">Belum Diterima</option>
                  <option value="Diterima">Diterima</option>
                </select>
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
<!-- Select2 -->
<script src="../../plugins/select2/js/select2.full.min.js"></script>
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

    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });

    });
    

</script>

</body>
</html>
