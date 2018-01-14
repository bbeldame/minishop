<?php $coins = getAllCoins(); ?>
<div class="page-header">Les coins en vente</div>

<?php if (!is_null($coins)) { ?>
<div class="form_template">
    <h2>Catégories</h2>
    <select id="categories" onchange="filterCategories();">
        <option value="0" selected>Toutes</option>
        <?php foreach (getAllCategories() as $category) { ?>
            <option value="<?php echo $category['id']?>"><?php echo $category['name']?></option>
        <?php } ?>
    </select>
</div>
<?php } ?>


<div class="table-elements">
    <?php
    if (is_null($coins))
    echo "<div align='center'>Aucune coins en liste</div>";
    else {
    ?>
    <table cellspacing="0">
        <tr>
            <th>Coin</th>
            <th>Nom</th>
            <th>Marketcap</th>
            <th>Prix</th>
            <th>Stock</th>
            <th>Change (24h)</th>
            <th>Acheter</th>
        </tr>

        <script>
            function addCoin(ctx) {
                var coinID = ctx.getAttribute('coinid');
                var coinName = ctx.getAttribute('coinname');
                var quantity = ctx.parentNode.firstChild.firstChild.value;
                ajaxData('/cart/add', { coinID: coinID, quantity: quantity }, function (e) {
                    if (e.success === true) {
                        showAlert("success", quantity + " "+ coinName + " ajouté" + (quantity > 1 ? "s" : "") + " avec succès !");
                        document.getElementById('basket').innerHTML = 'Panier ('+e.newQuantity+')';
                    } else {
                        showAlert("error", e.error);
                        setTimeout(function () {
                            window.location.reload(1);
                        }, 800);
                    }
                });
            }
        </script>

        <?php
        }
        if (!is_null($coins))
            foreach ($coins as $k => $v) {
                $class = "";
                foreach ($v['categories'] as $kk => $vv) {
                    $class .= "cat-" . $vv['id'] . " ";
                } ?>
                <tr class="coin-element <?= $class ?>">
                    <td><img src="https://files.coinmarketcap.com/static/img/coins/32x32/<?= str_replace(' ', '-', strtolower($v['name'])) ?>.png" alt="" /></td>
                    <td><?= ucfirst(strtolower ($v['name'])) ?></td>
                    <td><?= number_format($v['market_cap'], 0, ',', ' '); ?> euros</td>
                    <td><?= number_format($v['price'], 4, ',', ' '); ?> euros</td>
                    <td><?= $v["stock"] ?></td>
                    <td><?= $v['percent_change_24h'] ?>%</td>
                    <td style="text-align: center"><span class='input-number-wrapper'><input value="1" type="number" min="1" step="1"></span><button coinName="<?= $v["name"] ?>" coinID="<?= $v['id'] ?>" onclick="addCoin(this)">Ajouter</button></td>
                </tr>
        <?php } ?>
    </table>
</div>

<script language="javascript">
    var categories = document.getElementById("categories");
    var coins = document.getElementsByClassName("coin-element");
    function filterCategories() {
        var category = categories.options[categories.selectedIndex].value;
        Array.prototype.filter.call(coins, function(coin){
            if (category == 0)
                coin.style.display = 'table-row';
            else if (coin.classList.contains("cat-" + category))
                coin.style.display = 'table-row';
            else
                coin.style.display = 'none';
        });
    }
</script>