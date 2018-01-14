<?php

require_once "functions/app.php";

function var_infos($var) {
    if (DEBUG == true)
        echo '<pre>' . var_export($var, true) . '</pre>';
}

function infos() {
    if (DEBUG) {
        var_infos($_SESSION);
        var_infos($_COOKIE);
    }
}

// WEBSITE ROUTES
addRoute("/",                           "home",                 GUEST,      false);
addRoute("/home",                       "home",                 GUEST,      false);
addRoute("/register",                   "register",             GUEST,      true);
addRoute("/login",                      "login",                GUEST,      true);
addRoute("/cart",                       "cart",                 GUEST,      false);
addRoute("/orders",                     "orders",               USER,       false);
addRoute("/user",                       "user",                 USER,       false);
addRoute("/order/*",                    "order",                USER,       false);
addRoute("/coin/*",                     "coin",                 GUEST,      false);
addRoute("/404",                        "404",                  GUEST,      false);
addRoute("/install",                    "install",              GUEST,      false);

// CART ROUTES
addRoute("/cart/add",                   "",                     GUEST,      false, "cart/ajax/add");
addRoute("/cart/add",                   "",                     GUEST,      false, "cart/ajax/add");
addRoute("/cart/rm",                    "",                     GUEST,      false, "cart/ajax/rm");
addRoute("/cart/changequantity",        "",                     GUEST,      false, "cart/ajax/changequantity");
addRoute("/cart/pay",                   "",                     GUEST,      false, "cart/ajax/pay");

// ADMIN ROUTES
addRoute("/admin",                      "admin/home",           ADMIN,      true);
addRoute("/admin/users",                "admin/users",          ADMIN,      true);
addRoute("/admin/categories",           "admin/categories",     ADMIN,      true);
addRoute("/admin/coins",                "admin/coins",          ADMIN,      true);
addRoute("/admin/user/*",               "admin/user",           ADMIN,      true);
addRoute("/admin/category/*",           "admin/category",       ADMIN,      true);
addRoute("/admin/coin/*",               "admin/coin",           ADMIN,      true);
addRoute("/admin/order/*",              "admin/order",          ADMIN,      true);

// WOKERS ROUTE
addRoute("/logout",                     "",                     USER,       false, "logout");
addRoute("/forms/register",             "",                     GUEST,      false, "forms/register");
addRoute("/forms/login",                "",                     GUEST,      false, "forms/login");
addRoute("/forms/changeuser",           "",                     USER,      false, "forms/changeuser");

addRoute("/admin/ajax/coin/add",        "",                     GUEST,      false, "admin/ajax/coin/add");
addRoute("/admin/ajax/coin/remove",     "",                     GUEST,      false, "admin/ajax/coin/remove");
addRoute("/admin/ajax/coin/edit",       "",                     GUEST,      false, "admin/ajax/coin/edit");

addRoute("/admin/ajax/category/add",    "",                     GUEST,      false, "admin/ajax/category/add");
addRoute("/admin/ajax/category/remove", "",                     GUEST,      false, "admin/ajax/category/remove");
addRoute("/admin/ajax/category/edit",   "",                     GUEST,      false, "admin/ajax/category/edit");

addRoute("/admin/ajax/user/remove",     "",                     GUEST,      false, "admin/ajax/user/remove");
addRoute("/admin/ajax/user/edit",       "",                     GUEST,      false, "admin/ajax/user/edit");

addRoute("/admin/ajax/order/remove",    "",                     GUEST,      false, "admin/ajax/order/remove");
addRoute("/admin/ajax/order/edit",      "",                     GUEST,      false, "admin/ajax/order/edit");


session_start();

$_SESSION['rights'] = isset($_SESSION['rights']) ? $_SESSION['rights'] : '0';
$routeKey = getRouteKey();
$route = getRoute($routeKey);

if (!empty($route['worker']))
    require_once "worker/" . $route['worker'];
else
    require_once "layout/default.php";

?>
