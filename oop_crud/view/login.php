<?php
include '../controller/Auth.php';

$ctrl = new Auth();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login </title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    </head>
    <body style="background:#FFEBCC;">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                <br/><br/>
                <div id="logout">
                    <?php if(isset($_GET['signout'])){?>
                        <div class="alert alert-success">
                            <small>Anda Berhasil Logout...</small>
                        </div>
                    <?php }?>
                </div>
                <div id="notifikasi">
                    <div class="alert alert-danger">
                        <small>Login Anda Gagal, Periksa Kembali Username dan Password</small>
                    </div>
                </div>
                <div class="card">

                    <div class="card-header">
                        <h4 class="card-title"><center>LOGIN</center></h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo $ctrl->Login(); ?>" id="formlogin">
                        <div class="form-group">
                            <label>Username</label>
                            <input name="user" class="form-control" placeholder="username" type="text" required="required" autocomplete="off">
                        </div> 
                        <div class="form-group">
                            <label>Password</label>
                            <input name="pass" class="form-control" placeholder="******" type="password" required="required" autocomplete="off">
                        </div> 
                        <div class="form-group">
                            <button type="submit" name="login" class="btn btn-secondary btn-block"> Login  </button>
                        </div>                                                        
                    </form>
                        <div class="form-group">
                            <a href="index.php"> Kembali ke Home  </a>
                        </div> 
                </div>
            </div>
            <div class="col-sm-4">
            </div>
        </div> 
    </div>
    <script>
      // notifikasi gagal di hide
      <?php if(empty($_GET['get'])){?>
        $("#notifikasi").hide();
      <?php }?>
        var logingagal = function(){
            $("#logout").fadeOut('slow');
            $("#notifikasi").fadeOut('slow');
        };
        setTimeout(logingagal, 4000);
    </script> 
    </body>
</html>