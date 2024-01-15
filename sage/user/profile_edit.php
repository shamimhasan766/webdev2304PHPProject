<?php require '../includes/header.php'; ?>

<div class="row">
    <div class="col-lg-4">
    <?php if(isset($_SESSION['update_success'])){ ?>
            <div class="alert alert-success"><?=$_SESSION['update_success']?></div>
            <?php  } ?>
        <div class="card">
            <div class="card-header"><h3 class="text-center">Profile Update</h3></div>
            <div class="card-body">
                <form action="profile_update.php" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label" >Name</label>
                        <input type="text" name="name" class="form-control" id="" value="<?=$user_assoc['NAME']?>" >
                    </div>

                    <div class="mb-4">
                         <select class="form-select form-control" name="country" aria-label="Default select example">
                                <option value="">Select Your Country</option>
                                <option <?=($user_assoc['COUNTRY']=='Bangladesh'?'selected':'')?> value="Bangladesh">Bangladesh</option>
                                <option <?=($user_assoc['COUNTRY']=='India'?'selected':'')?> value="India">India</option>
                                <option <?=($user_assoc['COUNTRY']=='Pakistan'?'selected':'')?> value="Pakistan">Pakistan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="">Select Your Gender</label>
                        <div class="form-check">
                            <input <?=$user_assoc['GENDER']=='male'?'checked':''?> class="form-check-input" type="radio" name="gender" id="gender1" value="male">
                            <label class="form-check-label" for="gender1"> Male</label>
                        </div>
                            <div class="form-check">
                            <input <?=$user_assoc['GENDER']=='female'?'checked':''?> class="form-check-input" type="radio" name="gender" id="gender2" value="female">
                            <label class="form-check-label" for="gender2">Female</label>
                        </div>
                    </div>

                    <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">About Yourself</label>
                            <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3"><?=$user_assoc['ABOUT']?></textarea>
                    </div>

                    <?php 
                        $array_hobbies = explode(",",$user_assoc['HOBBIES'])
                    ?>
                    <div class="mb-5 ms-5">
                        <h6>Select Your Hobbies</h6>
                        <div class="form-check">
                            <input <?php if (in_array("dancing", $array_hobbies)) echo "checked"; ?> name="hobbies[]" class="form-check-input" type="checkbox" value="dancing" id="Dancing">
                            <label class="form-check-label" for="Dancing">Dancing</label>
                        </div>
                        <div class="form-check">
                            <input <?php if (in_array("Writing", $array_hobbies)) echo "checked"; ?> name="hobbies[]" class="form-check-input" type="checkbox" value="Writing" id="Writing">
                            <label class="form-check-label" for="Writing">Writing</label>
                        </div>
                        <div class="form-check">
                            <input <?php if (in_array("Traveling", $array_hobbies)) echo "checked"; ?> name="hobbies[]" class="form-check-input" type="checkbox" value="Traveling" id="Traveling">
                            <label class="form-check-label" for="Traveling">Traveling</label>
                        </div>
                        <div class="form-check">
                            <input <?php if (in_array("Acting", $array_hobbies)) echo "checked"; ?> name="hobbies[]" class="form-check-input" type="checkbox" value="Acting" id="Acting">
                            <label class="form-check-label" for="Acting">Acting</label>
                        </div>
                        <div class="form-check">
                            <input <?php if (in_array("Printing", $array_hobbies)) echo "checked"; ?> name="hobbies[]" class="form-check-input" type="checkbox" value="Printing" id="Printing">
                            <label class="form-check-label" for="Printing">Printing</label>
                        </div>
                        <div class="form-check">
                            <input <?php if (in_array("Cooking", $array_hobbies)) echo "checked"; ?> name="hobbies[]" class="form-check-input" type="checkbox" value="Cooking" id="Cooking">
                            <label class="form-check-label" for="Cooking">Cooking</label>
                        </div>
                        <div class="form-check">
                            <input <?php if (in_array("Singing", $array_hobbies)) echo "checked"; ?> name="hobbies[]" class="form-check-input" type="checkbox" value="Singing" id="Singing">
                            <label class="form-check-label" for="Singing">Singing</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary m-auto mt-5" style="display: block; font-size: 20px; width: 150px;">Update</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
    <?php if(isset($_SESSION['password_success'])){ ?>
            <div class="alert alert-success"><?=$_SESSION['password_success']?></div>
            <?php  } ?>
        <div class="card">
            <div class="card-header"><h3>Update Password</h3></div>
            <div class="card-body">
            <form action="password_update.php" method="post">
                <div class="mb-3">
                    <label for="" class="form-label" >Current Password</label>
                    <input type="Password" name="current_password" class="form-control" id="" value="<?=$_SESSION['wrong_password_val']??''?>" >
                    <strong class="text-danger" ><?=$_SESSION['wrong_password']??''?></strong>
                </div>
                
                <div class="mb-3">
                    <label for="" class="form-label" >New Password</label>
                    <input type="Password" name="new_password" class="form-control" id="" value="<?=$_SESSION['new_password_val']??''?>" >
                </div>
                <div class="mb-3">
                    <label for="" class="form-label" >Confirm Password</label>
                    <input type="Password" name="confirm_password" class="form-control" id="" value="<?=$_SESSION['confirm_password_val']??''?>" >
                </div>
                <strong class="text-danger" ><?=$_SESSION['wrong_new_password']??''?></strong>
                <button type="submit" class="btn btn-primary m-auto mt-5" style="display: block; font-size: 20px; width: 150px;">Update</button>
            </form>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
    <?php if(isset($_SESSION['pc_success'])){ ?>
            <div class="alert alert-success"><?=$_SESSION['pc_success']?></div>
            <?php  } ?>
        <div class="card">
            <div class="card-header"><h3>Update Profile Picture</h3></div>
            <div class="card-body">
                <div class="mb-3">
                    <img src="/class11/sage/uploads/users/<?=$user_assoc['PHOTO']?>" alt="" height="250px" class="pp-img" >
                </div>
                <form action="photo_update.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                    <input class="" type="file" name="profile_picture" id="profile_picture" accept="image/*">
                    </div>
                    <strong class="text-danger" ><?=$_SESSION['pc_err']??''?></strong>
                    <button type="submit" class="btn btn-primary m-auto mt-5" style="display: block; font-size: 20px; width: 150px;">Update</button>
                </form>
                
            </div>
        </div>
    </div>

</div>

<?php require '../includes/footer.php';
unset($_SESSION['update_success']);
unset($_SESSION['password_success']);
unset($_SESSION['wrong_password']);
unset($_SESSION['wrong_new_password']);
unset($_SESSION['wrong_password_val']);
unset($_SESSION['confirm_password_val']);
unset($_SESSION['new_password_val']);
unset($_SESSION['pc_err']);
unset($_SESSION['pc_success']);
?>