<?php require '../includes/header.php';
$user = "SELECT * FROM users";
$users = mysqli_query($connect, $user);
?>
<?php if($user_assoc['ROLE'] == "Super Admin" || $user_assoc['ROLE'] == "Moderator" ){  ?>
<div class="row">
   
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header"><h3>User List</h3></div>
            <div class="card-body">
            <?php if(isset($_SESSION['delete'])){  ?>
                <div class="alert alert-success"><?=$_SESSION['delete']?></div>
            <?php } ?>
            <table class="table table-striped">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NAME</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">COUNTRY</th>
                        <th scope="col">GENDER</th>
                        <th scope="col">ABOUT</th>
                        <th scope="col">HOBBIES</th>
                        <th scope="col">PHOTO</th> 
                        <?php if($user_assoc['ROLE'] == "Super Admin"){  ?>
                            <th scope="col">ROLE</th> 
                        <?php }?>
                        <th scope="col">ACTION</th>
                    </tr>
                <?php foreach($users as $user){ ?>
                    <tr>
                        <td><?=$user['ID']?></td>
                        <td class="editable name"><?=$user['NAME']?></td>
                        <td class="editable email"><?=$user['EMAIL']?></td>
                        <td class="editable country"><?=$user['COUNTRY']?></td>
                        <td class="editable gender"><?=$user['GENDER']?></td>
                        <td class="editable about"><?=$user['ABOUT']?></td>
                        <td class="editable hobbies"><?=$user['HOBBIES']?></td>
                        <td><img style="height: 60px; width: 60px; border-radius: 60px;" src="/class11/sage/uploads/users/<?=$user['PHOTO']?>" alt=""></td>
                        <?php if($user_assoc['ROLE'] == "Super Admin"){  ?>
                            <td class="editable select-column"><?=$user['ROLE']?></td>
                        <?php }?>
                        <td>
                            <div class="d-flex">
                                <?php if($user_assoc['ROLE'] == "Super Admin"){  ?>
                                <button value="<?=$user['ID']?>" class="btn btn-primary shadow btn-xs sharp mr-1 edit-row"><i class="fa fa-pencil"></i></button>
                                <a data-id="<?=$user['ID']?>" data-name="<?=$user['NAME']?>" class="delete btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                <?php }else if($user_assoc['ROLE'] == "Moderator"){  ?>
                                    <a href="#" class=" disabled btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                <a data-id="<?=$user['ID']?>" data-name="<?=$user['NAME']?>" class="delete disabled btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                <?php } ?>
                            </div>
                        </td>
                    </tr>
                <?php } ?>

            </table>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<script src="script.js"></script>
<?php
 require '../includes/footer.php'; 
unset($_SESSION['delete']);
?>
