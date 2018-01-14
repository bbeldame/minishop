<?php
    function selectCategory($id, $categoriesCoin) {
        foreach ($categoriesCoin as $k => $v)
            if ($v['id'] == $id)
                return "selected";
        return "";
    }

    if (!coinExist($_GET[3]))
        redirect(404);
    $coin = getOneCoin($_GET[3]);
?>

<div class="page-header">Admin panel : edit <?= $coin['name'] ?> (<?= $coin['id']?>)</div>

<div class="form_template">
    <h2>Edit coin</h2>

    <div class="section"><span>1</span>Stock</div>
    <div class="inner-wrap">
        <label>Stock</label>
        <input value="<?= $coin['stock'] ?>" id="stock" type="number" min="1" step="1">
    </div>
    <div class="section"><span>2</span>Categories</div>
    <div class="inner-wrap">
        <label>Categories</label>
        <select id="categories" size="4" multiple>
            <?php
            foreach (getAllCategories() as $k => $v) { ?>
                <option <?= selectCategory($v['id'], $coin['categories'])?> value="<?= $v['id'] ?>"><?= ucfirst(strtolower ($v['name'])) ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="button-section text-center">
        <button onclick="clickEditCoin(<?= $coin['id'] ?>)">Edit</button>
    </div>

</div>