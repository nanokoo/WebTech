
<?php 
  require "includes/dbh.inc.php"
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width">
    <meta name="keywords" content="evets, tallinn, tech, startup">
    <title>N&L meetup Events | Welcome</title>
    <link rel="stylesheet" href="style.css">
    <script src="cursoranimation.js"></script>
  </head>
  <body>

    <!-- Header part for the Log in and Sign up
     -->
    <header>
      <nav class="nav-header-main">
        <a class="header-logo" href="index.php">
          <img src="img/NL.png" alt="N&L">
        </a>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="aboutus.php">About us</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
      </nav>
      <div class="header-login">
        
        <!-- using post method sensitive data not to be shown in URL bar-->
        <form action="includes/login.inc.php" method= "post"> 
          <input type="text" name="mailuid" placeholder="Username/E-mail...">
          <input type="password" name="pwd" placeholder="Password">
          <button type="submit" name="login-submit">login</button>
          
        </form>
        <a href ="signup.php">Signup</a>
        <form action="includes/login.inc.php" method= "post">
          <!--  when user is logged in showing log out button only then-->
          <button type="submit" name= "logout-submit">Logout</button>  
        </form>
        <?php
        if (!isset($_SESSION['id'])) {
          echo '<form action="includes/login.inc.php" method="post">
            <input type="text" name="mailuid" placeholder="E-mail/Username">
            <input type="password" name="pwd" placeholder="Password">
            <button type="submit" name="login-submit">Login</button>
          </form>
          <a href="signup.php" class="header-signup">Signup</a>';
        }
        else if (isset($_SESSION['id'])) {
          echo '<form action="includes/logout.inc.php" method="post">
            <button type="submit" name="login-submit">Logout</button>
          </form>';
        }
        ?>
        
      </div>
    </header>
