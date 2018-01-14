<?php
    $user = $_SESSION["username"];
    $_SESSION["username"] = NULL;
    $_SESSION["rights"] = NULL;
    successRedirect("On espère vous revoir bienôt ".$user, "/");
?>