<?php
require 'functions.php';
session_start();
if(isset($_SESSION["login"])){
    if($_SESSION["login"]){
        header("Location:index.php");
    }
}
if(isset($_POST['login'])){
    if(login($_POST)){
        scriptAlert("akun berhasil login");
        if (isset($_POST['rememberme'])) {
            $cookie = hash('gost', $_POST['username']);
            setcookie("key", $cookie, time() + 60);
            scriptAlert("cookie telah dibuat");
        }
        $_SESSION['login'] = true;
        header("Location: index.php");
    }
}
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>journal | Login</title>
 </head>
 <body>
     <form action="" method="post">
         <table border="1" cellspacing="0" cellpadding="">
             <tr>
                 <th>Login</th>
             </tr>
            <tr>
                <td>
                    <input type="text" placeholder="Username" name="username" id="username">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="password" name="password" id="password" placeholder="Password">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" name="rememberme" id="rememberme">
                </td>
            </tr>
            <tr>
                <td align="center"><button type="submit" name="login" id="login">Login!</button></td>
            </tr>
            <tr>
                <td>
                    <p>belum punya akun? 
                        <a href="signup.php">daftar sekarang</a>
                    </p>
                </td>
            </tr>
         </table>
     </form>
 </body>
 </html>