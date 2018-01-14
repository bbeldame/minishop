<?php
  header("Content-Type: application/json");
  isXMLHttpRequest();
  $data = json_decode(file_get_contents("php://input"), true);
  $quantity = getTotalCart() + $data["quantity"];
  $quantityOfCoinInCart = getQuantityOfCoinInCart($data["coinID"]);
  $coin = getOneCoin($data["coinID"]);
  if ($coin["stock"] < $data["quantity"] + $quantityOfCoinInCart) {
    exit(json_encode(array("success" => false, "error" => "Pas assez de stock")));    
  }
  addCoinToCart($data["coinID"], $data["quantity"]);
  exit(json_encode(array("success" => true, "newQuantity" => $quantity)));
?>