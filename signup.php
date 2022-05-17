<?php
require 'functions.php';
if(isset($_POST['signup'])){
    if(signup($_POST)){
        scriptAlert("akun berhasil dibuat");
        header("Location: login.php");
    }
}
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>journal | Sign Up</title>
 </head>
 <body>
     <form action="" method="post">
         <table border="1" cellspacing="0" cellpadding="">
             <tr>
                 <th>Sign Up</th>
             </tr>
            <tr>
                <td>
                    <input type="text" placeholder="Username" name="username" id="username">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="password" name="password1" id="password1" placeholder="Password">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="password" name="password2" id="password2" placeholder="Confirm Password">
                </td>
            </tr>
            <tr>
                <td align="center"><button type="submit" name="signup" id="signup">Sign Up!</button></td>
            </tr>
            <tr>
                <td>
                    <p>sudah punya akun? 
                        <a href="login.php">login sekarang</a>
                    </p>
                </td>
            </tr>
         </table>
     </form>
 </body>
 </html>