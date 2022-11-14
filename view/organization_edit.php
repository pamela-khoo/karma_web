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
              <h1>Edit Organization</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Organization</a></li>
                <li class="breadcrumb-item active">Edit Organization</li>
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
                <form name="frmAdd" method="POST" action="" id="frmAdd">
                <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="org_name" class="required_label">Organization Name</label>
                      <input class="form-control" required="" name="org_name" type="text" value="<?php echo $result[0]["org_name"]; ?>">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="status" class="required_label">Status</label>
                      <select class="form-control" required="" id="status" name="status" >
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="banner">Logo Image</label>
                      <input class="form-control file-input" accept="image/*" name="logo_url" type="file" required="" 
                          value="<?php echo $result[0]["logo_url"]; ?>">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="org_url">Organization URL</label>
                      <input class="form-control" required="" name="org_url" type="url" value="<?php echo $result[0]["org_url"]; ?>" placeholder="https://example.com">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="user_id">Organizer Account</label>
                      <select class="form-control" id="user_id" name="user_id">
                        <option disabled selected value> Select Organizer </option>
                        <?php
                        $sql = "SELECT * FROM user";
                        $conn = mysqli_connect('localhost', 'root', '', 'karma_db');
                        $res = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($res)) {
                          echo "<option value='$row[id]'>$row[email]</option>";
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea id="description" required="" class="form-control ckeditor" rows="4" cols="40" name="description">
                        <?php echo $result[0]["description"]; ?>
                      </textarea>
                    </div>
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" name="add_org" id="btnSubmit" value="Submit">
                  <?php
                    if (isset($_POST['add_org'])){  ?> 
                      <script type="text/javascript">
                        window.location = "index.php?action=org-view";
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

<!--text-editor-->
<script src="https://waw.caritech.com/vendor/ckeditor/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js" integrity="sha512-quHCp3WbBNkwLfYUMd+KwBAgpVukJu5MncuQaWXgCrfgcxCJAq/fo+oqrRKOj+UKEmyMCG3tb8RB63W+EmrOBg==" crossorigin="anonymous"></script>


  <!-- Page specific script -->
  <script>
    $(function() {
      bsCustomFileInput.init();
    });
  </script>

<script>
function validate() {
    var valid = true;   
    $(".demoInputBox").css('background-color','');
    $(".info").html('');
    
    if(!$("#name").val()) {
        $("#name-info").html("(required)");
        $("#name").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#status").val()) {
        $("#status").html("(required)");
        $("#status").css('background-color','#FFFFDF');
        valid = false;
    }
    return valid;
}
</script>
</body>
</html>