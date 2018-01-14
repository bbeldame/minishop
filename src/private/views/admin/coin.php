<?php
    if (!coinExist($_GET[3]))
        redirect(404);
    $coin = getOneCoin($_GET[3]);
    var_infos($coin);
?>

<div class="page-header">Admin panel : manage </div>
