<?php
    $cart = cookieCartToArray();

    if (empty($cart)) { ?>
        <div align="center" style="margin: 45px auto">
            Votre panier est vide !
        </div>
    <?php
        exit;
    }
?>

<script>
    function removeCoin(ctx) {
        var coinID = ctx.getAttribute('coinid');
        var coinName = ctx.getAttribute('coinname');
        ajaxData('/cart/rm', { coinID: coinID }, function (e) {
            if (e.success === true) {
                showAlert("success", "Vous avez supprimé " + coinName + " de votre panier !");
                setTimeout(function () {
                    window.location.reload(1);
                }, 800);
            }
        });
    }
    function changeQuantity(ctx) {
        var coinID = ctx.getAttribute('coinid');
        var coinname = ctx.getAttribute('coinname');
        var quantity = ctx.value;
        ajaxData('/cart/changequantity', { coinID: coinID, quantity: quantity }, function (e) {
            if (e.success) {
                showAlert("success", "Vous avez changé la quantité de "+coinname);
                setTimeout(function () {
                    window.location.reload(1);
                }, 800);
            } else {
                showAlert("error", e.error);
                setTimeout(function () {
                    window.location.reload(1);
                }, 800);
            }
        });
    }
    function pay(ctx) {
        ajaxData('/cart/pay', {}, function (e) {
            if (e.success) {
                showAlert("success", "Votre paiement a bien été effectuée.");
                setTimeout(function () {
                    window.location = "/order/"+e.orderId;
                }, 800);
            } else if (e.err === "pasco") {
                showAlert("error", "Vous devez vous connecter pour payer !");
                setTimeout(function () {
                    window.location = "/login";
                }, 800);
            } else {
                showAlert("error", "Une erreur s'est produite lors du paiement !");
                setTimeout(function () {
                    window.location.reload(1);
                }, 800);
            }
        });
    }
    function emptyBasket(ctx) {
        ajaxData('/cart/emptybasket', {}, function (e) {
            if (e.success) {
                showAlert("success", "Votre panier a bien été vidé.");
                setTimeout(function () {
                    window.location = "/";
                }, 800);
            }
        });
    }
    </script>

<div class="page-header">Panier</div>

<div class="table-elements">
    <table cellspacing="0">
        <tr>
            <th>Coin</th>
            <th>Name</th>
            <th>Quantité</th>
            <th>Prix unitaire</th>
            <th>Prix total</th>
            <th>Supprimer</th>
        </tr>

        <?php
            foreach ($cart as $key => $item) {
                if (!coinExist($item["id"])) {
                    $coin = getOneCoin($item["id"]);
                    echo "<tr>Ce coin a été supprimé !</tr>";
                } else {
                    $coin = getOneCoin($item["id"]);
                ?>
        <tr>
            <td><img src="https://files.coinmarketcap.com/static/img/coins/32x32/<?= str_replace(' ', '-', strtolower($coin['name'])) ?>.png" alt="" /></td>
            <td><?= ucfirst(strtolower ($coin["name"])) ?></td>
            <td style="text-align: center"><span class='input-number-wrapper'>
                <input coinname="<?= $coin["name"] ?>" coinid="<?= $coin["id"] ?>" coinname="<?= $coin["name"] ?>" onchange="changeQuantity(this)" value="<?= $item["quantity"] ?>" type="number" step="1" min="1"></span></td>
            <td><?= $coin["price"] ?> euros</td>
            <td><?= $coin["price"] * $item["quantity"] ?> euros</td>
            <td style="text-align:center;"><button coinname="<?= $coin["name"] ?>" coinid="<?= $coin["id"] ?>" onclick="removeCoin(this)">Supprimer</button></td>
        </tr>

        <?php
            }} ?>
    </table>
</div>

<div class="total-price">
    <label>Prix total: <?= getTotalPriceOfCart() ?> euros</label>
    <button onclick="pay()" id="payButton">Payer</button>
    <button onclick="emptyBasket()">Vider le panier</button>
</div>