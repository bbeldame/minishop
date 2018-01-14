<?php

function addCoin($categories, $price, $stock, $name, $volume_24h, $percent_change_1h, $percent_change_24h, $percent_change_7d, $market_cap) {
    $query = "INSERT INTO coins_template (price, stock, name, volume_24h, percent_change_1h, percent_change_24h, percent_change_7d, market_cap) VALUES (" . sq($price) . "," . sq($stock) . ", '" . sq($name) . "', " . sq($volume_24h) . ", " . sq($percent_change_1h) . ", " . sq($percent_change_24h) . "," . sq($percent_change_7d) . ", " . sq($market_cap) . ")";
    $id = rawQuery($query, false);
    foreach ($categories as $cat)
        rawQuery("INSERT INTO coins_template_has_coins_categories_template VALUES ($id, " . sq($cat) . ")", false);
}

function editCoin($id, $stock, $categories) {
    rawQuery("DELETE FROM coins_template_has_coins_categories_template WHERE coins_template_id = $id", false);
    foreach ($categories as $cat)
        rawQuery("INSERT INTO coins_template_has_coins_categories_template VALUES ($id, " . sq($cat) . ")", false);
    rawQuery("UPDATE coins_template SET stock = " . sq($stock) . " WHERE id = " . sq($id), false);
}

function removeCoin($id) {
    if (!coinExist($id))
        return false;
    rawQuery("DELETE FROM coins_template_has_coins_categories_template WHERE coins_template_id = $id", false);
    rawQuery("DELETE FROM coins_template WHERE id = $id", false);
    return true;
}

function getOneCoin($id) {
    $coin = rawQuery("SELECT * FROM coins_template WHERE id = $id", true, true);
    $coin['categories'] = getCoinCategories($id);
    return ($coin);
}

function getAllCoins($onlyVisible=true) {
    if ($onlyVisible)
        $query = "SELECT * FROM coins_template WHERE stock > 0";
    else
        $query = "SELECT * FROM coins_template";
    $result = rawQuery($query);
    if (is_null($result))
        return ($result);
    foreach ($result as $k => $v)
        $result[$k]['categories'] = getCoinCategories($v['id']);
    return ($result);
}

function coinExist($id) {
    $result = rawQuery("SELECT * FROM coins_template WHERE id = $id", true, true);
    return (count($result) > 0) ? true : false;
}

function coinNameExist($name) {
    $result = rawQuery("SELECT * FROM coins_template WHERE name = '$name'", true, true);
    return (!is_null($result)) ? true : false;
}

?>