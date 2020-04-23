<?php
// Here we check whether the user got to this page by clicking the proper login button.
if (isset($_POST['login-submit'])) {

  require 'dbh.inc.php';

  // grabbing  all the data which we passed from the signup form 
  $mailuid = $_POST['mailuid'];
  $password = $_POST['pwd'];

  

  //check for any empty inputs. 
  if (empty($mailuid) || empty($password)) {
    header("Location: ../index.php?error=emptyfields&mailuid=".$mailuid);
    exit();
  }
  else {

    

    // as mentioned on lecture we have to have some kind of security level so we are using "? instead of 
    // passisg all sensitive data right away
    $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
    //  initialize a new statement using the connection from the dbh.inc.php file.
    $stmt = mysqli_stmt_init($conn);
    // error check
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      // If there is an error we send the user back to the signup page.
      header("Location: ../index.php?error=sqlerror");
      exit();
    }
    else {

      

      // bind the type of parameters we expect to pass into the statement, and bind the data from the user.
      mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
      // execute the prepared statement and send it to the database!
      mysqli_stmt_execute($stmt);
      // the result from the statement.
      $result = mysqli_stmt_get_result($stmt);
      //  store the result into a variable.
      if ($row = mysqli_fetch_assoc($result)) {
        // password validation-match the password from the database with the password the user submitted. The result is returned as a boolean.
        $pwdCheck = password_verify($password, $row['pwdUsers']);
        // If they don't match then create an error message!
        if ($pwdCheck == false) {
          //  send the user back to the signup page.
          header("Location: ../index.php?error=wrongpwd");
          exit();
        }

        else if ($pwdCheck == true) {

          // create session variables based on the users information from the database. If these session variables exist, then the website will know that the user is logged in.

          // storing database data  in session variables which are a type of variables that can be  used on all pages that has a session running in it.
          //  start a session HERE to be able to create the variables!
          session_start();
          // And NOW we create the session variables.
          $_SESSION['id'] = $row['idUsers'];
          $_SESSION['uid'] = $row['uidUsers'];
          $_SESSION['email'] = $row['emailUsers'];
          // Now the user is registered as logged in and  take them back to the front page! :)
          header("Location: ../index.php?login=success");
          exit();
        }
      }
      else {
        header("Location: ../index.php?login=wronguidpwd");
        exit();
      }
    }
  }
  //  close the prepared statement and the database connection!
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else {
  // If the user tries to access this page an inproper way, send them back to the signup page.
  header("Location: ../signup.php");
  exit();
}
