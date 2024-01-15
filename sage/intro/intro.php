<?php require '../includes/header.php';

$select_logo_text = "SELECT * FROM logos WHERE id=1" ;
$select_logo_res = mysqli_query($connect, $select_logo_text);
$logo_assoc = mysqli_fetch_assoc($select_logo_res); 

$intros = "SELECT * FROM intros WHERE id=1";
$intros_res = mysqli_query($connect,$intros);
$intros_res_assoc = mysqli_fetch_assoc($intros_res);
?>




    <form action="intro_post.php" method="POST" enctype="multipart/form-data">
       <div class="row">
            <div class="col-lg-4">
                <?php if(isset($_SESSION['intro_img_success'])): ?>
                        <div class="alert alert-success"><?=$_SESSION['intro_img_success']?></div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Intro Image</h4>
                    </div>
                    <div class="card-body">
                        <label for="" class="form-label">Choose Intro Image Here</label>
                        <input name="intro_img" type="file" class="form-control mb-3">
                        <strong class="text-danger"><?=$_SESSION['img_err']??''?></strong>
                        <button value="1" name="btn" class="btn btn-primary d-block m-auto">Update</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
            <?php if(isset($_SESSION['title_success'])): ?>
                        <div class="alert alert-success"><?=$_SESSION['title_success']?></div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Title</h4>
                    </div>
                    <div class="card-body">
                        <label for="" class="form-label">Enter Your Title Here</label>
                        <input value="<?=$intros_res_assoc['title']?>" name="title" type="text" class="form-control mb-3">
                        <button value="2" name="btn" class="btn btn-primary d-block m-auto">Update</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
            <?php if(isset($_SESSION['name_success'])): ?>
                        <div class="alert alert-success"><?=$_SESSION['name_success']?></div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Name</h4>
                    </div>
                    <div class="card-body">
                        <label for="" class="form-label">Enter Your Name Here</label>
                        <input value="<?=$intros_res_assoc['name']?>" name="name" type="text" class="form-control mb-3">
                        <button value="3" name="btn" class="btn btn-primary d-block m-auto">Update</button>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                <div class="col-lg-4">
                <?php if(isset($_SESSION['description_success'])): ?>
                        <div class="alert alert-success"><?=$_SESSION['description_success']?></div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Description</h4>
                    </div>
                    <div class="card-body">
                        <label for="" class="form-label">Enter Your Description Here</label>
                        <textarea class="form-control mb-3" name="description" id="" cols="10" rows="8"><?=$intros_res_assoc['description']?></textarea>
                        <button value="4" name="btn" class="btn btn-primary d-block m-auto">Update</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
            <?php if(isset($_SESSION['button_success'])): ?>
                        <div class="alert alert-success"><?=$_SESSION['button_success']?></div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header">
                        <h4>About Me Button</h4>
                    </div>
                    <div class="card-body">
                        <label for="" class="form-label">Enter Your Button Text Here</label>
                        <input value="<?=$intros_res_assoc['button']?>" name="button" type="text" class="form-control mb-3">
                        <button value="5" name="btn" class="btn btn-primary d-block m-auto">Update</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
            <?php if(isset($_SESSION['watermark_success'])): ?>
                        <div class="alert alert-success"><?=$_SESSION['watermark_success']?></div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Water Mark</h4>
                    </div>
                    <div class="card-body">
                        <label for="" class="form-label">Enter Your Water Mark Text Here</label>
                        <input value="<?=$intros_res_assoc['watermark']?>" name="watermark" type="text" class="form-control mb-3">
                        <button value="6" name="btn" class="btn btn-primary d-block m-auto">Update</button>
                    </div>
                </div>
            </div>
                </div>
            </div>
       </div>
    </form>












<?php require '../includes/footer.php' ;
unset($_SESSION['img_err']);
unset($_SESSION['intro_img_success']);
unset($_SESSION['title_success']);
unset($_SESSION['name_success']);
unset($_SESSION['description_success']);
unset($_SESSION['button_success']);
unset($_SESSION['watermark_success']);