<?php

function getAllCategories() {
    $query = "SELECT * FROM coins_categories_template";
    return (rawQuery($query));
}

function getCoinCategories($id) {
    return rawQuery("SELECT cct.id as id, cct.name as name FROM coins_categories_template as cct, coins_template_has_coins_categories_template as cthcct WHERE cct.id = cthcct.coins_categories_template_id AND cthcct.coins_template_id = $id");
}

?>