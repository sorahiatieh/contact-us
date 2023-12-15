<?php
require_once "config/loader.php";

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $mobile=$_POST['mobile'];
    $email=$_POST['email'];
    $message=$_POST['message'];


    $q="INSERT INTO tbl_contacts SET name=? , mobile=? , email=? , message=?";
    $result=$conn->prepare($q);
    $result->bindValue(1,$name);
    $result->bindValue(2,$mobile);
    $result->bindValue(3,$email);
    $result->bindValue(4, $message);
    $result->execute();

    if($result) {
        echo '<p class="alert alert-success">The form has been submitted</p>';
    } else echo '<p class="alert alert-danger">The form was not submitted</p>';
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Contact Us</title>
</head>
<body>
<h2 class="title">Contact Us Form</h2>
<hr>
<form id="shorten-form" method="post">
    <input type="text" name="name" id="shorten-input" class="form-control" placeholder="Name" required>
    <input type="text" name="mobile" id="shorten-input" class="form-control" maxlength="11" placeholder="Mobile" required>
    <input type="text" name="email" id="shorten-input" class="form-control" placeholder="Email" required>
    <textarea type="text" name="message" id="shorten-input" class="form-control" placeholder="Message" required></textarea>
    <button type="submit" name="submit" id="shorten-button">Send</button>
</form>

<div id="shorten-result"></div>

<a href="admin/adminPanel.php" class="btn btn-success">admin panel</a>
</body>
</html>