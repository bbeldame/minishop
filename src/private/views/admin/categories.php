<div class="page-header">Admin panel : manage Categories</div>
<div class="form_template">
    <h2>Add category</h2>

    <div class="inner-wrap">
        <label>Name <input type="text" id="name"/></label>
    </div>
    <div class="button-section text-center">
        <button onclick="clickAddCategory()">Add</button>
    </div>

</div>

<div class="table-elements">
    <?php
    $categories = getAllCategories();
    if (is_null($categories))
    echo "<div align='center'>Aucune catégories en liste</div>";
    else {
    ?>
    <table cellspacing="0">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Edition</th>
        </tr>
        <?php
        }
        if (!is_null($categories))
        foreach ($categories as $k => $v) { ?>
        <tr>
            <td><?= $v['id'] ?></td>
            <td><?= $v['name'] ?></td>
            <td style="text-align: center"><button><a href="/admin/category/<?= $v['id'] ?>">Edit</a></button> | <button onclick="clickRemoveCategory(<?= $v['id'] ?>)">Remove</button></td>
        </tr>
        <?php } ?>
    </table>
</div>