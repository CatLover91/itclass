<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "First name is required";
    echo $nameErr;
  } else {
    $name = test_input($_POST["name"]);
    if (empty($_POST["lastname"])) {
      $lastnameErr = "First name is required";
      echo $lastnameErr;
    } else {
      $lastname = test_input($_POST["lastname"]);

      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        echo $emailErr;
      } else {
        $email = test_input($_POST["email"]);

        if (empty($_POST["street"])) {
          $streetErr = "street is required";
          echo $streetErr;
        } else {
          $street = test_input($_POST["street"]);
          if (empty($_POST["city"])) {
            $cityErr = "city is required";
            echo $cityErr;
          } else {
            $city = test_input($_POST["city"]);
            if (empty($_POST["state"])) {
              $stateErr = "state is required";
              echo $stateErr;
            } else {
              $state = test_input($_POST["state"]);
              if (empty($_POST["zip"])) {
                $zipErr = "zip is required";
                echo $zipErr;
              } else {
                $zip = test_input($_POST["zip"]);
                if (empty($_POST["country"])) {
                  $countryErr = "country is required";
                  echo $countryErr;
                } else {
                  $country = test_input($_POST["country"]);
                  if (empty($_POST["phone"])) {
                    $phoneErr = "phone is required";
                    echo $phoneErr;
                  } else {
                    $phone = test_input($_POST["phone"]);
                    if (empty($_POST["comment"])) {
                      $commentErr = "Comment is required";
                      echo $commentErr;
                    } else {
                      $comment = test_input($_POST["comment"]);

                      $title = "Message from IT325 Website";
                      $message = $name." ".$lastname."\n".$street."\n".$city.", ".$state." ".$zip."\n".$country." - ".$phone."\n".$comment;

                      mail($email, $title, $message);
                      echo "Message sent! <a href=\"../\" class=\"amber-text\">Go back to home page.</a>";
                    }
                  }
              }
            }
          }
        }
      }
    }
  }
}
?>
