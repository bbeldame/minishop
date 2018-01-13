<!DOCTYPE html>
<html>
<head>
    <title>Minishop | Wine market</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="author" content="<?php echo META_AUHTOR; ?>"/>
    <meta name="description" content="<?php echo META_DESCRIPTION; ?>"/>
    <meta name="keywords" content="<?php echo META_KEYWORDS; ?>"/>
    <link rel="stylesheet" type="text/css" href="/public/css/minishop.css">
</head>

<body>
<div align="center">
    <a href="/"><img src="/public/images/logo.jpg"></a>
</div>


<div id="menu">
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/register">Register</a></li>
        <li><a href="/login">Log in</a></li>
        <li><a href="/orders">Orders</a></li>
        <li><a href="/cart">Cart</a></li>
        <li><a class="button-admin" href="/admin">Admin</a></li>
        <li><a class="button-logout" href="/logout">Log out</a></li>
    </ul>
</div>


<div id="content">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/private/views/" . $route['view']; ?>
</div>

<div id="footer">
    <p class="text-center">Copyright &copy; Minishop - 2017</p>
</div>
</body>

</html>

