<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"  />
    <link rel="stylesheet" href="style_login.css">

    <style>
        .pass{
            position: relative;
        }
        .show {
            position: absolute;
            top: 50px;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }
        .body{
            margin-bottom: 200px;
        }
    </style>
  </head>
  <body>

  <div id="particles-js"></div>
       <!-- stats - count particles --> 
 <!-- particles.js lib - https://github.com/VincentGarreau/particles.js --> 


    <!-- particles.js container --> 
    <div class="body container pt-5">
    <strong class="text-success d-block m-auto text-center alert"><?=isset($_SESSION['success'])?$_SESSION['success']:'' ?></strong>
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card">
                <div class="card-header">
                <h1>
                    Log in
                </h1>
                </div>
                <div class="card-body">

                    <form action="login_index.php" method="POST">

                        <div class="mb-3">
                            <label for="email" class="form-label">Your Email</label>
                            <input type="email" name="email" class="form-control" value="<?=isset($_SESSION['email_value'])?$_SESSION['email_value']:''?>">
                            <strong class="text-danger"><?=isset($_SESSION['email_eror'])?$_SESSION['email_eror']:''?></strong>
                        </div>
                        <div class="mb-3 pass">
                            <label for="password" class="form-label">Your Password</label>
                            <input type="password" name="password" class="form-control" id="loginpass" value="<?=isset($_SESSION['password_value'])?$_SESSION['password_value']:''?>">

                                <strong class="text-danger"><?=isset($_SESSION['password_eror'])?$_SESSION['password_eror']:''?></strong>

                              <i class="fa-solid fa-eye show"></i>
                        </div>
                        
                        </div>
                    
                        <button type="submit" class="btn btn-primary m-auto mt-3 mb-3" style="display: block; font-size: 27px; width: 196px;">Login</button>

                        <p class="text-center mt-3">Don't have an account? <a style="text-decoration: none; color: #22ab59; font-size: 20px; " href="hw.php">Sign Up</a>.</p>
                    </form>
                </div>

                
                

            </div>
        </div>
    </div>

</div>

    
    
    
    
    
    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> <!-- stats.js lib -->
    <script src="http://threejs.org/examples/js/libs/stats.min.js"></script>



    <script src="script_login.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  </body>
</html>
<script>

$('.show').click(function(){
    var passtype =document.querySelector('#loginpass');
    var show =document.querySelector('.show');

    if(passtype.type == 'password'){
        passtype.type = 'name';
        show.style.color = 'grey';
    }
    else{
        passtype.type = 'password';
        show.style.color = '';
    }
});
</script>

<?php
    unset($_SESSION['password_value']);
    unset($_SESSION['email_value']);
    unset($_SESSION['email_eror']);
    unset($_SESSION['password_eror']);

?>

<?php if(isset($_SESSION['logout_message'])){  ?>
<script>
    const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
Toast.fire({
  icon: "success",
  title: "Signed Out Successfully"
});
</script>
<?php }
unset($_SESSION['logout_message']);
?>

