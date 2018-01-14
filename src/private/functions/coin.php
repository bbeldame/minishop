<?php

function addCoin($categories, $price, $stock, $name, $volume_24h, $percent_change_1h, $percent_change_24h, $percent_change_7d, $market_cap) {
    $query = "INSERT INTO coins_template (price, stock, name, volume_24h, percent_change_1h, percent_change_24h, percent_change_7d, market_cap) VALUES (" . sq($price) . "," . sq($stock) . ", '" . sq($name) . "', " . sq($volume_24h) . ", " . sq($percent_change_1h) . ", " . sq($percent_change_24h) . "," . sq($percent_change_7d) . ", " . sq($market_cap) . ")";
    $id = rawQuery($query, false);
    foreach ($categories as $cat)
        rawQuery("INSERT INTO coins_template_has_coins_categories_template VALUES ($id, " . sq($cat) . ")", false);
}

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