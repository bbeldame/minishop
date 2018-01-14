<?php
  function removeCookieCart() {
    setcookie("cart", "empty", 2147483647, "/");
  }

  function cookieCartToArray() {
    if (!isset($_COOKIE["cart"]) || $_COOKIE["cart"] === 'empty') {
      return array();
    }
    $cartRaw = $_COOKIE["cart"];
    foreach (explode(',', $cartRaw) as $k => $v) {
      $tmp = explode(':', $v);
      $id = $tmp[0];
      $quantity = $tmp[1];
      $cart[] = array(
        "id" => $id,
        "quantity" => intval($quantity)
      );
    }
    return $cart;
  }

  function arrayToCookieCart($arr) {
    $cartRaw = "";
    $cartConstructor = array();
    foreach ($arr as $key => $value) {
      $cartConstructor[] = $value["id"].":".$value["quantity"];
    }
    if (empty($cartConstructor)) {
      setcookie("cart", "empty", 2147483647, "/");
    } else {
      setcookie("cart", implode(",", $cartConstructor), 2147483647, "/");
    }
  }

  function getTotalCart() {
    $exist = isset($_COOKIE['cart']) ? true : false;
    if (!$exist)
      return (0);
    if ($_COOKIE['cart'] === 'empty')
      return (0);
    $cart = array();
    $total = 0;
    $articles = explode(",", $_COOKIE['cart']);
    foreach ($articles as $value) {
      $tmp = explode(':', $value);
      $quantity = $tmp[1];
      $total += $quantity;
    }
    return $total;
  }

  function addCoinToCart($id, $quantity) {
    $cart = cookieCartToArray();
    $updated = false;
    foreach ($cart as &$value) {
      if ($value["id"] === $id) {
        $value["quantity"] += intval($quantity);
        $updated = true;
      }
    }
    if ($updated === false) {
      $cart[] = array(
        "id" => $id,
        "quantity" => intval($quantity)
      );
    }
    arrayToCookieCart($cart);
  }
?>