<?php
    function convertRightToString($right) {
        switch ($right) {
            case 1:
                return "Utilisateur";
            case 3:
                return "Administrateur";
        }
    }
?>

<div class="page-header">Admin panel : manage Users</div>

<div class="table-elements">
    <?php
    $users = getAllUsers();
    if (is_null($users))
    echo "<div align='center'>Aucune coins en liste</div>";
    else {
    ?>
    <table cellspacing="0">
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Right</th>
            <th>Edit</th>
        </tr>
        <?php
        }
        if (!is_null($users))
        foreach ($users as $k => $v) { ?>
        <tr>
            <td><?= $v['username'] ?></td>
            <td><?= $v['email'] ?></td>
            <td><?= convertRightToString($v['right'])?> (<?= $v['right'] ?>)</td>
            <td style="text-align: center"><button><a href="/admin/user/<?= $v['id'] ?>">Edit</a></button> | <button onclick="clickRemoveUser(<?= $v['id'] ?>)">Remove</button></td>
        </tr>
        <?php } ?>
    </table>
</div>