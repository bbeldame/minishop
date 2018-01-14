<div class="page-header">Les coins en vente</div>

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
            <th>Nom</th>
            <th>Marketcap</th>
            <th>Prix</th>
            <th>Volume (24h)</th>
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
                    }
                });
            }
        </script>

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
            <td><?= $v['percent_change_24h'] ?>%</td>
            <td style="text-align: center"><span class='input-number-wrapper'><input value="1" type="number" min="1" step="1"></span><button coinName="<?= $v["name"] ?>" coinID="<?= $v['id'] ?>" onclick="addCoin(this)">Ajouter</button></td>
        </tr>
        <?php } ?>
    </table>
</div>