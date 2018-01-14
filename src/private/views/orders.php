<?php
    $query = "SELECT total_paid, paid_date, id
        FROM users_orders_template
        WHERE users_template_id=".$_SESSION['id'].";";
    $results = rawQuery($query, true);
    if (!$results) { ?>
        <div align="center" style="margin: 45px auto">
            Vous n'avez encore rien commandé, hop hop hop il faut s'y mettre !
        </div>
    <?php
        exit;
    }
?>

<div class="page-header">Mes commandes</div>

<div class="table-elements">
    <table cellspacing="0">
        <tr>
            <th>#</th>
            <th>Prix payé</th>
            <th>Date de paiement</th>
            <th>Détails</th>
        </tr>

        <?php
            foreach ($results as $k => $v) { ?>
        <tr>
            <td><?= $k + 1 ?></td>
            <td><?= $v['total_paid'] ?> euros</td>
            <td><?= $v['paid_date'] ?></td>
            <td style="text-align: center"><button><a href="/order/<?= $v['id'] ?>">Voir</a></button></td>
        </tr>
        <?php } ?>
    </table>
</div>