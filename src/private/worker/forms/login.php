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
      // ICI METTRE LE SESSION DU USER @todo
      // Jai fais la function qui recupere le rights aussi : getRightsOfUser($username)
      successRedirect("Tu as les droits ".getRightsOfUser($_POST["l-username"]), "/");
      // successRedirect("Tu es maintenant connecté, ".$_POST["l-username"], "/");
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
