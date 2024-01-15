<?php require '../includes/header.php';

$select_services = "SELECT * FROM services" ;
$select_services_res = mysqli_query($connect, $select_services);
$services_assoc = mysqli_fetch_assoc($select_services_res); 
?>


<form action="services_post.php" method="POST">
        <div class="row">
            <div class="col-lg-4">
                <?php if(isset($_SESSION['name_success'])): ?>
                        <div class="alert alert-success"><?=$_SESSION['name_success']?></div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Services Section Heading</h4>
                    </div>
                    <div class="card-body">
                        <label for="" class="form-label">Enter Your Services Section Heading</label>
                        <input value="<?=$services_assoc['name']?>" name="name" type="text" class="form-control mb-3">
                        <button value="1" name="btn" class="btn btn-primary d-block m-auto">Update</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <?php if(isset($_SESSION['service_success'])): ?>
                        <div class="alert alert-success"><?=$_SESSION['service_success']?></div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Add A Service</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="" class="form-label">Enter Your Service Title Here</label>
                            <input value="<?=$_SESSION['title_val']??''?>" name="title" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Enter Your Service Description Here</label>
                            <textarea name="description" class="form-control" id="" cols="30" rows="8"><?=$_SESSION['des_val']??''?></textarea>
                        </div>
                        <strong class="text-danger"><?=$_SESSION['service_err']??''?></strong>
                        <button value="2" name="btn" class="btn btn-primary d-block m-auto">Add</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <?php if(isset($_SESSION['footer_update'])): ?>
                        <div class="alert alert-success"><?=$_SESSION['footer_update']?></div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Services Section Footer</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="" class="form-label">Enter Your Services Section Footer Intro</label>
                            <textarea class="form-control" name="footer_intro" id="" cols="30" rows="8"><?=$services_assoc['footer_intro']?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Enter Your Services Section Footer Button Text</label>
                            <input value="<?=$services_assoc['footer_button']?>" name="footer_button" type="text" class="form-control mb-3">
                        </div>
                        <button value="3" name="btn" class="btn btn-primary d-block m-auto">Update</button>
                    </div>
                </div>
            </div>

        </div>
</form>

<?php if(isset($_SESSION['delete'])): ?>
    <div class="alert alert-success"><?=$_SESSION['delete']?></div>
<?php endif ?>
<div class="card">
    <div class="card-header"><h3 class="text-center m-auto">All Services</h3></div>
    <div class="card-body">
        <table class="table table-striped mb-5">
                <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                <?php $i = 1; foreach($select_services_res as $service):?>
                    
                    <tr>
                        <td><?=$i++?></td>
                        <td class="editable title"><?=$service['service_title']?></td>
                        <td class="editable description"><?=$service['service_description']?></td>
                        <td class=""><a href="change_status.php?id=<?=$service['id']?>" class="badge badge-<?=$service['status']==0?'danger':'primary'?>"><?=$service['status']==0?'deactive':'active'?></a></td>
                        <td>
                            <div class="d-flex">
                                <button value="<?=$service['id']?>" class="btn btn-primary shadow btn-xs sharp mr-1 edit-row"><i class="fa fa-pencil"></i></button>
                                <a data-id="<?=$service['id']?>" data-name="<?=$service['service_title']?>" class="delete btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>

        </table>
    </div>
</div>






<script src="script.js"></script>
<?php require '../includes/footer.php';
unset($_SESSION['name_success']);
unset($_SESSION['service_success']);
unset($_SESSION['service_err']);
unset($_SESSION['title_val']);
unset($_SESSION['des_val']);
unset($_SESSION['delete']);
unset($_SESSION['footer_update']);