<?php 
    require 'dbconn.php'; 
    require 'logincheck.php';
?>
<html>
    <head>
        <title>My Notes</title>
        <link rel="stylesheet" type="text/css" href="css/profile.css">
        <meta name="viewport" content="width=device-width">
			<script>
				function redirect(id, ifRead) {
					if(!ifRead) {
						window.location.href='note.php?id='+id;
					}
					if(ifRead==1) {
						window.location.href='note.php?id='+id+'&&read=y&&shared=y';
					}
                    if(ifRead==2) {
                        window.location.href='note.php?id='+id+'&&shared=y';
                    }
                }
			</script>
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
                            echo "<div class='note' onclick='redirect($array[2],0)'>
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
                <?php 
                    $query = "SELECT title, content, notes.id FROM notes JOIN collab_read ON notes.id=collab_read.id WHERE user_read = '".$usr."'";
                    if($result = mysqli_query($conn,$query)) {
                        while($array = mysqli_fetch_array($result)) {
                             // echo "\"note.php?id=".$array[2]."\"";
							echo "<div class='note' style='background-color: #F55D3E;'	onclick='redirect($array[2], 1)'>
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
                <?php 
                    $query = "SELECT title, content, notes.id FROM notes JOIN collab_write ON notes.id=collab_write.id WHERE user_write = '".$usr."'";
                    if($result = mysqli_query($conn,$query)) {
                        while($array = mysqli_fetch_array($result)) {
                             // echo "\"note.php?id=".$array[2]."\"";
							echo "<div class='note' style='background-color: #E9D758;'	onclick='redirect($array[2], 2)'>
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
            <i class="fui-plus-circle" onclick="redirect('new')"></i>
        </body>
</html>
