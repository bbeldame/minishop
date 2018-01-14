<?php
  header("Content-Type: application/json");
  isXMLHttpRequest();
  $data = json_decode(file_get_contents("php://input"), true);
  changeQuantityCoinToCart($data["coinID"], $data["quantity"]);
  $quantity = getTotalCart();
  exit(json_encode(array("success" => true, "newQuantity" => $quantity)));
?>