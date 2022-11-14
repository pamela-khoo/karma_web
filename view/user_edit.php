<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'template.php';?>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Edit User</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">User</a></li>
                <li class="breadcrumb-item active">Edit User</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <!-- form start -->
                <form name="frmAdd" method="POST" action="" id="frmAdd" onSubmit="">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="first_name" class="required_label">First Name</label>
                            <input class="form-control demoInputBox" required="" name="first_name" type="text" id="first_name" value="<?php echo $result[0]["first_name"]; ?>">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="last_name" class="required_label">Last Name</label>
                            <input class="form-control demoInputBox" required="" name="last_name" type="text" id="last_name" value="<?php echo $result[0]["last_name"]; ?>">
                      </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="status" class="required_label">Status</label>
                            <select class="form-control" required="" id="status" name="status"><option value="1">Active</option><option value="0">Inactive</option></select>
                        </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="email" class="required_label">Email Address</label>
                            <input class="form-control demoInputBox" required="" name="email" type="text" id="email" value="<?php echo $result[0]["email"]; ?>">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="points">Points</label>
                        <input class="form-control" autocomplete="off" step="5" min="0" name="points" type="number" required=""
                        value="<?php echo $result[0]["points"]; ?>">
                      </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="role" class="required_label">Role</label>
                            <select class="form-control" required="" id="role" name="role"><option value="1">Normal User</option><option value="2">Organizer</option></select>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" name="edit_user" id="btnSubmit" value="Submit">
                  <?php
                    if (isset($_POST['edit_user'])){  ?> 
                      <script type="text/javascript">
                        window.location = "index.php?action=user-view";
                      </script>     
                  <?php
                    }
                  ?>
                </div>
                </form>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>

    
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>

</body>
</html>