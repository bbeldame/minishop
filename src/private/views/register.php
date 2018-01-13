<div class="page-header">Register</div>

<div class="form_template">
    <form action="/forms/register" method="POST">
        <div class="section"><span>1</span>About you</div>
        <div class="inner-wrap">
            <label>Username <input type="text" name="r-username" /></label>
        </div>

        <div class="section"><span>2</span>Email</div>
        <div class="inner-wrap">
            <label>Email Address <input type="email" name="r-email" /></label>
            <label>Confirm Address <input type="email" name="r-email-confirm" /></label>
        </div>

        <div class="section"><span>3</span>Passwords</div>
        <div class="inner-wrap">
            <label>Password <input type="password" name="r-password" /></label>
            <label>Confirm Password <input type="password" name="r-password-confirm" /></label>
        </div>
        <div class="button-section text-center">
            <input type="submit" class="action article-button article-buy" name="r-submit" value="Register">
        </div>
    </form>
</div>