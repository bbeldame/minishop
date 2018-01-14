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

if (!categoryExist($data['id']))
    exit(json_encode("La catégorie n'existe pas.."));
if (categoryIsLinkToCoin($data['id']))
    exit(json_encode("Certaine coin utilise cette catégorie"));
removeCategory($data['id']);
exit(json_encode("success"));
?>