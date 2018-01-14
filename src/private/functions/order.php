<?php

function getOneOrder($id) {

}

function getAllOrders() {

}

function orderExist() {

}

function getUserOrder($id_user) {

}

function orderCoinIdExist($id_coin) {
    $result = rawQuery("SELECT * FROM coins_bought WHERE coins_template_id = $id_coin", true, true);
    return (count($result) > 0) ? true : false;
}

?>