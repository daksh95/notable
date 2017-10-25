<?php
    session_start();

    if(isset($_POST) && !empty($_POST['username']) && !empty($_POST['pswd'])) {
        
        $usr = $_POST['username'];
        $pwd = $_POST['pswd'];
        $sql = "SELECT password FROM accounts WHERE username = '".$usr."'";
        if(!($result = mysqli_query($conn,$sql))) {
            die("User does not exist.");
        }
        else {
            $pwd1 = mysqli_fetch_row($result)[0];
            if($pwd != $pwd1) {
                header("location: index.php?p=fail");
            }
            else {
                $_SESSION['user'] = $usr;
                $_SESSION['pwd'] = $pwd;

            }
        }
    }
    else if(session_id()=='' || !isset($_SESSION['user']) ||  !isset($_SESSION['pwd'])  )
    {
        header("location: errorpage.php");
    }
    else {
        $usr = $_SESSION['user'];
        $pwd = $_SESSION['pwd'];
    }
?>