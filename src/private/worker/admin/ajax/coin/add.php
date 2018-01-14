<?php
header("Content-Type: application/json");
isXMLHttpRequest();
$data = json_decode(file_get_contents("php://input"), true);

$fields = [
    "categories",
    "id",
    "name",
    "symbol",
    "rank",
    "price_usd",
    "price_btc",
    "24h_volume_usd",
    "market_cap_usd",
    "available_supply",
    "total_supply",
    "max_supply",
    "percent_change_1h",
    "percent_change_24h",
    "percent_change_7d",
    "last_updated"
];

foreach ($fields as $f)
    if (!isset($data[$f]))
        exit(json_encode("error"));

if (count($data["categories"]) == 0)
    exit(json_encode("Il faut choisir une categorie au moins!"));
/* Verifier si la cat existe.. */

exit(json_encode($data));
?>