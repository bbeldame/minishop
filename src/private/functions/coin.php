<?php

function getOneCoin($id) {

}

function getAllCoins($onlyVisible=true) {
    if ($onlyVisible)
        $query = "SELECT * FROM coins_template WHERE stock > 0";
    else
        $query = "SELECT * FROM coins_template";
    return (rawQuery($query));
}

function coinExist($id) {

}

function coinNameExist($name) {
    $result = rawQuery("SELECT * FROM coins_template WHERE name = '$name'", true, true);
    return (count($result) > 0) ? true : false;
}

?>