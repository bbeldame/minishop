<?php

function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return random_color_part() . random_color_part() . random_color_part();
}

header("Content-Type: application/json");
isXMLHttpRequest();
$data = json_decode(file_get_contents("php://input"), true);

$fields = [
    "id",
];

foreach ($fields as $f)
    if (!isset($data[$f]))
        exit(json_encode("error"));

$result = getOneOrder($data['id']);
$a = $result['details'];
$arr = [];
foreach ($a as $k => $v) {
    $arr[] = array(
        "color" => random_color(),
        "label" => $v['name'],
        "value" => intval($v['quantity'])
    );
}
exit(json_encode($arr));
?>