<?php

header("Content-Type: application/json");
isXMLHttpRequest();
$data = json_decode(file_get_contents("php://input"), true);

$fields = [
    "id",
    "right"
];

foreach ($fields as $f)
    if (!isset($data[$f]))
        exit(json_encode("error"));

if (!userExist($data['id']))
    exit(json_encode("L'utilisateur n'existe pas.."));
if ($data['right'] != 1 && $data['right'] != 3)
    exit(json_encode("Ce niveau n'existe pas!"));

editUser($data['id'], $data['right']);
exit(json_encode("success"));
?>