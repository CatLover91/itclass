<?php
   $authorized = FALSE;
   if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {
      $authFile = file("./password.txt");

      foreach ($authFile as $login) {
         list($username, $password) = explode(":", $login);
         $password = trim($password);
         if (($username == $_SERVER['PHP_AUTH_USER']) && ($password == $_SERVER['PHP_AUTH_PW'])) {
            $authorized = TRUE;
            echo "welcome to this page!  ";
            echo "Let's go to <a href='form3.php ' >my portfolio</a>.";
            break;
         }
      }
   }

   // If not authorized, display authentication prompt or 401 error
   if (! $authorized) {
      header('WWW-Authenticate: Basic Realm="Secret Stash"');
      header('HTTP/1.0 401 Unauthorized');
      print('You must provide the proper credentials!');
      exit;
   }

?>
