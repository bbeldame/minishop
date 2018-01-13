<?php

require_once "autoloader.php";

function catchNotifications($types=['error', 'success']) {
    foreach ($types as $type) {
        $datas = array();
        if (!isset($_SESSION[$type]) || empty($_SESSION[$type]))
            continue ;
        switch ($type) {
            case "error":
                $datas = ["Error !", $_SESSION[$type], "error"];
                break;
            case "success":
                $datas = ["Success !", $_SESSION[$type], "success"];
                break;
            default:
                break ;
        }
        echo '<div class="alert ' . $datas[2] . '" onclick="this.style.display=\'none\';"><strong>' . $datas[0] . '</strong> ' . $datas[1] . '</div>';
        $_SESSION[$type] = "";
    }
}

function errorRedirect($error, $route) {
    $_SESSION['error'] = $error;
    redirect($route);
}

function successRedirect($succes, $route) {
    $_SESSION['success'] = $succes;
    redirect($route);
}

function redirect($route) {
    switch($route) {
        case 404:
            header('Location: /404');
            break;
        case 403:
            header('Location: /403');
            break;
        default:
            header('Location: '. $route);
            break;
    }
    exit();
}

?>