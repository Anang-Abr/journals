<?php
    require 'functions.php';
    session_start();
    if(isset($_COOKIE['key'])){
        if(!check_cookie($_COOKIE['key'])){
            scriptAlert('hehe coba nge hack ya bro...');
            die;
            header('location:login.php');
            exit;
        }
        $_SESSION['login'] = true;
    }
    if (!$_SESSION['login']) {
        header('Location:login.php');
        exit;
    }
    $table = query("SELECT * FROM journals");
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journal | Home</title>
</head>
<body>
    <h1>Journaling</h1>
    <a href="add.php">Add+</a>
    <a href="logout.php" onClick="return confirm('Are you sure you want to log out?')">log out</a>
    <table border="1" cellspacing="0" cellpadding="">
        <tr>
            <th>No.</th>
            <th>Title</th>
            <th>Content</th>
            <th>Action</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($table as $row): ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $row['title'] ?></td>
                <td><?= $row['content'] ?></td>
                <td>
                    <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this')">Delete</a>|
                    <a href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach ?>
    </table>
</body>
</html>