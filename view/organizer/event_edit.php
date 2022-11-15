<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'template.php'; ?>
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
              <h1>Edit Event</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Event</a></li>
                <li class="breadcrumb-item active">Edit Event</li>
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
                          <label for="event_name" class="required_label">Event Name</label>
                          <input class="form-control" required="" name="name" type="text" value="<?php echo $result[0]["name"]; ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="status" class="required_label">Status</label>
                          <select class="form-control" required="" id="status" name="status">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="banner">Image</label>
                          <input class="form-control file-input" accept="image/*" name="image_url" type="file" required="">
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
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="start_date">Start Date</label>
                          <input id="start_date" required="" class="form-control datepicker datetimepicker-input" data-target="#start_date" 
                          data-toggle="datetimepicker" autocomplete="off" inputmode="none" name="start_date" type="text" value="<?php echo $result[0]["start_date"]; ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="end_date">End Date</label>
                          <input id="end_date" required="" class="form-control datepicker datetimepicker-input" data-target="#end_date" 
                          data-toggle="datetimepicker" autocomplete="off" inputmode="none" name="end_date" type="text" value="<?php echo $result[0]["end_date"]; ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="venue">Venue</label>
                          <input class="form-control" required="" name="venue" type="text" value="<?php echo $result[0]["venue"]; ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="start_time">Time From</label>
                          <input id="start_time" required="" class="form-control timepicker datetimepicker-input" data-target="#start_time" 
                          data-toggle="datetimepicker" autocomplete="off" inputmode="none" name="start_time" type="text" value="<?php echo $result[0]["start_time"]; ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="end_time">Time To</label>
                          <input id="end_time" required="" class="form-control timepicker datetimepicker-input" data-target="#end_time" 
                          data-toggle="datetimepicker" autocomplete="off" inputmode="none" name="end_time" type="text" value="<?php echo $result[0]["end_time"]; ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="limit_registration">Registration Limit</label>
                          <input class="form-control" autocomplete="off" step="10" min="10" name="limit_registration" type="number"
                          value="<?php echo $result[0]["limit_registration"]; ?>">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="type" class="required_label">Category</label>
                          <select class="form-control" required="" id="category" name="category">
                            <?php
                            $sql = "SELECT * FROM category";
                            $conn = mysqli_connect('localhost', 'root', '', 'karma_db');
                            $res = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($res)) {
                              echo "<option value='$row[id]'>$row[name]</option>";
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="type">Organization</label>
                          <select class="form-control" required="" id="organization" name="organization">
                            <?php
                            $sql = "SELECT * FROM organization WHERE user_id = '".$_SESSION['uid']."' ";
                            $conn = mysqli_connect('localhost', 'root', '', 'karma_db');
                            $res = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($res)) {
                              echo "<option value='$row[id]'>$row[org_name]</option>";
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="points">Points</label>
                          <input class="form-control" autocomplete="off" step="5" min="0" name="points" type="number" required=""
                          value="<?php echo $result[0]["points"]; ?>">
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <input type="submit" class="btn btn-primary" name="add_event_o" id="btnSubmit" value="Submit">
                    <?php
                    if (isset($_POST['add_event_o'])) {  ?>
                      <script type="text/javascript">
                        window.location = "index.php?action=org-event-view&id=<?=$_SESSION['uid']?>";
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

  <!-- datetime-picker-->
  <script src="plugins/bootstrap-datetimepicker/js/moment.min.js"></script>
  <script src="plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script src="plugins/bootstrap-datetimepicker/js/datetimepicker_function.js"></script>

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
    $(function() {
      initDatepicker();
      //initDateTimepicker(); 
      initTimepicker();
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