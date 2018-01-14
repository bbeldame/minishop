<?php
  header("Content-Type: application/json");
  isXMLHttpRequest();
  $data = json_decode(file_get_contents("php://input"), true);
  removeCoinFromCart($data["coinID"]);
  exit(json_encode(array("success" => true)));
?>