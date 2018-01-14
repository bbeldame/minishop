<?php
header("Content-Type: application/json");
isXMLHttpRequest();
$data = json_decode(file_get_contents("php://input"), true);

$fields = [
    "categories",
    "id",
    "name",
    "stock",
    "price_usd",
    "24h_volume_usd",
    "market_cap_usd",
    "percent_change_1h",
    "percent_change_24h",
    "percent_change_7d"
];

foreach ($fields as $f)
    if (!isset($data[$f]))
        exit(json_encode("error"));

if (count($data["categories"]) == 0)
    exit(json_encode("Il faut choisir une categorie au moins!"));
if (coinNameExist($data['name']))
    exit(json_encode($data['name'] . " existe déja en base !"));

$query = addCoin(
    $data['categories'],
    $data['price_usd'],
    $data['stock'],
    $data['name'],
    $data['24h_volume_usd'],
    $data['percent_change_1h'],
    $data['percent_change_24h'],
    $data['percent_change_7d'],
    $data['market_cap_usd']);
exit(json_encode('success'));
?>