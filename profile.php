<?php 
    require 'dbconn.php'; 
    require 'logincheck.php';
?>
<html>
    <head>
        <title>My Notes</title>
        <link rel="stylesheet" type="text/css" href="css/profile.css">
        <meta name="viewport" content="width=device-width">
    </head>
        <header>
            <a href="" id="logolink"><img id = "logo" src="images/Logo.png"></a>
            <nav>
                <ul>
                    <li>My Notes</li>
                    <li><a href="logout.php"><img id="profile" src="images/placeholder.png"></a></li>
                </ul>
        </header>
        <body>
            <div id="notes">
                <?php 
                    $query = "SELECT title, content, id FROM notes WHERE username = '".$usr."'";
                    if($result = mysqli_query($conn,$query)) {
                        while($array = mysqli_fetch_array($result)) {
                            // echo "\"note.php?id=".$array[2]."\"";
                            echo "<div class='note' onclick='redirect($array[2])'>
                            <p class = 'title'>".$array[0]."</p>
                            <hr>
                            <p class = 'content'>".substr($array[1],0,200)." ... <p>
                        </div>";
                        }
                    }
                    else {
                        echo "Some error";
                    }
                ?>
			</div>
			<script>
                function redirect(id) {
                    window.location.href='note.php?id='+id;
                }
			</script>
            <i class="fui-plus-circle" onclick="redirect('new')"></i>
        </body>
</html>