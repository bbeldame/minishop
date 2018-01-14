<div class="page-header">Admin panel : Manage Orders</div>

<?php

$orders = getAllOrders();
if (is_null($orders)) { ?>
    <div align="center" style="margin: 45px auto">
        Pas d'orders pour cet utilisateur.
    </div>
<?php } else { ?>
    <div class="table-elements">
        <table cellspacing="0">
            <tr>
                <th>#</th>
                <th>Prix payé</th>
                <th>Date de paiement</th>
                <th>Editions</th>
            </tr>

            <?php
            foreach ($orders as $k => $v) { ?>
                <tr>
                    <td><?= $v['id'] ?></td>
                    <td><?= $v['total_paid'] ?> euros</td>
                    <td><?= $v['paid_date'] ?></td>
                    <td style="text-align: center"><button><a href="/admin/order/<?= $v['id'] ?>">Voir</a></button> | <button onclick="clickRemoveOrder(<?= $v['id'] ?>)">Remove</button></td>
                </tr>
            <?php } ?>
        </table>
    </div>
<?php } ?>