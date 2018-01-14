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

if (!userExist($data['id']))
    exit(json_encode("L'utilisateur n'existe pas.."));
if ($data['id'] == $_SESSION['id'])
    exit(json_encode("Vous ne pouvez pas vous supprimez vous meme.."));

removeUser($data['id']);
exit(json_encode("success"));
?>