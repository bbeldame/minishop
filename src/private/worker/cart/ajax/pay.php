<?php
  header("Content-Type: application/json");
  $orderId = payOrder();
  if (!empty($orderId)) {
    removeCookieCart();
    exit(json_encode(array("success" => true, "orderId" => $orderId)));
  } else {
    exit(json_encode(array("success" => false)));
  }
?>