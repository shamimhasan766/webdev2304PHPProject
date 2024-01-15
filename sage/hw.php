<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Validation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

    <style>
        .pass {
            position: relative;
        }

        .show {
            position: absolute;
            top: 50px;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .body {
            margin-bottom: 200px;
        }
    </style>
</head>

<body>

    <div class="body container mt-5">

        <strong class="text-success d-block m-auto text-center alert"><?= isset($_SESSION['success']) ? $_SESSION['success'] : '' ?></strong>
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h1>
                            Register
                        </h1>
                    </div>
                    <div class="card-body">

                        <form action="hw_index.php" method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">Your Name</label>
                                <input type="text" name="name" class="form-control" value="<?= isset($_SESSION['name_value']) ? $_SESSION['name_value'] : '' ?>">


                                <strong class="text-danger">
                                    <?= isset($_SESSION['name_eror']) ? $_SESSION['name_eror'] : '' ?>
                                </strong>

                                <?php unset($_SESSION['name_eror']) ?>

                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Your Email</label>
                                <input type="email" name="email" class="form-control" value="<?= isset($_SESSION['email_value']) ? $_SESSION['email_value'] : '' ?>">
                                <?php if (isset($_SESSION['email_eror'])) {  ?>

                                    <strong class="text-danger">
                                        <?= $_SESSION['email_eror'] ?>
                                    </strong>

                                <?php }
                                unset($_SESSION['email_eror']) ?>

                            </div>
                            <div class="mb-3 pass">
                                <label for="password" class="form-label">Your Password</label>
                                <input type="password" name="password" class="form-control" id="loginpass" value="<?= isset($_SESSION['password_value']) ? $_SESSION['password_value'] : '' ?>">
                                <?php if (isset($_SESSION['password_eror'])) {  ?>

                                    <strong class="text-danger">
                                        <?= $_SESSION['password_eror'] ?>
                                    </strong>

                                <?php }
                                unset($_SESSION['password_eror']) ?>

                                <i class="fa-solid fa-eye show"></i>
                            </div>

                            <?php
                            $con = '';
                            if (isset($_SESSION['country_value'])) {
                                $con = $_SESSION['country_value'];
                            } ?>

                            <div class="mb-3">
                                <select class="form-select" name="country" aria-label="Default select example">
                                    <option value="">Select Your Country</option>
                                    <option <?= ($con == 'Bangladesh' ? 'selected' : '') ?> value="Bangladesh">Bangladesh</option>
                                    <option <?= ($con == 'India' ? 'selected' : '') ?> value="India">India</option>
                                    <option <?= ($con == 'Pakistan' ? 'selected' : '') ?> value="Pakistan">Pakistan</option>
                                </select>
                                <?php if (isset($_SESSION['country_eror'])) {  ?>

                                    <strong class="text-danger">
                                        <?= $_SESSION['country_eror'] ?>
                                    </strong>

                                <?php }
                                unset($_SESSION['country_eror']) ?>

                            </div>

                            <?php
                            $gen = '';
                            if (isset($_SESSION['gender_value'])) {
                                $gen = $_SESSION['gender_value'];
                            } ?>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input <?= $gen == 'male' ? 'checked' : '' ?> class="form-check-input" type="radio" name="gender" id="gender1" value="male">
                                    <label class="form-check-label" for="gender1">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input <?= $gen == 'female' ? 'checked' : '' ?> class="form-check-input" type="radio" name="gender" id="gender2" value="female">
                                    <label class="form-check-label" for="gender2">
                                        Female
                                    </label>
                                </div>

                                <strong class="text-danger"><?= isset($_SESSION['gender_eror']) ? $_SESSION['gender_eror'] : '' ?></strong>



                            </div>


                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">About Yourself</label>
                                <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3"><?= isset($_SESSION['text_value']) ? $_SESSION['text_value'] : '' ?></textarea>

                                <strong class="text-danger"><?= isset($_SESSION['text_eror']) ? $_SESSION['text_eror'] : '' ?></strong>

                            </div>

                    </div>

                    <?php
                    if (isset($_SESSION['hobbies_val'])) {
                        $hobbies = $_SESSION['hobbies_val'];
                    }

                    ?>
                    <div class="mb-3 ms-5">
                        <h6>Select Your Hobbies</h6>
                        <div class="form-check">
                            <input <?php if (isset($hobbies) && in_array("dancing", $hobbies)) echo "checked"; ?> name="hobbies[]" class="form-check-input" type="checkbox" value="dancing" id="Dancing">
                            <label class="form-check-label" for="Dancing">Dancing</label>
                        </div>
                        <div class="form-check">
                            <input <?php if (isset($hobbies) && in_array("Writing", $hobbies)) echo "checked"; ?> name="hobbies[]" class="form-check-input" type="checkbox" value="Writing" id="Writing">
                            <label class="form-check-label" for="Writing">Writing</label>
                        </div>
                        <div class="form-check">
                            <input <?php if (isset($hobbies) && in_array("Traveling", $hobbies)) echo "checked"; ?> name="hobbies[]" class="form-check-input" type="checkbox" value="Traveling" id="Traveling">
                            <label class="form-check-label" for="Traveling">Traveling</label>
                        </div>
                        <div class="form-check">
                            <input <?php if (isset($hobbies) && in_array("Acting", $hobbies)) echo "checked"; ?> name="hobbies[]" class="form-check-input" type="checkbox" value="Acting" id="Acting">
                            <label class="form-check-label" for="Acting">Acting</label>
                        </div>
                        <div class="form-check">
                            <input <?php if (isset($hobbies) && in_array("Printing", $hobbies)) echo "checked"; ?> name="hobbies[]" class="form-check-input" type="checkbox" value="Printing" id="Printing">
                            <label class="form-check-label" for="Printing">Printing</label>
                        </div>
                        <div class="form-check">
                            <input <?php if (isset($hobbies) && in_array("Cooking", $hobbies)) echo "checked"; ?> name="hobbies[]" class="form-check-input" type="checkbox" value="Cooking" id="Cooking">
                            <label class="form-check-label" for="Cooking">Cooking</label>
                        </div>
                        <div class="form-check">
                            <input <?php if (isset($hobbies) && in_array("Singing", $hobbies)) echo "checked"; ?> name="hobbies[]" class="form-check-input" type="checkbox" value="Singing" id="Singing">
                            <label class="form-check-label" for="Singing">Singing</label>
                        </div>

                        <strong class="text-danger"><?= isset($_SESSION['hobbies_eror']) ? $_SESSION['hobbies_eror'] : '' ?></strong>

                    </div>
                </div>

                <button type="submit" class="btn btn-primary m-auto mt-3" style="display: block; font-size: 27px; width: 196px;">Register</button>
                </form>

                <p class="text-center mt-3">Have an account? <a style="text-decoration: none; color: #22ab59; font-size: 20px; " href="login.php">Login now</a>.</p>


            </div>
        </div>
    </div>
    </div>

    </div>





    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $('.show').click(function() {
            var passtype = document.querySelector('#loginpass');
            var show = document.querySelector('.show');

            if (passtype.type == 'password') {
                passtype.type = 'name';
                show.style.color = 'grey';
            } else {
                passtype.type = 'password';
                show.style.color = '';
            }
        });
    </script>
</body>

</html>

<?php
unset($_SESSION['name_value']);
unset($_SESSION['email_value']);
unset($_SESSION['password_value']);
unset($_SESSION['country_value']);
unset($_SESSION['gender_value']);
unset($_SESSION['text_value']);
unset($_SESSION['hobbies_val']);
unset($_SESSION['success']);
unset($_SESSION['gender_eror']);
unset($_SESSION['hobbies_eror']);
unset($_SESSION['text_eror']);
?>