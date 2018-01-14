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
    <script language="javascript" src="/public/js/minishop.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/d3/4.7.2/d3.min.js"></script>
    <script src="/public/js/d3pie.min.js"></script>
</head>

<body>
<div id="alertDatas">
    <?php catchNotifications(); ?>
</div>
<div align="center">
    <a><img id="logo" src="/public/images/logo.png"/></a>
</div>
<div id="menu">
    <ul>
        <li><a href="/">Accueil</a></li>
        <?php if (!isConnectedUser()) { ?>
        <li><a href="/register">Inscription</a></li>
        <li><a href="/login">Connexion</a></li>
        <?php } ?>
        <?php if (isConnectedUser()) { ?>
        <li><a href="/orders">Commandes</a></li>
        <?php } ?>
        <li><a id="basket" href="/cart">Panier (<?= getTotalCart() ?>)</a></li>
        <?php if (isConnectedUser()) { ?>
        <li><a href="/user">Compte</a></li>
        <?php } ?>
        <?php if (isAdmin()) { ?>
        <li><a class="button-admin" href="/admin">Admin</a></li>
        <?php } ?>
        <?php if (isConnectedUser()) { ?>
        <li><a class="button-logout" href="/logout">Déconnexion</a></li>
        <?php } ?>
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

