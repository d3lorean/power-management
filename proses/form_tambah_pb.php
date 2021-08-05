<?php
session_start();
error_reporting(0);
include('include/config.php');
include('koneksi.php');

$id_pb=$_GET['id_pb'];
$query = "SELECT * from pascabayar where id_pb='$id_pb'"; 
$result = mysqli_query($koneksi, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);

if(strlen($_SESSION['alogin'])==0)
{ 
  header('location:index.php');
}
else{
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <link rel="shortcut icon" href="../images/logo.png">
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Tambah Pascabayar</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link type="text/css" href='datatabel/jquery.dataTables.min.css' rel='stylesheet'>
    <link type="text/css" href='datatabel/responsive.dataTables.min.css' rel='stylesheet'>
    <link type="text/css" href='datatabel/buttons.dataTables.min.css' rel='stylesheet'>
  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <?php include('../include/header.php');?>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <?php include('../include/sidebar.php');?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-pencil"></i> Tambah Pascabayar </h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <form method="post" name="tambahdata" action="tambahdatapb.php">
               <div class="row">
                  <div class="col-md-6">
                    <label class="control-label">Jumlah</label>
                    <input type="text" class="form-control" placeholder="50000" name="jumlah" value="<?php echo $row['jumlah']; ?>" required>
                  </div><div class="col-md-6">
                    <label class="control-label">Hari</label>
                    <input type="text" class="form-control" placeholder="30" name="hari" value="<?php echo $row['hari']; ?>" required>
                  </div>
                  <!-- <div class="col-md-6">
                    <label class="control-label">Outcome</label>
                    <select name="id_outcome" class="form-control">
                      <?php 
                      $sql = "SELECT * FROM outcome";
                      $res = $koneksi->query($sql);
                        if($res->num_rows > 0){
                          while($row = $res->fetch_assoc()){
                            echo "<option value='".$row['id_outcome']."'>".$row['id_outcome'] ." - ".$row['kategori']."</option>";
                          }
                        }
                        ?> -->
                    </select>
                  </div>
                </div>
                </div>
                <div class="form-group mt-3">
                <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <!-- Google analytics script-->
    <script src="datatabel/jquery.dataTables.min.js"></script>
    <script src="datatabel/dataTables.responsive.min.js"></script>
    <script src="datatabel/dataTables.buttons.min.js"></script>
    <script src="datatabel/buttons.colVis.min.js"></script>
    <script>
     $(document).ready(function() {
      $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
        'colvis'
        ]
      } );
    } );
  </script>
</body>
</html>
<?php } ?>