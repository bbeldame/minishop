<?php
    $query = "SELECT ct.price, ct.stock, ct.market_cap, ct.percent_change_1h,
        ct.percent_change_24h, ct.percent_change_7d,
        ct.volume_24h,
        ct.name, ct.id, GROUP_CONCAT(cc.name)
        FROM coins_template ct
        JOIN coins_template_has_coins_categories_template ci
        ON ct.id=ci.coins_template_id
        JOIN coins_categories_template cc
        ON cc.id=ci.coins_categories_template_id
        GROUP BY ct.id;";
    $results = rawQuery($query, true);
?>

<div class="page-header">Les coins en vente</div>

<div class="table-elements">
    <table cellspacing="0">
        <tr>
            <th>Coin</th>
            <th>Nom</th>
            <th>Marketcap</th>
            <th>Prix</th>
            <th>Volume (24h)</th>
            <th>Change (24h)</th>
            <th>Acheter</th>
        </tr>

        <?php
            foreach ($results as $k => $v) { ?>
        <tr>
            <td><img src="https://files.coinmarketcap.com/static/img/coins/32x32/<?= $v["name"] ?>.png" alt="" /></td>
            <td><?= ucfirst(strtolower ($v['name'])) ?></td>
            <td>$<?= $v['market_cap'] ?></td>
            <td>$<?= $v['price'] ?></td>
            <td>$<?= $v['volume_24h'] ?></td>
            <td><?= $v['percent_change_24h'] ?>%</td>
            <td style="text-align: center"><span class='input-number-wrapper'><input value="1" type="number" min="1" step="1"></span><button>Ajouter</button></td>
        </tr>
        <?php } ?>
    </table>
</div>