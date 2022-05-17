<?php
    $conn = mysqli_connect('localhost', 'root', '', 'journals');

    function scriptAlert($message)
    {
        echo "<script> alert('$message')</script>";
    }

    function query($query){
        global $conn;
        $table = mysqli_query($conn, $query);
        $res =[];
        while ($row = mysqli_fetch_assoc($table)){
            $res[] = $row;
        }
        return $res;
    }

    function add($data){
        global $conn;
        $title = htmlspecialchars(stripslashes($data['title']));
        $content = mysqli_escape_string($conn, $data['content']);
        $query = "INSERT INTO journals VALUE('', '$title', '$content')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function delete($data)
    {
        global $conn;
        $id = $data['id'];
        $query = "DELETE FROM journals WHERE id = '$id'";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function edit($data)
    {   
        global $conn;
        $id = $data['id'];
        $title = htmlspecialchars(stripslashes($data['title']));
        $content = mysqli_escape_string($conn, $data['content']);
        $query = "UPDATE journals 
        SET title = '$title', content = '$content'
        WHERE id = '$id'";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function signup($data)
    {   
        global $conn;
        $username = htmlspecialchars(mysqli_escape_string($conn, $data['username']));
        $password1 = $data['password1'];
        $password2 = $data['password2'];
        if ($password1 !== $password2){
            scriptAlert('Konfirmasi password salah');
            return false;
        }
        $dataCheck = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
        $dataCheck = $dataCheck->num_rows;
        if($dataCheck){
            scriptAlert('Username yang dimasukkan telah digunakan');
            return false;
        }
        $password1 = password_hash($password1, PASSWORD_DEFAULT);
        $cookie = hash('gost',$username);
        $query = "INSERT INTO users VALUE(
            '', '$username', '$password1', '$cookie'
            )";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function login($data)
    {   
        global $conn;
        $username = $data['username'];
        $password = $data['password'];
        $query = "SELECT * FROM users WHERE username = '$username'";
        $acc = mysqli_query($conn, $query);
        if(!$acc->num_rows){
            echo '<br>akun tidak ditemukan';
            return false;
        }
        $acc = mysqli_fetch_assoc($acc);
        echo '<br>';
        if(!password_verify($password, $acc['password'])){
            echo '<br> password salah';
            return false;
        }
        return true;
    }

    function check_cookie($key)
    {   
        global $conn;
        $query = "SELECT * FROM users WHERE cookie = '$key'";
        $data = mysqli_query($conn, $query);
        return $data->num_rows;
    }
?>