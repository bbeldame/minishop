<?php
  function connectDB() {
    $mysqli = mysqli_connect(DB_HOST, "root", "root", DB_NAME);
    return $mysqli;
  }

  function closeDB($link) {
    mysqli_close($link);
  }
?>