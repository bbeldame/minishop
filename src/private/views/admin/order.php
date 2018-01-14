<?php

if (!orderExist($_GET[3]))
    redirect(404);
$order = getOneOrder($_GET[3]);
?>

<div class="page-header">Admin panel : Order (#<?= $order['id'] ?>)</div>

<div class="table-elements">
    <table cellspacing="0">
        <tr>
            <th>Coin</th>
            <th>Nom</th>
            <th>Quantité achetée</th>
            <th>Prix unitaire</th>
            <th>Prix total</th>
        </tr>

        <?php
        foreach ($order['details'] as $k => $v) { ?>
            <tr>
                <td><img src="https://files.coinmarketcap.com/static/img/coins/32x32/<?= str_replace(' ', '-', strtolower($v['name'])) ?>.png" alt="" /></td>
                <td><?= ucfirst(strtolower ($v['name'])) ?></td>
                <td><?= $v['quantity'] ?></td>
                <td><?= $v['price'] ?></td>
                <td style="text-align:center"><?= $v['quantity'] * $v['price'] ?></td>
            </tr>
        <?php } ?>
    </table>
</div>

<div class="total-price">
    <label>Prix total de la commande: <?= $order['total_paid'] ?> euros</label>
</div>
