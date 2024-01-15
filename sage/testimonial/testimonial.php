<?php require '../includes/header.php';

$select_testimonial = "SELECT * FROM testimonial" ;
$select_testimonial_res = mysqli_query($connect, $select_testimonial);
$testimonial_assoc = mysqli_fetch_assoc($select_testimonial_res); 
?>


<form action="testimonial_post.php" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-4">
                <?php if(isset($_SESSION['heading_success'])): ?>
                        <div class="alert alert-success"><?=$_SESSION['heading_success']?></div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Testimonial Section Heading</h4>
                    </div>
                    <div class="card-body">
                        <label for="" class="form-label">Enter Your Testimonial Section Heading</label>
                        <input value="<?=$testimonial_assoc['heading']?>" name="heading" type="text" class="form-control mb-3">
                        <button value="1" name="btn" class="btn btn-primary d-block m-auto">Update</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <?php if(isset($_SESSION['testimonial_success'])): ?>
                        <div class="alert alert-success"><?=$_SESSION['testimonial_success']?></div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Add A Testimonial</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Enter The Comment Here</label>
                                    <textarea class="form-control" name="comment" id="" cols="30" rows="6"><?=$_SESSION['comment']??''?></textarea>
                                </div>
                            
                                <div class="mb-3">
                                        <label for="" class="form-label">Choose Client Image Here</label>
                                        <input value="" name="image" type="file" class="form-control">
                                        <strong class="text-danger"><?=$_SESSION['img_err']??''?></strong>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Enter The Client Name Here</label>
                                    <input value="<?=$_SESSION['name_val']??''?>" type="text" class="form-control" name="name">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Enter The Client Title Here</label>
                                    <input placeholder="" value="<?=$_SESSION['title_val']??''?>" type="text" class="form-control" name="title">
                                </div>
                            </div>
                        </div>
                        <strong class="text-danger"><?=$_SESSION['testimonial_err']??''?></strong>
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
            <th scope="col">Comment</th>
            <th scope="col">Name</th>
            <th scope="col">Title</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        <?php $i = 1; foreach($select_testimonial_res as $testimonial):?>
            
            <tr>
                <td><?=$i++?></td>
                <td><img height="60px" src="../uploads/testimonial/<?=$testimonial['image']?>" alt=""></td>
                <td class="editable comment"><?=$testimonial['comment']?></td>
                <td class="editable name"><?=$testimonial['name']?></td>
                <td class="editable title"><?=$testimonial['title']?></td>
                <td class=""><a href="change_status.php?id=<?=$testimonial['id']?>" class="badge badge-<?=$testimonial['status']==0?'danger':'primary'?>"><?=$testimonial['status']==0?'deactive':'active'?></a></td>
                <td>
                    <div class="d-flex">
                    <button value="<?=$testimonial['id']?>" class="btn btn-primary shadow btn-xs sharp mr-1 edit-row"><i class="fa fa-pencil"></i></button>
                        <a data-id="<?=$testimonial['id']?>" data-name="<?=$testimonial['name']?>" class="delete btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>

</table>



<script src="script.js"></script>
<?php require '../includes/footer.php';
unset($_SESSION['heading_success']);
unset($_SESSION['testimonial_success']);
unset($_SESSION['img_err']);
unset($_SESSION['testimonial_err']);
unset($_SESSION['comment']);
unset($_SESSION['name_val']);
unset($_SESSION['title_val']);
unset($_SESSION['delete']);