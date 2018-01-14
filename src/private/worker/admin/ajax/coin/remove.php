<?php

header("Content-Type: application/json");
isXMLHttpRequest();
$data = json_decode(file_get_contents("php://input"), true);

$fields = [
    "id"
];

foreach ($fields as $f)
    if (!isset($data[$f]))
        exit(json_encode("error"));

if (!coinExist($data['id']))
    exit(json_encode("La coin n'existe pas.."));
if (orderCoinIdExist($data['id']))
    exit(json_encode("Il faut supprimer les orders avant!"));

removeCoin($data['id']);
exit(json_encode("success"));
?>