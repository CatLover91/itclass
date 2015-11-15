<!DOCTYPE html>
<html>
  <head>
    <title>IT325 homework website</title>
    <meta name="viewport">
    <meta charset="UTF-8">

    <!-- jquery is needed for personal scripts and materialize -->
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    <!-- Materialize CSS to provide CSS framework -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>

    <!-- Fonts to be used by page, Lobster for header and CTA, and roboto is provided by materialize for body -->
    <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>

    <!-- Moment JS for time parsing -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
    <style>
      body {
        background-image: url(http://cdn.wonderfulengineering.com/wp-content/uploads/2014/06/galaxy-wallpapers-10.jpg);
        background-repeat:no-repeat;
        background-size:cover;
      }
      h1 {
        font-family: 'Lobster', cursive;
      }
      .header-splash-cont {
        text-align:center;
      }
    </style>
  </head>
  <body>
    <div class="header-splash-cont white-text">
      <h1>View Guestbook </h1>
    </div>
    <div class="main-page-cont">
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
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
                      if (empty($_POST["rating"])) {
                        $ratingErr = "Rating is required";
                        echo $ratingErr;
                      } else {
                        $rating = test_input($_POST["rating"]);
                        if (empty($_POST["likes"])) {
                          $likesErr = "Likes are required (weird, I know)";
                          echo $likesErr;
                        } else {
                          $likes = test_input($_POST["likes"]);
                          if (empty($_POST["how"])) {
                            $howErr = "Tell us how you got here!";
                            echo $howErr;
                          } else {
                            $how = test_input($_POST["how"]);

                            $myFile = fopen("guestbook.txt", "a") or die("fopen did not work");

                            $userInput = $name."~".$email."~".$comment."~".$rating."~".$likes."~".$how;
                            fwrite($myFile, $userInput);
                          }
                        }
                      }
                    }

                    fclose($myFile);
                  }
                }
              }
              ?>
              <table>
                <thead>
                  <tr>
                      <th data-field="id">ID</th>
                      <th data-field="name">Name</th>
                      <th data-field="email">Email</th>
                      <th data-field="comment">Comment</th>
                      <th data-field="rating">Rating</th>
                      <th data-field="likes">Likes</th>
                      <th data-field="how">Visited by</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $myFile = file("guestbook.txt");
                  $feedbackData = [];
                  foreach($myFile as $line) {
                    $linearr = explode("~", $line);
                    echo $linestr;
                    array_push($feedbackData, $linearr);
                  }

                  for ($row = 0; $row < count($feedbackData); $row++) {
                  ?>
                  <tr>
                    <td><? echo $row; ?></td>
                    <td><? echo $feedbackData[$row][0]; ?></td>
                    <td><? echo $feedbackData[$row][1]; ?></td>
                    <td><? echo $feedbackData[$row][2]; ?></td>
                    <td><? echo $feedbackData[$row][3]; ?></td>
                    <td><? echo $feedbackData[$row][4]; ?></td>
                    <td><? echo $feedbackData[$row][5]; ?></td>
                    <td><? echo $feedbackData[$row][6]; ?></td>
                  </tr>
                  <?php
                  }
                  fclose(); //close database
                  ?>
                </tbody>
              </table>
              <a href="./index.html">Sign Guestbook</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
