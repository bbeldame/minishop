<?php
$datas = ["l-username", "l-password", "l-submit"];
$isset = true;

foreach ($datas as $d)
  if (!isset($_POST[$d]))
    $isset = false;

if ($isset) {
  if ($_POST["l-submit"] === "Se connecter")
  {
    if (empty($_POST["l-username"]))
      errorRedirect("Nom d'utilisateur vide !", "/login");

    if (empty($_POST["l-password"]))
      errorRedirect("Mot de passe vide !", "/login");
    if (verifyLogin($_POST["l-username"], $_POST["l-password"]) !== false) {
      $_SESSION["username"] = $_POST["l-username"];
      $_SESSION["rights"] = getRightsOfUser($_POST["l-username"]);
      $_SESSION["id"] = getIdUser($_POST["l-username"]);
      addCookieUser($_POST["l-username"]);
      successRedirect("Tu es maintenant connecté, ".$_POST["l-username"], "/");
    } else {
      errorRedirect("Nom d'utilisateur ou mot de passe invalide", "/login");
    }
  }
  else {
    redirect("/login");
  }
}
else
  redirect("/login");

?>
