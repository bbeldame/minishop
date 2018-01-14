<div class="page-header">Inscription</div>

<div class="form_template">
    <form action="/forms/register" method="POST">
        <div class="section"><span>1</span>Vos informations</div>
        <div class="inner-wrap">
            <label>Nom d'utilisateur <input type="text" name="r-username" /></label>
        </div>

        <div class="section"><span>2</span>Email</div>
        <div class="inner-wrap">
            <label>Email <input type="email" name="r-email" /></label>
            <label>Confirmation de l'Email <input type="email" name="r-email-confirm" /></label>
        </div>

        <div class="section"><span>3</span>Mot de passe</div>
        <div class="inner-wrap">
            <label>Mot de passe <input type="password" name="r-password" /></label>
            <label>Confirmation du mot de passe <input type="password" name="r-password-confirm" /></label>
        </div>

        <div class="section"><span>4</span>Captcha</div>
        <div class="inner-wrap">
            <div class="g-recaptcha" data-sitekey="6LdmmkAUAAAAAE0ZSbdcdbsAFakrKdfumHBLv5WF"></div>
        </div>
        <div class="button-section text-center">
            <input type="submit" class="action article-button article-buy" name="r-submit" value="Valider">
        </div>
    </form>
</div>