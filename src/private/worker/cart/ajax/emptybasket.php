<?php
  header("Content-Type: application/json");
  isXMLHttpRequest();
  removeCookieCart();
  exit(json_encode(array("success" => true)));
?>