<?php require '../includes/header.php';

$select_portfolios = "SELECT * FROM portfolios" ;
$select_portfolios_res = mysqli_query($connect, $select_portfolios);
$portfolios_assoc = mysqli_fetch_assoc($select_portfolios_res); 
?>


<form action="portfolios_post.php" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-4">
                <?php if(isset($_SESSION['heading_success'])): ?>
                        <div class="alert alert-success"><?=$_SESSION['heading_success']?></div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Works Section Heading</h4>
                    </div>
                    <div class="card-body">
                        <label for="" class="form-label">Enter Your Works Section Heading</label>
                        <input value="<?=$portfolios_assoc['heading']?>" name="heading" type="text" class="form-control mb-3">
                        <button value="1" name="btn" class="btn btn-primary d-block m-auto">Update</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <?php if(isset($_SESSION['portfolio_success'])): ?>
                        <div class="alert alert-success"><?=$_SESSION['portfolio_success']?></div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Add An work</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Enter Your Work Image Here</label>
                                    <input value="<?=$_SESSION['img_val']??''?>" name="image" type="file" class="form-control">
                                    <strong class="text-danger"><?=$_SESSION['img_err']??''?></strong>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Enter Your Work Name Here</label>
                                    <input value="<?=$_SESSION['name_val']??''?>" name="name" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Enter Your Work Title</label>
                                    <input value="<?=$_SESSION['title_val']??''?>" type="text" class="form-control" name="title">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Enter Your Work Link</label>
                                    <input placeholder="Optional" value="<?=$_SESSION['link_val']??''?>" type="text" class="form-control" name="link">
                                </div>
                            </div>
                        </div>
                        <strong class="text-danger"><?=$_SESSION['portfolio_err']??''?></strong>
                        <button value="2" name="btn" class="btn btn-primary d-block m-auto">Add</button>
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
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Title</th>
            <th scope="col">Link</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        <?php $i = 1; foreach($select_portfolios_res as $portfolio):?>
            
            <tr>
                <td><?=$i++?></td>
                <td><img height="60px" src="../uploads/portfolios/<?=$portfolio['image']?>" alt=""></td>
                <td class="editable name"><?=$portfolio['name']?></td>
                <td class="editable title"><?=$portfolio['title']?></td>
                <td class="editable link"><?=$portfolio['link']?></td>
                <td class=""><a href="change_status.php?id=<?=$portfolio['id']?>" class="badge badge-<?=$portfolio['status']==0?'danger':'primary'?>"><?=$portfolio['status']==0?'deactive':'active'?></a></td>
                <td>
                    <div class="d-flex">
                    <button value="<?=$portfolio['id']?>" data-id="<?=$portfolio['id']?>" class="btn btn-primary shadow btn-xs sharp mr-1 edit-row"><i class="fa fa-pencil"></i></button>
                        <a data-id="<?=$portfolio['id']?>" class="delete btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>

</table>


<script src="script.js"></script>
<?php require '../includes/footer.php';
unset($_SESSION['heading_success']);
unset($_SESSION['name_val']);
unset($_SESSION['title_val']);
unset($_SESSION['img_err']);
unset($_SESSION['portfolio_err']);
unset($_SESSION['portfolio_success']);
unset($_SESSION['delete']);