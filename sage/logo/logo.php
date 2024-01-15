<?php require '../includes/header.php';

$select_logo_text = "SELECT * FROM logos WHERE id=1" ;
$select_logo_res = mysqli_query($connect, $select_logo_text);
$logo_assoc = mysqli_fetch_assoc($select_logo_res); 
?>

<section id="features">
          <div class="container text-center">

            <div class="row">

              <div class="col-lg-3 margin-left">
                
                <div class="d-flex align-items-start logo-options">
                  <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="navclick <?=isset($_SESSION['active'])?'':'active'?> btn-logo btn-primary mb-3" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
                     Image Logo 
                    </button>


                    <button class="navclick btn-logo btn-primary mb-3 <?=$_SESSION['active']??''?>" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="true">
                        Text Logo
                    </button>
                  </div>

                </div>

              </div>
              <div class="col-lg-9">

                  <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show <?=isset($_SESSION['active'])?'':'active'?>" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0" >
                      
                        <form method="post" action="logo_update.php" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <?php if(isset($_SESSION['header_logo_success'])){ ?>
                                            <div class="alert alert-success"><?=$_SESSION['header_logo_success']?></div>
                                        <?php } ?>
                                        <div class="card-header">Update Header Logo</div>
                                        <div class="card-body">
                                            <div class="mb-2">
                                                <img id="blah" src="../uploads/logo/header_logo.png" alt="" width="150px">
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Choose File</label>
                                                <input type="file" class="d-block form-control" name="header_logo" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                                <strong class="text-danger"><?=$_SESSION['logo_err']??''?></strong>
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" name="btn" value="1" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <?php if(isset($_SESSION['footer_logo_success'])){ ?>
                                            <div class="alert alert-success"><?=$_SESSION['footer_logo_success']?></div>
                                        <?php } ?>
                                        <div class="card-header">Update Footer Logo</div>
                                        <div class="card-body">
                                            <div class="mb-2">
                                                <img id="blah2" src="../uploads/logo/footer_logo.png" alt="" width="150px">
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Choose File</label>
                                                <input type="file" class="d-block form-control" name="footer_logo" onchange="document.getElementById('blah2').src = window.URL.createObjectURL(this.files[0])">
                                                <strong class="text-danger"><?=$_SESSION['logo_err_footer']??''?></strong>
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" name="btn" value="2" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                    
                      
                    </div>
                    <div class="tab-pane fade show <?=$_SESSION['active']??''?>" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0" >
                      
                    
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <?php if(isset($_SESSION['header_text_logo_success'])){ ?>
                                            <div class="alert alert-success"><?=$_SESSION['header_text_logo_success']?></div>
                                        <?php } ?>
                                        <div class="card-header">Update Header Logo</div>
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Enter Header Text Logo</label>
                                                <input style="font-size: 25px;" value="<?=$logo_assoc['header_text']??''?>" type="text" class="d-block form-control" name="header_logo_text">
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" name="btn" value="3" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <?php if(isset($_SESSION['footer_text_logo_success'])){ ?>
                                            <div class="alert alert-success"><?=$_SESSION['footer_text_logo_success']?></div>
                                        <?php } ?>
                                        <div class="card-header">Update Footer Logo</div>
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Enter Footer Text Logo</label>
                                                <input style="font-size: 25px;" type="text" value="<?=$logo_assoc['footer_text']??''?>" class="d-block form-control" name="footer_logo_text">
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" name="btn" value="4" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                        </form>
                      
                    </div>
                    


                  </div>
                </div>

              
            </div>

            

          </div>
 </section>

<style>
    .btn-logo{
        margin-bottom: 10px;
        width: 200px;
        border-radius: 15px;
        height: 60px;
    }
    .btn-logo1{
        margin-bottom: 10px;
        width: 200px;
    }
    .btn-primary:not(:disabled):not(.disabled):active, .btn-primary:not(:disabled):not(.disabled).active, .show > .btn-primary.dropdown-toggle {
    color: #fff;
    background-color: #7b0303;
    border-color: #07195c;
    transition: all linear 0.4s;
    }
    .logo-options{
        margin-top: 38%;
    }
    .container{
        margin-left: 0px !important;
    }
</style>
<?php require '../includes/footer.php' ;
unset($_SESSION['logo_err']);
unset($_SESSION['logo_err_footer']);
unset($_SESSION['header_logo_success']);
unset($_SESSION['header_text_logo_success']);
unset($_SESSION['footer_text_logo_success']);
unset($_SESSION['footer_logo_success']);
unset($_SESSION['active']);
?>

<script>
    $('.single-item-rtl').slick({
  rtl: true
});
</script>