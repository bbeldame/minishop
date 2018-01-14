<div class="page-header">Admin panel : manage Coins</div>
<div class="form_template">
    <h2>Add new Coin</h2>
    <form action="/forms/admin/coin/add" method="POST">
        <div class="section"><span>1</span>Pick a coin</div>
        <div class="inner-wrap">
            <label>Name <input type="text" name="c-add-name" /></label>
        </div>
        <div class="section"><span>2</span>Pick categories</div>
        <div class="inner-wrap">
            <select size="4" multiple>
                <option value="coin">Coin</option>
                <option value="token">Token</option>
                <option value="altcoin">Altcoin</option>
            </select>
        </div>
        <div class="section"><span>3</span>More infos</div>
        a voir ?
        <div class="button-section text-center">
            <input type="submit" class="action" name="l-submit" value="Add">
        </div>
    </form>
</div>

<div class="table-elements">
    <table cellspacing="0">
        <tr>
            <th>Coin</th>
            <th>Name</th>
            <th>Marketcap</th>
            <th>Price</th>
            <th>Volume (24h)</th>
            <th>Change (24h)</th>
            <th>Quantity</th>
            <th>Edition</th>
        </tr>
        <?php $query = "SELECT * FROM coins_template";
        foreach (rawQuery(connectDB(), $query, true) as $k => $v) { ?>
        <tr>
            <td><img src="https://files.coinmarketcap.com/static/img/coins/32x32/<?= $v['name'] ?>.png" alt="" /></td>
            <td><?= ucfirst(strtolower ($v['name'])) ?></td>
            <td>$243 294 470 614</td>
            <td>$<?= $v['price'] ?></td>
            <td>$12 280 000 000</td>
            <td>4,64%</td>
            <td>$12 280 000</td>
            <td style="text-align: center"><button>Edit</button> | <button>Remove</button></td>
        </tr>
        <?php } ?>
    </table>
</div>