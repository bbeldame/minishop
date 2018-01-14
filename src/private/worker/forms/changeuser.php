<?php
$datas = ["l-oldpassword", "l-newpassword", "l-submit"];
$isset = true;

foreach ($datas as $d)
  if (!isset($_POST[$d]))
    $isset = false;

if ($isset) {
  if ($_POST["l-submit"] === "Changer le mot de passe")
  {
    if (empty($_POST["l-oldpassword"]))
      errorRedirect("Ancien mot de passe vide !", "/user");
    if (empty($_POST["l-newpassword"]))
      errorRedirect("Nouveau mot de passe vide !", "/user");
    if (changePassword($_POST["l-oldpassword"], $_POST["l-newpassword"]) !== false) {
      successRedirect("Mot de passe changé avec succès.", "/");
    } else {
      errorRedirect("Mot de passe invalide", "/user");
    }
  }
  else {
    redirect("/user");
  }
}
else
  redirect("/user");

?>
