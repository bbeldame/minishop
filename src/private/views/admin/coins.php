<div class="page-header">Admin panel : manage Coins</div>
<div class="form_template">
    <h2>Add new Coin</h2>

    <div class="section"><span>1</span>Pick a coin</div>
    <div class="inner-wrap">
        <label>Name <input type="text" id="name"/></label>
    </div>
    <div class="section"><span>2</span>More infos</div>
    <div class="inner-wrap">
        <label>Stock</label>
        <input value="1" id="stock" type="number" min="1" step="1">
        <label>Categories</label>
        <select id="categories" size="4" multiple>
            <?php
            foreach (getAllCategories() as $k => $v) { ?>
            <option value="<?= $v['id'] ?>"><?= ucfirst(strtolower ($v['name'])) ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="button-section text-center">
        <button onclick="clickAddCoin()">Add</button>
    </div>

</div>

<div class="table-elements">
    <?php
        $coins = getAllCoins();
        if (is_null($coins))
            echo "<div align='center'>Aucune coins en liste</div>";
        else {
    ?>
    <table cellspacing="0">
        <tr>
            <th>Coin</th>
            <th>Name</th>
            <th>Marketcap</th>
            <th>Price</th>
            <th>Volume (24h)</th>
            <th>Change (1h)</th>
            <th>Change (24h)</th>
            <th>Change (7d)</th>
            <th>Quantity</th>
            <th>Edition</th>
        </tr>
        <?php
        }
        if (!is_null($coins))
        foreach ($coins as $k => $v) { ?>
        <tr>
            <td><img src="https://files.coinmarketcap.com/static/img/coins/32x32/<?= str_replace(' ', '-', strtolower($v['name'])) ?>.png" alt="" /></td>
            <td><?= ucfirst(strtolower ($v['name'])) ?></td>
            <td>$<?= $v['market_cap'] ?></td>
            <td>$<?= $v['price'] ?></td>
            <td>$<?= $v['volume_24h'] ?></td>
            <td><?= $v['percent_change_1h'] ?>%</td>
            <td><?= $v['percent_change_24h'] ?>%</td>
            <td><?= $v['percent_change_7d'] ?>%</td>
            <td><?= $v['stock'] ?></td>
            <td style="text-align: center"><button><a href="/admin/coin/<?= $v['id'] ?>">Edit</a></button> | <button onclick="clickDeleteCoin(this)" class="coin-remove" id="<?= $v['id'] ?>">Remove</button></td>
        </tr>
        <?php } ?>
    </table>
</div>