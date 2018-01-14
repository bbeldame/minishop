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
    return (!is_null($result)) ? true : false;
}

function payOrder() {
    $cart = cookieCartToArray();
    $total = getTotalPriceOfCart();
    // ON VERIFIE QUIL Y A AU MOINS UN COIN PAS DELTE
    foreach ($cart as $key => $value) {
        if (!coinExist($value["id"])) {
            return NULL;
        }
    }
    $orderId = rawQuery("INSERT INTO users_orders_template
        (id, total_paid, paid_date, users_template_id)
        VALUES (NULL, ".$total.", now(), ".$_SESSION["id"].");", false);
    foreach ($cart as $key => $value) {
        rawQuery("INSERT INTO coins_bought (id, quantity, coins_template_id, users_orders_template_id)
            VALUES (NULL, ".$value["quantity"].", ".$value["id"].", ".$orderId.");", false);
        $coin = getOneCoin($value["id"]);
        $previousStock = $coin["stock"];
        $updatedStock = intval($previousStock) - intval($value["quantity"]);
        rawQuery("UPDATE coins_template SET stock = '".$updatedStock."' WHERE coins_template.id = ".$value["id"].";", false);
    }
    return ($orderId);
}

?>
