<?php

header("Content-Type: application/json");
isXMLHttpRequest();
$data = json_decode(file_get_contents("php://input"), true);

$fields = [
    "id",
    "stock",
    "categories"
];

foreach ($fields as $f)
    if (!isset($data[$f]))
        exit(json_encode("error"));

if (!coinExist($data['id']))
    exit(json_encode("La coin n'existe pas.."));
if (count($data["categories"]) == 0)
    exit(json_encode("Il faut choisir une categorie au moins!"));
editCoin($data['id'], $data['stock'], $data['categories']);
exit(json_encode("success"));
?>