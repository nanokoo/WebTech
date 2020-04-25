 <?php
  // not to create header every time
  require "header.php";
?>

    <main>
      <div class="wrapper-main">
        <section class="section-default">
          <?php
          if (!isset($_SESSION['id'])) {
            echo     '<video autoplay muted loop class="myvideo" width="100%", height="300">';
            echo        '<source src="img/movi_WebTech1.mp4" type="video/mp4">';
            echo      '</video>';
          // here will be added the page what the user will see when he is logged in, currently just for this milestone leaving it like this
          else if (isset($_SESSION['id'])) {
            echo '<p class="login-status">You are logged in!</p>';
          }
          ?>
         
          
        </section>
      </div>
    </main>

<?php
  require "footer.php";
?>
