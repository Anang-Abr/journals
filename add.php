<?php 
require 'functions.php';
//menekan tombol cancel
if(isset($_POST['cancel'])){
    header('Location:index.php');
}
if(isset($_POST['add'])){
    var_dump($_POST);
    echo '<br><br>';
    var_dump(add($_POST));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journal | Add</title>
</head>
<body>
    <h1>
        Add Journal
    </h1>
    <form action="" method="POST">
    <table border="1" cellspacing="0" cellpadding="">
        <tr>
            <td>
                <input type="text" placeholder="title"name="title" id="title"width="100px">
            </td>
        </tr>
        <tr>
            <td>
                <textarea name="content" id="" cols="30" rows="10" placeholder="Write something here..."></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <button type="submit" name="add" id="add">Add</button>
            </td>
        </tr>
    </table>
</form>
<form action="" method="post">
    <button type="submit" name="cancel" name="cancel" id="cancel">&laquoGo back</button>
</form>
</body>
</html>