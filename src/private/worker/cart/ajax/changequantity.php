<?php
  header("Content-Type: application/json");
  isXMLHttpRequest();
  $data = json_decode(file_get_contents("php://input"), true);
  $coin = getOneCoin($data["coinID"]);
  if ($coin["stock"] < $data["quantity"]) {
    exit(json_encode(array("success" => false, "error" => "Pas assez de stock")));    
  }
  changeQuantityCoinToCart($data["coinID"], $data["quantity"]);
  $quantity = getTotalCart();
  exit(json_encode(array("success" => true, "newQuantity" => $quantity)));
?>