<?php
    session_start();
    include 'connection.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = mysqli_query($connect, "SELECT * FROM petugas WHERE email = '$email'
    && password = '$password'") or die(mysqli_error($connect));

    $cek = mysqli_num_rows($query); // cek row pada database
    $row = mysqli_fetch_array($query);
    $username = $row['username'];
    if($cek == 1){
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['username'] = $username;
        header("location:session.php"); // menuju halaman session.php
    }else {
        header("location:login.php"); // menuju halaman login.php
    }
?>