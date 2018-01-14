<?php
    $user = $_SESSION["username"];
    $_SESSION["username"] = NULL;
    $_SESSION["id"] = NULL;
    $_SESSION["rights"] = 0;
    setcookie('session', NULL, -1, "/");
    successRedirect("On espère vous revoir bientôt ".$user . "!", "/");
?>