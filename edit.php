<?php 
require 'functions.php';
//menekan tombol cancel
if(isset($_POST['cancel'])){
    header('Location:index.php');
}
$id = $_GET["id"];
$journal = query("SELECT * FROM journals WHERE id = '$id'");
$journal = $journal[0];
if(isset($_POST['edit'])){
    var_dump(edit($_POST));
    header('Location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journal | Edit</title>
</head>
<body>
    <h1>
        Edit Journal
    </h1>
    <form action="" method="POST">
    <table border="1" cellspacing="0" cellpadding="">
        <tr>
            <td>
                <input type="text" placeholder="title"name="title" id="title"width="100px" value="<?= $journal['title'] ?>">
                <input type="hidden" name="id" value="<?= $journal['id'] ?>">
            </td>
        </tr>
        <tr>
            <td>
                <textarea name="content" id="" cols="30" rows="10" placeholder="<?= $journal['content'] ?>"><?= $journal['content'] ?></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <button type="submit" name="edit" id="edit">Edit</button>
            </td>
        </tr>
    </table>
</form>
<form action="" method="post">
    <button type="submit" name="cancel" name="cancel" id="cancel">Go Back</button>
</form>
</body>
</html>