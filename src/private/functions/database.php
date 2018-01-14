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

function rawQuery($link, $sql, $select=true, $single=false) {
  $query = mysqli_query($link, $sql);
  if ($select) {
    if ($single)
      $result = mysqli_fetch_row($query);
    else {
      while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
        $result[] = $row;
    }
  }
  else
    return ($query);
  return ($result);
}

function sq($mysqli, $query) {
  return mysqli_real_escape_string($mysqli, $query);
}

?>