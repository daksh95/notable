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
	<form id='noteForm' name='noteForm' action='notesubmit.php' method='POST' onsubmit='return submitNote();'>
	<input type='hidden' name='id' value='".$id."'>
	<input type='text' name='title' id='title' placeholder='Title Your Note' value='".$title."'>
	<input type='hidden' id='hidden' name='content'>
	<div id='summernote'></div>
	<script>$('#summernote').summernote('code','".$content."');</script>
	</form>
<div id = 'buttons'>
	<button class='notebutton' id='collaborate'>Share</button>
	<button class='notebutton' form='noteForm' id='savebutton' type='submit'>Save</button>
	</div>
	</div>"
	?>    
	
	<div id="myModal" class="modal">
		<div class="modal-content">
			<div class="modal-header">
				<span class="close">&times;</span>
				<h2>Collaborate</h2>
			</div>
				<div class="modal-body">
					<form name="collab-form" action='noteshare.php'>
						<input type="hidden" name="shareid" value=<?php echo $id ?> >
						<input type="text" id="name" name="shareuser" placeholder="Username">
						<input type="checkbox" name="write" value="y">Give write permissions?
						<button class="notebutton" id="sharebutton" type="submit">Share</button>
					</form>
				</div>
		</div>
	</div>

	<?php

	?>

	<script>
		var readOnly = 0;
		var shared = 0;
			<?php
				if(isset($_GET['read'])) {
					echo 'readOnly = 1;';
				}
				if(isset($_GET['shared'])) {
					echo 'shared = 1;';
				}
			?>
		if(readOnly) {
			$('#summernote').summernote('disable');
			$('#savebutton').html('Go Back');
		}

		if(shared) {
			$('#collaborate').css('display','none');
		}

		function submitNote() {
			var content = $('#summernote').summernote('code');
			document.getElementById("hidden").value = content;
		}

		var modal = document.getElementById('myModal');

	// Get the button that opens the modal
	var btn = document.getElementById("collaborate");

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks the button, open the modal 
	btn.onclick = function() {
		modal.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
		modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}

	</script>
</body>
</html>
