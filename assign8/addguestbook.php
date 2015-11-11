<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
    echo $nameErr;
  } else {
    $name = test_input($_POST["name"]);
    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
      echo $emailErr;
    } else {
      $email = test_input($_POST["email"]);
      if (empty($_POST["comment"])) {
        $commentErr = "Comment is required";
        echo $commentErr;
      } else {
        $comment = test_input($_POST["comment"]);
        $myFile = fopen("guestbook.txt", "a");

        $datetime = date("y-m-d h:i:s");

        $userInput = $name."~".$email."~".$comment."~".$dateTime;

        fwrite($myFile, $userInput);

        echo "<a href=\"viewguestbook.php\" class=\"amber-text\">View Guestbook</a>";
      }

      fclose($myfile);
    }
  }
}
?>
