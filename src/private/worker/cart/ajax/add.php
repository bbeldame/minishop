<?php
  header("Content-Type: application/json");
  isXMLHttpRequest();
  $data = json_decode(file_get_contents("php://input"), true);
  addCoinToCart($data["coinID"], $data["quantity"]);
  exit(json_encode('success'));
?>