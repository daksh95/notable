<?php require 'dbconn.php'; ?>
<html>
    <head>
        <title>Welcome</title>
        <link rel="stylesheet" type="text/css" href="welcome.css">
    </head>
    <header>
        <a href="" id="logolink"><img id = "logo" src="images/Logo.png"></a>
        <nav>
            <ul>
                <li>About</li>
                <li>Contact Us</li>
                <li id="loginToggle" >Login</li>
            </ul>
    </header>
    <body>
        
        <div id="logocontainer">
            <img id="logolarge" src="images/Logo.png">
        <p id="welcome">Welcome to <span id="title">Notable!</span> - The last note-maker you'll ever need.</p>
        </div>
        <?php
            $sql = ""
        ?>
        <div id="signupform">
            <h1>Sign Up</h1>
            <?php
            if(!empty($_GET['p']) && $_GET['p'] == 'fail') {
                echo "<h4 style='color: red; font-size: 30px; margin-top: 0px; margin-bottom: 10px;'>Wrong password</h4>";
            }
            if(!empty($_GET['p']) && $_GET['p'] == 'registered') {
                echo "<h4 style='color: red; font-size: 30px; margin-top: 0px; margin-bottom: 10px;'>Registered Successfully!!</h4>";
            }
        ?>
            <form method="POST" action="registercheck.php">
                <input type="text" name="username" placeholder="Username" pattern="[a-z]{2,10}" title="Username should only contain 2-10 lowercase letters" required><br>
                <input type="password" name="pswd" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br>
                <input type="text" name="firstname" placeholder="First Name" class="name">
                <input type="text" name="lastname" placeholder="Last Name" class="name"><br>
                <input type="email" name="mail" placeholder="Email ID"><br>
                <input type="date" name="dob" class="name">
                <select name="gender" class="name">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select><br>
                <input type="submit" value="Sign Up">
            </form>
        </div>
        <div id="loginform">
            <h1>Login</h1>
            <form method="POST" action="profile.php">
                <input type="text" name="username" placeholder="Username" pattern="[a-z]{2,10}" title="Username should only contain 2-10 lowercase letters" required><br>
                <input type="password" name="pswd" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br>
                <input type="submit" value="Login">
            </form>
        </div>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script>
            $(function(){
                $("#loginToggle").click(function(){
                    if($(this).text()=="Login")
                    $(this).text("Register");
                    else
                    $(this).text("Login");

                    $("#signupform").fadeToggle();
                    $("#loginform").fadeToggle();
                    
                });
            });
        </script>

    </body>
</html>