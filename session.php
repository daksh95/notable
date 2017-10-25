<?php
    require 'dbconn.php';
    session_start();
    if(!isset($_SESSION['user'])) {
        header("location: /notable/");
    }   
    $user_check = $_SESSION['user'];
    $ses_sql = mysqli_query($conn,"SELECT username FROM accounts WHERE username = '".$user_check."'");
    $row = mysqli_fetch_array($ses_sql);
    $login_session = $row['username'];
    // echo $login_session;

?>