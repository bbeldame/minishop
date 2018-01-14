<?php
    $user = $_SESSION["username"];
    $_SESSION["username"] = NULL;
    $_SESSION["rights"] = 0;
    successRedirect("On espère vous revoir bientôt ".$user . "!", "/");
?>