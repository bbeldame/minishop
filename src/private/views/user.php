<div class="page-header">Modification compte utilisateur</div>

<div class="form_template">
    <form action="/forms/changeuser" method="POST">
        <div class="section"><span>1</span>Modification du mot de passe</div>
        <div class="inner-wrap">
            <label>Mot de passe actuel <input type="password" name="l-oldpassword" /></label>
            <label>Nouveau mot de passe <input type="password" name="l-newpassword" /></label>
        </div>
        <div class="button-section text-center">
            <input type="submit" class="action article-button article-buy" name="l-submit" value="Changer le mot de passe">
        </div>
    </form>
</div>