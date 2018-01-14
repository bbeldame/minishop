<?php

if (!categoryExist($_GET[3]))
    redirect(404);
$category = getOneCategory($_GET[3]);
?>

<div class="page-header">Admin panel : edit <?= $category['name'] ?> (<?= $category['id']?>)</div>
<div class="form_template">
    <h2>Edit category</h2>

    <div class="inner-wrap">
        <label>Name <input type="text" id="name" value="<?= $category['name'] ?>"/></label>
    </div>
    <div class="button-section text-center">
        <button onclick="clickEditCategory(<?= $category['id'] ?>)">Add</button>
    </div>

</div>

