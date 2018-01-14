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
addRoute("/",                       "home",                 GUEST,      false);
addRoute("/home",                   "home",                 GUEST,      false);
addRoute("/register",               "register",             GUEST,      true);
addRoute("/login",                  "login",                GUEST,      true);
addRoute("/cart",                   "cart",                 GUEST,      false);
addRoute("/orders",                 "orders",               USER,       false);
addRoute("/order/*",                "order",                USER,       false);
addRoute("/coin/*",                 "coin",                 GUEST,      false);
addRoute("/404",                    "404",                  GUEST,      false);
addRoute("/install",                "install",              GUEST,      false);

// ADMIN ROUTES
addRoute("/admin",                  "admin/home",           ADMIN,      true);
addRoute("/admin/users",            "admin/users",          ADMIN,      true);
addRoute("/admin/categories",       "admin/categories",     ADMIN,      true);
addRoute("/admin/coins",            "admin/coins",          ADMIN,      true);
addRoute("/admin/user/*",           "admin/user",           ADMIN,      true);
addRoute("/admin/category/*",       "admin/category",       ADMIN,      true);
addRoute("/admin/coin/*",           "admin/coin",           ADMIN,      true);
addRoute("/admin/order/*",          "admin/order",          ADMIN,      true);

// WOKERS ROUTE
addRoute("/logout",                 "",                     USER,       false, "logout");
addRoute("/forms/register",         "",                     GUEST,      false, "forms/register");
addRoute("/forms/login",            "",                     GUEST,      false, "forms/login");
session_start();

$_SESSION['rights'] = isset($_SESSION['rights']) ? $_SESSION['rights'] : '0';
$routeKey = getRouteKey();
$route = getRoute($routeKey);

// infos();

if (!empty($route['worker']))
    require_once "worker/" . $route['worker'];
else
    require_once "layout/default.php";

?>
