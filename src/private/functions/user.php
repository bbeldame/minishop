<?php

function hashPass($pass) {
  return hash("sha256", $pass.HASH_SALT);
}

function doesUserExistsByMail($mail) {
  $mysqli = connectDB();
  $res = mysqli_query($mysqli, "SELECT id FROM users_template WHERE email=\"".sq($mail)."\";");
  $found = mysqli_num_rows($res) > 0;
  closeDB($mysqli);
  return ($found);
}

function doesUserExistsByUsername($username) {
  $mysqli = connectDB();
  $res = mysqli_query($mysqli, "SELECT id FROM users_template WHERE username=\"".sq($username)."\";");
  $found = mysqli_num_rows($res) > 0;
  closeDB($mysqli);
  return ($found);
}

function registerUser($username, $email, $password) {
  $mysqli = connectDB();
  $res = mysqli_query($mysqli, "INSERT INTO users_template (username, email, password, `right`)
  VALUES ('".sq($username)."', '".sq($email)."', '".hashPass($password)."', 1);");
  closeDB($mysqli);
  return true;
}

function verifyLogin($username, $password) {
  $mysqli = connectDB();
  $res = mysqli_query($mysqli, "SELECT id FROM users_template WHERE
  username=\"".sq($username)."\" AND password=\"".hashPass($password)."\";");
  $found = mysqli_num_rows($res) > 0;
  closeDB($mysqli);
  return ($found);
}

function getRightsOfUser($username) {
  $mysqli = connectDB();
  $res = mysqli_query($mysqli, "SELECT `right` FROM users_template WHERE username='".sq($username)."' limit 1;");
  $value = mysqli_fetch_object($res);
  closeDB($mysqli);
  return $value->right;
}

function changeRightsOfUser($idUser, $newRights) {
  $mysqli = connectDB();
  $res = mysqli_result($mysqli, "UPDATE users_template SET `right`=".sq($newRights)." WHERE id=".sq($idUser).";");
  closeDB($mysqli);
  return true;
}

function isAdmin() {
  if (isset($_SESSION['username']))
    if ($_SESSION['rights'] == ADMIN)
      return (true);
  else
    return (false);
}

function addCookieUser($username) {
  $cookie = $username;
  $hash = hash('sha256', $username . COOKIE_SALT_SECRET);
  $cookie .= ':'.$hash;
  setcookie('session', $cookie, 2147483647, '/');
}

function isConnectedUser() {
  if (!isset($_SESSION['username'])) {
    $cookie = isset($_COOKIE['session']) ? $_COOKIE['session'] : false;
    if ($cookie) {
      if (!(list ($username, $hash) = explode(':', $cookie)))
        return (false);
      if (!hash_equals(hash('sha256', $username . COOKIE_SALT_SECRET), $hash))
        return (false);
      if (doesUserExistsByUsername($username)) {
        $_SESSION["username"] = $username;
        $_SESSION["rights"] = getRightsOfUser($username);
        $_SESSION["id"] = getIdUser($username);
        // Refresh cookie
        addCookieUser($username);
        return true;
      } else {
        setcookie('session', NULL, -1, "/");
        return false;
      }
    } else {
      return false;
    }
  }
  else
    return true;
}

function getIdUser($username) {
  $mysqli = connectDB();
  $res = mysqli_query($mysqli, "SELECT `id` FROM users_template WHERE username='".sq($username)."' limit 1;");
  $value = mysqli_fetch_object($res);
  closeDB($mysqli);
  return $value->id;
}

?>
