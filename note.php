<?php 

    require 'dbconn.php';
    include 'session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Note - Notably</title>
    <script src="js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="summernote/dist/summernote.js"></script>
    <link rel="stylesheet" href="summernote/dist/summernote.css">
    <link rel="stylesheet" type="text/css" href="css/note.css">
</head>
<header>
    <i class="fui-list"></i>
    <a href="" id="logolink"><img id = "logo" src="images/Logo.png"></a>
    <nav>
        <ul>
            <li><a href="profile.php">My Notes</a></li>
            <li><a href="logout.php"><img id="profile" src="images/placeholder.png"></a></li>
        </ul>
</header>
<body>
    <?php
        if(isset($_GET) && !empty($_GET['id'])) {
            if($_GET['id'] != 'new') {
                $id = $_GET['id'];
                $sql = "SELECT title, content FROM notes WHERE id = ".$id;
                if($result = mysqli_query($conn, $sql)) {
                    $note = mysqli_fetch_row($result);
                    $title = $note[0];
                    $content = $note[1];
                }                
            }
            else {
                $id = 'new';
                $title = "";
                $content = "";
            }
        }
        ?>
        <?php
        echo "<div id = 'container'>
        <form id='noteForm' action='notesubmit.php' method='POST' onsubmit='return submitNote();'>
            <input type='hidden' name='id' value='".$id."'>
            <input type='text' name='title' id='title' placeholder='Title Your Note' value='".$title."'>
            <input type='hidden' id='hidden' name='content'>
            <div id='summernote'></div>
            <script>$('#summernote').summernote('code','".$content."');</script>
                <div id = 'buttons'>
                    <button class='notebutton' type='submit'>Save</button>
                </div>
            </form>"
    ?>    
    <script>
        function submitNote() {
            var content = $('#summernote').summernote('code');
            document.getElementById("hidden").value = content;
            return true;
        }
    </script>
</body>
</html>
