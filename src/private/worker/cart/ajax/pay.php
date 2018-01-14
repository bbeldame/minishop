<?php
  header("Content-Type: application/json");
  if (empty($_SESSION["id"])) {
    exit(json_encode(array("success" => false, "err" => "pasco")));
  }
  $orderId = payOrder();
  if (!empty($orderId)) {
    removeCookieCart();
    exit(json_encode(array("success" => true, "orderId" => $orderId)));
  } else {
    exit(json_encode(array("success" => false)));
  }
?>