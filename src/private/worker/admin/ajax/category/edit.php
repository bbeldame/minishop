<?php

header("Content-Type: application/json");
isXMLHttpRequest();
$data = json_decode(file_get_contents("php://input"), true);

$fields = [
    "id",
    "name",
];

foreach ($fields as $f)
    if (!isset($data[$f]))
        exit(json_encode("error"));

if (!categoryExist($data['id']))
    exit(json_encode("La catégorie n'existe pas.."));
if (empty($data['name']))
    exit(json_encode("Il faut mettre un nom please :)"));
editCoin($data['id'], $data['stock'], $data['categories']);
exit(json_encode("success"));
?>