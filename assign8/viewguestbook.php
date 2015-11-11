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
              <table>
                <thead>
                  <tr>
                      <th data-field="id">ID</th>
                      <th data-field="name">Name</th>
                      <th data-field="email">Email</th>
                      <th data-field="comment">Comment</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $myFile = file("guestbook.txt");
                  $bookData = [];
                  foreach($myFile as $line) {
                    $linearr = explode("~", $line);
                    echo $linestr;
                    array_push($bookData, $linearr);
                  }

                  for ($row = 0; $row < count($bookData); $row++) {
                  ?>
                  <tr>
                    <td><? echo $row; ?></td>
                    <td><? echo $bookData[$row][0]; ?></td>
                    <td><? echo $bookData[$row][1]; ?></td>
                    <td><? echo $bookData[$row][2]; ?></td>
                    <td><? echo $bookData[$row][3]; ?></td>
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
