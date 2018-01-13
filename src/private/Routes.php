<?php

require_once "functions/configuration.php";
require_once "functions/route.php";

function var_infos($var) {
    if (DEBUG == true)
        echo '<pre>' . var_export($var, true) . '</pre>';
}

// WEBSITE ROUTES
addRoute("/",                       "home",                 GUEST,      false);
addRoute("/home",                   "home",                 GUEST,      false);
addRoute("/register",               "register",             GUEST,      true);
addRoute("/login",                  "login",                GUEST,      true);
addRoute("/cart",                   "cart",                 GUEST,      false);
addRoute("/orders",                 "orders",               USER,       false);
addRoute("/404",                    "404",                  GUEST,      false);

// ADMIN ROUTES
addRoute("/admin",                  "admin/home",           ADMIN,      true);

session_start();

$routeKey = getRouteKey();
$route = getRoute($routeKey);

if (!empty($route['worker']))
    ;
else
    require_once "layout/default.php";

?>
