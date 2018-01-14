<?php
function &getRoutes() {
    static $_routes;

    if (!isset($_routes)) {
        $_routes = array();
    }
    return ($_routes);
}

function addRoute($route, $view, $rights, $exact_rights, $worker="") {
    if (!empty($view))
        $view .= ".php";
    if (!empty($worker))
        $worker .= ".php";
    getRoutes()[$route] = compact('route', 'view', 'rights', 'exact_rights', 'worker');
}

function getRouteKey() {
    $route = "/";
    for ($i = 1; $i < 5; $i++) {
        if (!isset($_GET[$i]))
            break ;
        if (is_numeric($_GET[$i]))
            $route .= "*/";
        else
            $route .= $_GET[$i] . "/";
    }

    if ($route !== "/")
        $route = substr($route, 0, -1);
    if (!array_key_exists($route, getRoutes()))
        return ("/404");
    return ($route);
}

function getRoute($routeKey) {
    $routes =  getRoutes();
    if (!array_key_exists($routeKey, $routes))
        return ($routes["/404"]);
    if ($_SESSION['rights'] != $routes[$routeKey]['rights'] && $routes[$routeKey]['exact_rights'])
        return ($routes["/404"]);
    if ($_SESSION['rights'] < $routes[$routeKey]['rights'])
        return ($routes["/404"]);
    return ($routes[$routeKey]);
}
?>