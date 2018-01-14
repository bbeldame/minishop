<?php
    $query = "SELECT cb.quantity, ct.price, ct.name, uot.total_paid
        FROM coins_bought cb
        INNER JOIN coins_template ct
        ON ct.id=cb.coins_template_id
        INNER JOIN users_orders_template uot
        ON uot.id=cb.users_orders_template_id
        WHERE uot.id=".$_GET[2].";";
    $results = rawQuery($query, true);
?>

<div class="page-header">Commande #<?= $_GET[2]?> </div>

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
        foreach ($results as $k => $v) { ?>
            <tr>
                <td><img src="https://files.coinmarketcap.com/static/img/coins/32x32/<?= $v["name"] ?>.png" alt="" /></td>
                <td><?= ucfirst(strtolower ($v['name'])) ?></td>
                <td><?= $v['quantity'] ?></td>
                <td><?= $v['price'] ?></td>
                <td style="text-align:center"><?= $v['quantity'] * $v['price'] ?></td>
            </tr>
        <?php } ?> 
    </table>
</div>

<div class="total-price">
    <label>Prix total de la commande: <?= $results[0]['total_paid'] ?> euros</label>
</div>