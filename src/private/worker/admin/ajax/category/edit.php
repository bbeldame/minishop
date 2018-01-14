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
if (categoryNameExist($data['name']))
    exit(json_encode("Une catégorie porte déja ce nom"));
if (empty($data['name']))
    exit(json_encode("Il faut mettre un nom please :)"));
editCategory($data['id'], $data['name']);
exit(json_encode("success"));
?>