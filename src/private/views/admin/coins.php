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

        <tr>
            <td><img src="https://files.coinmarketcap.com/static/img/coins/32x32/bitcoin.png" alt="" /></td>
            <td>Bitcoin</td>
            <td>$243 294 470 614</td>
            <td>$14 481,20</td>
            <td>$12 280 000 000</td>
            <td>4,64%</td>
            <td>$12 280 000</td>
            <td style="text-align: center"><button>Edit</button> | <button>Remove</button></td>
        </tr>

        <tr>
            <td><img src="https://files.coinmarketcap.com/static/img/coins/32x32/ethereum.png" alt="" /></td>
            <td>Ethereum</td>
            <td>$132 400 874 475</td>
            <td>$1 365,57</td>
            <td>$4 982 010 000</td>
            <td>8,79%</td>
            <td>$3 280 000</td>
            <td style="text-align: center"><button>Edit</button> | <button>Remove</button></td>
        </tr>
    </table>
</div>