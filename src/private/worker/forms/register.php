<?php
  $datas = ["r-username", "r-email", "r-email-confirm", "r-password", "r-password-confirm", "r-submit", "g-recaptcha-response"];
  $isset = true;
  foreach ($datas as $d)
    if (!isset($_POST[$d]))
      $isset = false;
  if ($isset) {
    if ($_POST["r-submit"] === "Valider")
    {
      // username
      if (empty($_POST['r-username']))
        errorRedirect("Il nous faut votre nom d'utilisateur!", "/register");
      if (!ctype_alpha($_POST["r-username"]))
        errorRedirect("Format de nom non valide!", "/register");
      if (!(strlen($_POST["r-username"]) >= 2 && strlen($_POST["r-first-name"]) <= 24))
        errorRedirect("Le nom d'utilisateur doit être compris entre 2 et 24 caractères!", "/register");
      if (doesUserExistsByUsername($_POST['r-email']))
        errorRedirect("Username déjà utilisé!", "/register");

      // email
      if (empty($_POST["r-email"]) || empty($_POST["r-email-confirm"]))
        errorRedirect("Il nous faut votre email!", "/register");
      if (strcmp($_POST["r-email"], $_POST["r-email-confirm"]) != 0)
        errorRedirect("La confirmation d'email ne correspond pas!", "/register");
      if (!filter_var($_POST["r-email"], FILTER_VALIDATE_EMAIL))
        errorRedirect("Email non valide!", "/register");
      if (doesUserExistsByMail($_POST['r-email']))
        errorRedirect("Email déjà utilisé!", "/register");

      // password
      if (empty($_POST["r-password"]) || empty($_POST["r-password-confirm"]))
        errorRedirect("Il nous faut un mot de passe!", "/register");
      if (strcmp($_POST["r-password"], $_POST["r-password-confirm"]) != 0)
        errorRedirect("La confirmation de mot de passe ne correspond pas!", "/register");

      // captcha
      if (empty($_POST["g-recaptcha-response"]))
        errorRedirect("Vous devez valider le captcha!", "/register");

      // all good
      if (registerUser($_POST['r-username'], $_POST["r-email"], $_POST["r-password"]) !== false) {
        $_SESSION["username"] = $_POST["r-username"];
        $_SESSION["rights"] = 1;
        $_SESSION["id"] = getIdUser($_POST["r-username"]);
        addCookieUser($_POST["r-username"]);
        mail($_POST["r-email"], "Merci de ton inscription".$_POST["r-username"], "Toute l'équipe de CryptoBasket te souhaite la bienvenue et espère que les courbes te seront favorables !");
        successRedirect("Tu es maintenant connecté, ".$_POST["r-username"], "/");
      }
    } else {
      redirect("/register");
    }
  }
  else
    redirect("/register");
?>
