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
            <h1>Manage Organization</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Organizations</li>
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
                <h3 class="card-title">Organization Table</h3>
                <a type="button" id="btnAddAction" href="index.php?action=org-add" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add New Organization</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-hover text-nowrap">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Options</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    if (! empty($result)) {
                        foreach ($result as $k => $v) {
                          echo "<tr>";
                          echo "<td> {$result[$k]['id']} </td>";
                          echo "<td> {$result[$k]['org_name']} </td>";
                          echo "<td> {$result[$k]['description']} </td>";

                          if ($result[$k]['status'] == 1) {
                            echo "<td> <i class='fas fa-check text-success'></i> </td>";
                          } else {
                            echo "<td> <i class='fas fa-times text-red'></i> </td>";
                          }

                          ?>
                          <td><a class="btnEditAction" href="index.php?action=org-edit&id=<?php echo $result[$k]["id"]; ?>">
                            <i class="fa fa-edit fa-fw" aria-hidden="true"></i></a>
                            <a class="btnDeleteAction" onclick='confirmDel("index.php?action=org-delete&id=<?php echo $result[$k]["id"]; ?>" )'>
                            <i class="fa fa-trash fa-fw" aria-hidden="true"></i></a>
                           </td>
                    <?php
                        }
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


  function confirmDel(url) {
    if (confirm("Delete record?")) {
      window.location.replace(url);
    };
  }
</script>

</body>
</html>

