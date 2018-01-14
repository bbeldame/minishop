<?php

function addCategory($name) {
    $query = "INSERT INTO coins_categories_template (name) VALUES ('" . sq($name) ."')";
    rawQuery($query, false);
}

function editCategory($id, $name) {
    rawQuery("UPDATE coins_categories_template SET name = '" . sq($name) . "' WHERE id = " . sq($id), false);
}

function removeCategory($id) {
    if (!categoryExist($id))
        return false;
    rawQuery("DELETE FROM coins_categories_template WHERE id = $id", false);
    return true;
}

function getAllCategories() {
    $query = "SELECT * FROM coins_categories_template";
    return (rawQuery($query));
}

function getOneCategory($id) {
    $query = "SELECT * FROM coins_categories_template WHERE id = $id";
    return (rawQuery($query, true, true));
}

function getCoinCategories($id) {
    return rawQuery("SELECT cct.id as id, cct.name as name FROM coins_categories_template as cct, coins_template_has_coins_categories_template as cthcct WHERE cct.id = cthcct.coins_categories_template_id AND cthcct.coins_template_id = $id");
}

function categoryExist($id) {
    $result = rawQuery("SELECT * FROM coins_categories_template WHERE id = $id", true, true);
    return (!is_null($result)) ? true : false;
}

function categoryNameExist($name) {
    $result = rawQuery("SELECT * FROM coins_categories_template WHERE name = '" . sq($name) . "'", true, true);
    return (!is_null($result)) ? true : false;
}


function categoryIsLinkToCoin($id) {
    $result = rawQuery("SELECT * FROM coins_template_has_coins_categories_template WHERE coins_categories_template_id = $id", true, true);
    return (!is_null($result)) ? true : false;
}

?>