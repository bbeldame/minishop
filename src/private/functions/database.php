<?php
  function connectDB() {
    $mysqli = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (mysqli_connect_errno())
        die("Echec lors de la connexion à MySQL : " . mysqli_connect_error());
    return $mysqli;
  }

  function closeDB($link) {
    mysqli_close($link);
  }
?>