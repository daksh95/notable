<?php

require 'dbconn.php';
include 'session.php';

print_r($_GET);

if(isset($_GET) && !empty($_GET['shareid']) && !empty($_GET['shareuser'])) {
    $id = $_GET['shareid'];
    $user = $_GET['shareuser'];
    // print_r($_GET);
    if(isset($_GET['write'])) {
        $tablename = 'collab_write';
    }
    else {
        $tablename = 'collab_read';
    }
    $sql = "INSERT INTO $tablename VALUES('$id','$user')";
    // echo $sql;
    if(mysqli_query($conn,$sql)) {
        header("Location: profile.php");
    }
    else {
        echo "There was an error!";
    }

}

?>