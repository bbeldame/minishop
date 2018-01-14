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

if (!orderExist($data['id']))
    exit(json_encode("L'order n'existe pas.."));

removeOrder($data['id']);
exit(json_encode("success"));
?>