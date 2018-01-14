<!DOCTYPE html>
<html>
<head>
    <title><?= TITLE; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="author" content="<?= META_AUHTOR; ?>"/>
    <meta name="description" content="<?= META_DESCRIPTION; ?>"/>
    <meta name="keywords" content="<?= META_KEYWORDS; ?>"/>
    <link rel="stylesheet" type="text/css" href="/public/css/minishop.css">
    <script src='https://www.google.com/recaptcha/api.js'></script>
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
        <li><a href="/register">Inscription</a></li>
        <li><a href="/login">Connexion</a></li>
        <li><a href="/orders">Commandes</a></li>
        <li><a href="/cart">Panier</a></li>
        <li><a class="button-admin" href="/admin">Admin</a></li>
        <li><a class="button-logout" href="/logout">Déconnexion</a></li>
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

