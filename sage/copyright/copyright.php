<?php require '../includes/header.php';

$select_copyright = "SELECT * FROM copyright WHERE id=1" ;
$select_copyright_res = mysqli_query($connect, $select_copyright);
$copyright = mysqli_fetch_assoc($select_copyright_res); 
?>



<form action="copyright_post.php" method="POST">
       <div class="row">
            <div class="col-lg-4">
                <?php if(isset($_SESSION['copyright_success'])): ?>
                        <div class="alert alert-success"><?=$_SESSION['copyright_success']?></div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header">
                        <h4> Copyright Text</h4>
                    </div>
                    <div class="card-body">
                        <label for="" class="form-label">Enter Copyright Text Here</label>
                        <input value="<?=$copyright['copyright']?>" name="copyright" type="text" class="form-control mb-3">
                        <strong class="text-danger"><?=$_SESSION['copyright_err']??''?></strong>
                        <button value="" name="btn" class="btn btn-primary d-block m-auto">Update</button>
                    </div>
                </div>
            </div>
       </div>
    </form>








<?php require '../includes/footer.php' ;

unset($_SESSION['copyright_success']);
unset($_SESSION['copyright_err']);