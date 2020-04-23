<?php
  
  require "header.php";
?>

    <main>
      <div class="wrapper-main">
        <section class="section-default">
          <h1>Signup</h1>
          //here I ll add error messages if user has tried signup already
        
          <form class="form-signup" action="includes/signup.inc.php" method="post">
            <?php
            // Here we check if the user already tried submitting data.

            // We check username.
            if (!empty($_GET["uid"])) {
              echo '<input type="text" name="uid" placeholder="Username" value="'.$_GET["uid"].'">';
            }
            else {
              echo '<input type="text" name="uid" placeholder="Username">';
            }

            // We check e-mail.
            if (!empty($_GET["mail"])) {
              echo '<input type="text" name="mail" placeholder="E-mail" value="'.$_GET["mail"].'">';
            }
            else {
              echo '<input type="text" name="mail" placeholder="E-mail">';
            }
            ?>
            <input type="text" name="uid" placeholder="Username">
            <input type="text" name="mail" placeholder="Email">
            
            <input type="password" name="pwd" placeholder="Password">
            <input type="password" name="pwd-repeat" placeholder="Repeat password ">
            <button type="submit" name="signup-submit">Signup</button>
          </form>
          
        </section>
      </div>
    </main>

<?php
 
  require "footer.php";
?>
