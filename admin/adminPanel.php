<?php
require_once "../config/loader.php";

$showList=true;
$message="";

$q="SELECT * FROM tbl_contacts";
$hasLink=$conn->query($q);
$hasLink->execute();
$data=$hasLink->fetchAll(PDO::FETCH_OBJ);

//var_dump($data);

if(isset($_GET['messageID'])){
    $q="SELECT * FROM tbl_contacts WHERE id=?";
    $hasLink=$conn->prepare($q);
    $hasLink->bindValue(1,$_GET['messageID']);
    $hasLink->execute();
    $data=$hasLink->fetch(PDO::FETCH_OBJ);
    $message=$data->message;
    $showList=false;
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
<div class="container table-responsive py-5">
    <?php if(!$showList){ ?>
    <div class="message-body">
        <p><?= $message; ?></p>
        <hr>
        <a href="adminPanel.php" class="btn btn-danger">Back</a>
    </div>
    <?php }else{ ?>
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Mobile</th>
            <th scope="col">Email</th>
            <th scope="col">Operation</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data as $key=>$item): ?>
        <tr>
            <th scope="row"><?= ++$key ?></th>
            <td><?= $item->name ?></td>
            <td><?= $item->mobile ?></td>
            <td><?= $item->email ?></td>
            <td><a href="?messageID=<?= $item->id ?>" class="btn btn-primary">Show Message</a></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
   <?php } ?>
    <a href="../index.php" class="btn btn-success">Back to home</a>
</div>

</body>
</html>