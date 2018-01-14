<?php

header("Content-Type: application/json");
isXMLHttpRequest();
$data = json_decode(file_get_contents("php://input"), true);

$fields = [
    "name",
];

foreach ($fields as $f)
    if (!isset($data[$f]))
        exit(json_encode("error"));

if (categoryNameExist($data['id']))
    exit(json_encode("Une catégorie a déja ce nom.."));
if (empty($data['name']))
    exit(json_encode("Il faut mettre un nom please :)"));
addCategory($data['name']);
exit(json_encode("success"));
?>