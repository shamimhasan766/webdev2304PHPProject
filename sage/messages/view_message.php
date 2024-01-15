<?php
$id = $_GET['id'];
require '../includes/db.php';
$update_view = "UPDATE messages SET status='1' WHERE id=$id";
mysqli_query($connect,$update_view);

require '../includes/header.php';


$select_messages = "SELECT * FROM messages WHERE id=$id";
$select_messages_res = mysqli_query($connect, $select_messages);
$message = mysqli_fetch_assoc($select_messages_res);



?>
<style>
        /* Reset styles for email compatibility */
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        /* Wrapper for email content */
        .email-wrapper {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        /* Form styles */
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        /* Input styles */
        .form-row {
            margin-bottom: 15px;
        }
        .form-row label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-row input[type="text"],
        .form-row textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-row textarea {
            height: 100px;
        }
        /* Submit button styles */
        .submit-btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .submit-btn:hover {
            background-color: #0056b3;
        }
</style>

<div class="col-lg-12">
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
        <div class="form-row">
            <label for="name">Name: </label>
            <h4 style="line-height: 26px;" class="ml-2 p-0"><?=$message['name']?></h4>
        </div>
        <div class="form-row">
            <label for="email">Email:</label>
            <h4 style="line-height: 26px;" class="ml-2 p-0"><?=$message['email']?></h4>
        </div>
        <div class="form-row">
            <label for="subject">Subject:</label>
            <h4 style="line-height: 26px;" class="ml-2 p-0"><?=$message['subject']?></h4>
        </div>
        <div class="form-row">
            <label for="message">Message:</label>
            <h4 style="line-height: 26px;" class="ml-2 p-0"><?=$message['message']?></h4>
        </div>

        </div>
    </div>
</div>
 






<?php require '../includes/footer.php';