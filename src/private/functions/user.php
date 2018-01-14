<?php

function hashPass($pass) {
  return hash("sha256", $pass.HASH_SALT);
}

function doesUserExistsByMail($mail) {
  $mysqli = connectDB();
  $res = mysqli_query($mysqli, "SELECT id FROM users_template WHERE email=\"".$mail."\";");
  $found = mysqli_num_rows($res) > 0;
  closeDB($mysqli);
  return ($found);
}

function doesUserExistsByUsername($username) {
  $mysqli = connectDB();
  $res = mysqli_query($mysqli, "SELECT id FROM users_template WHERE username=\"".$username."\";");
  $found = mysqli_num_rows($res) > 0;
  closeDB($mysqli);
  return ($found);
}

function registerUser($username, $email, $password) {
  $mysqli = connectDB();
  $res = mysqli_query($mysqli, "INSERT INTO users_template (username, email, password, `right`)
  VALUES ('".$username."', '".$email."', '".hashPass($password)."', 1);");
  closeDB($mysqli);
  return true;
}

function verifyLogin($username, $password) {
  $mysqli = connectDB();
  $res = mysqli_query($mysqli, "SELECT id FROM users_template WHERE
  username=\"".$username."\" AND password=\"".hashPass($password)."\";");
  $found = mysqli_num_rows($res) > 0;
  closeDB($mysqli);
  return ($found);
}

function getRightsOfUser($username) {
  $mysqli = connectDB();
  $res = mysqli_query($mysqli, "SELECT `right` FROM users_template WHERE username='$username' limit 1;");
  $value = mysqli_fetch_object($res);
  closeDB($mysqli);
  return $value->right;
}

function changeRightsOfUser($idUser, $newRights) {
  $mysqli = connectDB();
  $res = mysqli_result($mysqli, "UPDATE users_template SET `right`=".$newRights." WHERE id=".$idUser.";");
  closeDB($mysqli);
  return true;
}

function isConnectedUser() {
  if (isset($_SESSION['username']))
    return (true);
  else
    return (false);
}

function isAdmin() {
  if (isset($_SESSION['username']))
    if ($_SESSION['rights'] == ADMIN)
      return (true);
  else
    return (false);
}

?>
