<?php

function getOneOrder($id) {
    $result = rawQuery("SELECT * FROM users_orders_template WHERE id = $id", true, true);
    $query = "SELECT cb.quantity, ct.price, ct.name, uot.total_paid
        FROM coins_bought cb
        INNER JOIN coins_template ct
        ON ct.id=cb.coins_template_id
        INNER JOIN users_orders_template uot
        ON uot.id=cb.users_orders_template_id
        WHERE uot.id=".$id.";";
    $result['details'] = rawQuery($query, true);
    return ($result);
}

function getAllUserOrders($id) {
    return (rawQuery("SELECT * FROM users_orders_template WHERE users_template_id = $id"));
}

function orderExist($id) {
    $result = rawQuery("SELECT * FROM users_orders_template WHERE id = $id", true, true);
    return (!is_null($result)) ? true : false;
}

function orderCoinIdExist($id_coin) {
    $result = rawQuery("SELECT * FROM coins_bought WHERE coins_template_id = $id_coin", true, true);
    return (!is_null($result)) ? true : false;
}

function payOrder() {
    $cart = cookieCartToArray();
    $total = getTotalPriceOfCart();
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

function getAllOrders() {
    return (rawQuery("SELECT * FROM users_orders_template"));
}

?>
