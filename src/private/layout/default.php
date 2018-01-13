<!DOCTYPE html>
<html>
<head>
    <title><?= TITLE; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="author" content="<?= META_AUHTOR; ?>"/>
    <meta name="description" content="<?= META_DESCRIPTION; ?>"/>
    <meta name="keywords" content="<?= META_KEYWORDS; ?>"/>
    <link rel="stylesheet" type="text/css" href="/public/css/minishop.css">
</head>

<body>
<div id="alertDatas">
    <?php catchNotifications(); ?>
</div>
<div align="center">
    <h1>Logo</h1>
</div>
<div id="menu">
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/register">Register</a></li>
        <li><a href="/login">Log in</a></li>
        <li><a href="/orders">Orders</a></li>
        <li><a href="/cart">Cart</a></li>
        <li><a class="button-admin" onclick="showAlert('success', 'Admin wesh!');">Admin</a></li>
        <li><a class="button-logout" onclick="showAlert('error', 'Log out wesh!');">Log out</a></li>
    </ul>
</div>


<div id="content">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/private/views/" . $route['view']; ?>
</div>

<div id="footer">
    <p class="text-center">Copyright &copy; Minishop - 2017</p>
</div>
</body>
<script language="javascript" src="/public/js/minishop.js"></script>
</html>

