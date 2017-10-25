<?php
    require 'dbconn.php';
    if(isset($_POST) && !empty($_POST['id']) && !empty($_POST['title'])) {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        // echo $id.'<br>'.$title.'<br>'.$content;
        $sql = "UPDATE notes SET title = '".$title."', content = '".$content."' WHERE id = ".$id;
        if(mysqli_query($conn,$sql)) {
            header("Location: profile.php");
        }
        else {
            die($sql);
        }
    }
    else {
        die("Server Error");
    }
?>