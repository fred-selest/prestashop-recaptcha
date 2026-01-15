{**
 * PrestaShop reCAPTCHA Module
 * Template for displaying reCAPTCHA widget
 *}

<div class="form-group psrecaptcha-container">
    {if $version == 'v3'}
        <input type="hidden" name="g-recaptcha-response-v3" id="g-recaptcha-response-v3" value="">
        <script>
            grecaptcha.ready(function() {
                grecaptcha.execute('{$site_key}', {action: 'submit'}).then(function(token) {
                    document.getElementById('g-recaptcha-response-v3').value = token;
                });
            });
        </script>
    {elseif $version == 'v2_invisible'}
        <div class="g-recaptcha"
             data-sitekey="{$site_key}"
             data-size="invisible"
             data-callback="onRecaptchaSuccess">
        </div>
    {else}
        <div class="g-recaptcha"
             data-sitekey="{$site_key}"
             data-theme="{$theme}"
             data-size="{$size}">
        </div>
    {/if}
</div>

<style>
    .psrecaptcha-container {
        margin: 15px 0;
    }
</style>
