<?php require '../includes/header.php';

$select_skills = "SELECT * FROM skills" ;
$select_skills_res = mysqli_query($connect, $select_skills);
$skills_assoc = mysqli_fetch_assoc($select_skills_res); 
?>


<form action="skills_post.php" method="POST">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <?php if(isset($_SESSION['name_success'])): ?>
                        <div class="alert alert-success"><?=$_SESSION['name_success']?></div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Skills Section Heading</h4>
                    </div>
                    <div class="card-body">
                        <label for="" class="form-label">Enter Your Skills Section Heading</label>
                        <input value="<?=$skills_assoc['name']?>" name="name" type="text" class="form-control mb-3">
                        <button value="1" name="btn" class="btn btn-primary d-block m-auto">Update</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
            <?php if(isset($_SESSION['skill_success'])): ?>
                        <div class="alert alert-success"><?=$_SESSION['skill_success']?></div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Add A Skill</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="" class="form-label">Enter Your Skill Title Here</label>
                            <input value="" name="title" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Enter Your Skill Rate Here</label>
                            <select name="rate" class="form-control">
                                <option selected>Open this select menu</option>
                            <?php for($i=1; $i < 100; $i++): ?>
                                <option value="<?=$i?>"><?=$i.'%'?></option>
                            <?php endfor; ?>
                            </select>
                        </div>
                        <button value="2" name="btn" class="btn btn-primary d-block m-auto">Add</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</form>
<?php if(isset($_SESSION['delete'])): ?>
    <div class="alert alert-success"><?=$_SESSION['delete']?></div>
<?php endif ?>
<table class="table table-striped mb-5">
        <tr>
            <th scope="col">SL</th>
            <th scope="col">Title</th>
            <th scope="col">Rate %</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        <?php $i = 1; foreach($select_skills_res as $skill):?>
            
            <tr>
                <td><?=$i++?></td>
                <td class="editable title"><?=$skill['skill_title']?></td>
                <td class="editable rate"><?=$skill['skill_rate']?></td>
                <td class=""><a href="change_status.php?id=<?=$skill['id']?>" class="badge badge-<?=$skill['status']==0?'danger':'primary'?>"><?=$skill['status']==0?'deactive':'active'?></a></td>
                <td>
                    <div class="d-flex">
                    <button value="<?=$skill['id']?>" class="btn btn-primary shadow btn-xs sharp mr-1 edit-row"><i class="fa fa-pencil"></i></button>
                        <a data-id="<?=$skill['id']?>" data-name="<?=$skill['skill_title']?>" class="delete btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>

</table>



<script src="script.js"></script>
<?php require '../includes/footer.php';
unset($_SESSION['name_success']);
unset($_SESSION['skill_success']);
unset($_SESSION['delete']);