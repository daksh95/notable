<?php
    require "dbconn.php";
    if(isset($_POST) && !empty($_POST['username']) && !empty($_POST['pswd']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['mail']) && !empty($_POST['dob']) && !empty($_POST['gender'])) {
        $user = $_POST['username'];
        $pswd = $_POST['pswd'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $mail = $_POST['mail'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $sql = "INSERT INTO accounts VALUES('".$user."', '".$pswd."', '".$fname."', '".$lname."', '".$mail."', '".$dob."', '".$gender."')";
        if(mysqli_query($conn,$sql)) {
            header("location: /notable?p=registered");
        }
    }
    else {
        header("location: errorpage.php");
    }
?>