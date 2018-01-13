<?php
  $mysqli = connectDB();
  $res = mysqli_multi_query($mysqli, file_get_contents($_SERVER["DOCUMENT_ROOT"]."/private/sql/init.sql"));
  closeDB($mysqli);
?>

<div align="center" style="margin: 45px auto">
  Installation terminée.
</div>