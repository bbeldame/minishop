<div class="page-header">Admin panel : manage Categories</div>
<div class="form_template">
    <h2>Add category</h2>
    <form action="/forms/register" method="POST">
        <div class="inner-wrap">
            <label>Name <input type="text" name="c-add-name" /></label>
        </div>
        <div class="button-section text-center">
            <input type="submit" class="action" name="l-submit" value="Add">
        </div>
    </form>
</div>

<div class="table-elements">
    <table cellspacing="0">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Edition</th>
        </tr>

        <tr>
            <td>1</td>
            <td>Coin</td>
            <td style="text-align: center"><button>Edit</button> | <button>Remove</button></td>
        </tr>

        <tr>
            <td>2</td>
            <td>Token</td>
            <td style="text-align: center"><button>Edit</button> | <button>Remove</button></td>
        </tr>
    </table>
</div>