<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="jbVZRkX5UgItTAiMSow2SrlI1xakpYHJNjZac5rP">
    <title>Karma</title>
    
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">

</head>

<body class="login-page">

    <div class="login-box">
        <div class="card">
            <div class="login-logo">
                <img src="dist/img/karma_logo.png" alt="Karma Logo">
            </div>
            <div class="card-body login-card-body">
                <p class="login-box-msg">
                    Sign in to start your session
                </p>
                <form name="login" method="POST" action="" id="login" onSubmit="return validate();">
                    <input type="hidden" name="_token" value="jbVZRkX5UgItTAiMSow2SrlI1xakpYHJNjZac5rP">
                    <div class="input-group mb-3">
                        <input type="email" name="email" id="email" class="form-control " value="" placeholder="Email" autofocus required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" id="password" class="form-control " placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-4">
                            <input type="submit" class="btn btn-primary btn-block btn-flat" name="login" id="btnSubmit" value="Sign In">
                        </div>
                    </div>
                    <div class="row justify-content-center p-3">
                        <p>Login as <a href="index.php?action=admin-login"> Administrator</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

    <script>
        $(document).ready(function() {
            $("form").submit(function() {
                if (!$(this).hasClass("submitted")) {
                    console.log('submiting ..')
                    $(this).addClass('submitted');
                    $(this).find('a').unbind("click").click(function(e) {
                        e.preventDefault();
                        return false;
                    });
                    $(this).find('input').attr('readonly', true);
                    $(this).find('select').attr('readonly', true);
                    $(this).find('textarea').attr('readonly', true);
                } else {
                    return false;
                }

            });
        });
    </script>
</body>

</html>