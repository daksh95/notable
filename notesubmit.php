<?php
    require 'dbconn.php';
    require 'session.php';
    if(isset($_POST) && !empty($_POST['id']) && !empty($_POST['title'])) {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        if($_POST['id'] == 'new') {
            $sql = "SELECT count(*) FROM notes";
            if($result = mysqli_query($conn, $sql)) {
                $id = mysqli_fetch_row($result)[0] + 1;
            }
            $sql = "INSERT INTO notes VALUES(".$id.",'".$login_session."','".$title."','".$content."')";
        }
        else {
            // echo $id.'<br>'.$title.'<br>'.$content;
            $sql = "UPDATE notes SET title = '".$title."', content = '".$content."' WHERE id = ".$id;
        }
        if(mysqli_query($conn,$sql)) {
            header("Location: profile.php");
        }
    }
    else {
        die("Server Error");
    }
?>