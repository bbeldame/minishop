<?php

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

?>