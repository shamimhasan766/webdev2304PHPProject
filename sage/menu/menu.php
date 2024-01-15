<?php require '../includes/header.php';

$select_menu = "SELECT * FROM menu";
$select_menu_res = mysqli_query($connect, $select_menu);
$menu_assoc = mysqli_fetch_assoc($select_menu_res); 
?>


<div class="row">
    <div class="col-lg-8">
    <?php if(isset($_SESSION['delete'])): ?>
    <div class="alert alert-success"><?=$_SESSION['delete']?></div>
<?php endif ?>
<table class="table table-striped mb-5">
        <tr>
            <th scope="col">SL</th>
            <th scope="col">Menu</th>
            <th scope="col">Link</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        <?php $i = 1; foreach($select_menu_res as $menu):?>
            
            <tr>
                <td><?=$i++?></td>
                <td class="editable title"><?=$menu['menu']?></td>
                <td class="editable rate"><?=$menu['link']?></td>
                <td class=""><a href="change_status.php?id=<?=$menu['id']?>" class="badge badge-<?=$menu['status']==0?'danger':'primary'?>"><?=$menu['status']==0?'deactive':'active'?></a></td>
                <td>
                    <div class="d-flex">
                    <button value="<?=$menu['id']?>" class="btn btn-primary shadow btn-xs sharp mr-1 edit-row"><i class="fa fa-pencil"></i></button>
                        <a data-id="<?=$menu['id']?>" data-name="<?=$menu['menu']?>" class="deleteMenu btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>

</table>
    </div>
    <div class="col-lg-4">
        <form action="menu_post.php" method="POST">
            <?php if(isset($_SESSION['menu_success'])): ?>
                    <div class="alert alert-success"><?=$_SESSION['menu_success']?></div>
            <?php endif; ?>
            <div class="card">
                <div class="card-header">
                    <h4>Add A Menu</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Enter Menu Name Here</label>
                        <input value="<?=$_SESSION['menu_val']??''?>" type="text" class="form-control" name="name">
                        <strong class="text-danger mt-3"><?=$_SESSION['menu_err']??''?></strong>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Enter Menu Link Here</label>
                        <input placeholder="Optional" value="<?=$_SESSION['link_val']??''?>" type="text" class="form-control" name="link">
                        <label for="" class="form-label mt-2 ml-3 text-success">You can use #sectionId also</label>
                    </div>
                    <button value="" name="btn" class="btn btn-primary d-block m-auto">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>





<script src="script.js"></script>
<?php require '../includes/footer.php' ;

unset($_SESSION['menu_success']);
unset($_SESSION['menu_err']);
unset($_SESSION['link_err']);
unset($_SESSION['menu_val']);
unset($_SESSION['link_val']);