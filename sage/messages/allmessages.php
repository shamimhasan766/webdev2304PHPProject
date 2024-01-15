<?php require '../includes/header.php';

$select_messages = "SELECT * FROM messages ORDER BY id desc" ;
$select_messages_res = mysqli_query($connect, $select_messages);
?>



<div class="card">
    <div class="card_header py-3"><h1 class="text-center text-bold">All Messages</h1></div>
    <div class="card_body">
    <?php if(isset($_SESSION['delete'])): ?>
    <div class="alert alert-success"><?=$_SESSION['delete']?></div>
        <?php endif ?>
        <table class="table table-striped mb-5">
                <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Message</th>
                    <th style="padding-left: 42px;" scope="col">Action</th>
                </tr>
                <?php $i = 1; foreach($select_messages_res as $message):?>
                    
                    <tr style="<?=$message['status']==0?'background: #6d9b8a; color:white;':''?>">
                        <td><?=$i++?></td>
                        <td class="editable name"><?=$message['name']?></td>
                        <td class="editable email"><?=$message['email']?></td>
                        <td class="editable subject"><?=$message['subject']?></td>
                        <td class="editable message"><?=strlen($message['message'])>50?substr($message['message'], 0,50)."...":$message['message']?></td>
                        <td>
                            <div class="d-flex">
                                <a href="view_message.php?section=View Message&id=<?=$message['id']?>" class="btn btn-primary">View</a>
                                <a style="margin:15px 0px 0px 10px;" data-name="<?=$message['name']?>" data-id="<?=$message['id']?>" class="delete btn btn-danger shadow btn-xs sharp delete"><i class="fa fa-trash"></i></a>
                            </div>
                        </td>
                        
                    </tr>
                <?php endforeach; ?>

        </table>
    </div>
</div>

<script src="script.js"></script>

<?php require '../includes/footer.php';
unset($_SESSION['delete']);