<?php
    $query = "SELECT cb.quantity, ct.price, ct.name, uot.total_paid
        FROM coins_bought cb
        INNER JOIN coins_template ct
        ON ct.id=cb.coins_template_id
        INNER JOIN users_orders_template uot
        ON uot.id=cb.users_orders_template_id
        WHERE uot.id=".$_GET[2].";";
    $results = rawQuery($query, true);
?>

<div class="page-header">Commande #<?= $_GET[2]?> </div>

<div class="table-elements">
    <table cellspacing="0">
        <tr>
            <th>Coin</th>
            <th>Nom</th>
            <th>Quantité achetée</th>
            <th>Prix unitaire</th>
            <th>Prix total</th>
        </tr>

        <?php
        foreach ($results as $k => $v) { ?>
            <tr>
                <td><img src="https://files.coinmarketcap.com/static/img/coins/32x32/<?= str_replace(' ', '-', strtolower($v['name'])) ?>.png" alt="" /></td>
                <td><?= ucfirst(strtolower ($v['name'])) ?></td>
                <td><?= $v['quantity'] ?></td>
                <td><?= $v['price'] ?></td>
                <td style="text-align:center"><?= $v['quantity'] * $v['price'] ?></td>
            </tr>
        <?php } ?> 
    </table>
</div>

<div class="total-price">
    <label>Prix total de la commande: <?= $results[0]['total_paid'] ?> euros</label>
</div>

<div style="display:none;" id="lolpie" orderid="<?= $_GET[2] ?>"></div>

<div id="pieChart"></div>

<script>

var pie = new d3pie("pieChart", {
	"size": {
		"canvasWidth": 590,
		"pieOuterRadius": "90%"
	},
	"data": {
		"sortOrder": "value-desc",
		"content": [],
	},
	"labels": {
		"outer": {
			"pieDistance": 32
		},
		"inner": {
			"hideWhenLessThanPercentage": 3
		},
		"mainLabel": {
			"fontSize": 11
		},
		"percentage": {
			"color": "#ffffff",
			"decimalPlaces": 0
		},
		"value": {
			"color": "#adadad",
			"fontSize": 11
		},
		"lines": {
			"enabled": true
		},
		"truncation": {
			"enabled": true
		}
	},
	"effects": {
		"pullOutSegmentOnClick": {
			"effect": "linear",
			"speed": 400,
			"size": 8
		}
	},
	"misc": {
		"gradient": {
			"enabled": true,
			"percentage": 100
		}
	}
});

var node = document.getElementById("lolpie");
var orderId = node.getAttribute('orderid');
ajaxData('/cart/changequantity', { id: orderId }, function (e) {
    console.log('e', e);
});

</script>