<?php
  header("Content-Type: application/json");
  isXMLHttpRequest();
  $data = json_decode(file_get_contents("php://input"), true);
  $quantity = getTotalCart() + $data["quantity"];
  addCoinToCart($data["coinID"], $data["quantity"]);
  exit(json_encode(array("success" => true, "newQuantity" => $quantity)));
?>