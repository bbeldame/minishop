<?php
    if (!userExist($_GET[3]))
        redirect(404);
    $user = getOneUser($_GET[3]);
?>

<div class="page-header">Admin panel : <?= $user['username'] ?> (<?= $user['id'] ?>)</div>

<div class="form_template">
    <h2>Edit coin</h2>

    <div class="section"><span>1</span>Droit</div>
    <div class="inner-wrap">
        <label>Niveau d'access</label>
        <select id="rights">
            <option <?php if (!isAdmin()) echo "selected" ?> value="1">Utilisateur</option>
            <option <?php if (isAdmin()) echo "selected" ?> value="3">Administrateur</option>
        </select>
    </div>
    <div class="button-section text-center">
        <button onclick="clickEditUser(<?= $user['id'] ?>)">Edit</button>
    </div>
</div>

<?php

$orders = getAllUserOrders($user['id']);
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

