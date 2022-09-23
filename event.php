<?php 
session_start();
require ('../karma_db/dbcontroller.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  
  <?php include 'template.php';?>
</head>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Events</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Events</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Event Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-hover text-nowrap">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Start/End Date</th>
                    <th>Time From/To</th>
                    <th>Venue</th>
                    <th>Status</th>
                    <th>Options</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    // Query to read data
                      $q = mysqli_query($conn, "SELECT * FROM events") or die(mysqli_error($conn));

                      while ($row = mysqli_fetch_array($q)) {
                        echo "<tr>";
                        echo "<td> {$row['id']} </td>";
                        echo "<td> {$row['name']} </td>";
                        echo "<td> {$row['start_date']} </td>";
                        echo "<td> {$row['time']} </td>";
                        echo "<td> {$row['venue']} </td>";
                        echo "<td> {$row['status']} </td>";
                        echo "<td>Edit</td>";
                        echo "</tr>";
                      }
                    ?>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>

<?php
//Close connection with server
mysqli_close($conn);
?>

</body>
</html>

