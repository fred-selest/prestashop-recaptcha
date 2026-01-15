/**
 * PrestaShop reCAPTCHA Module
 * Frontend JavaScript for reCAPTCHA integration
 */

document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    // Check if reCAPTCHA configuration is available
    if (typeof psrecaptcha_version === 'undefined') {
        return;
    }

    /**
     * Handle reCAPTCHA v2 Invisible
     */
    if (psrecaptcha_version === 'v2_invisible') {
        // Find forms with reCAPTCHA
        var forms = document.querySelectorAll('form');

        forms.forEach(function(form) {
            var recaptchaDiv = form.querySelector('.g-recaptcha');

            if (recaptchaDiv) {
                form.addEventListener('submit', function(e) {
                    // Check if reCAPTCHA response exists
                    var response = form.querySelector('[name="g-recaptcha-response"]');

                    if (!response || !response.value) {
                        e.preventDefault();

                        // Execute invisible reCAPTCHA
                        if (typeof grecaptcha !== 'undefined') {
                            var widgetId = recaptchaDiv.getAttribute('data-widget-id');

                            if (!widgetId) {
                                widgetId = grecaptcha.render(recaptchaDiv, {
                                    'sitekey': psrecaptcha_site_key,
                                    'size': 'invisible',
                                    'callback': function() {
                                        form.submit();
                                    }
                                });
                                recaptchaDiv.setAttribute('data-widget-id', widgetId);
                            }

                            grecaptcha.execute(widgetId);
                        }
                    }
                });
            }
        });
    }

    /**
     * Handle reCAPTCHA v3
     */
    if (psrecaptcha_version === 'v3') {
        var forms = document.querySelectorAll('form');

        forms.forEach(function(form) {
            var recaptchaInput = form.querySelector('#g-recaptcha-response-v3');

            if (recaptchaInput) {
                form.addEventListener('submit', function(e) {
                    if (!recaptchaInput.value) {
                        e.preventDefault();

                        if (typeof grecaptcha !== 'undefined') {
                            grecaptcha.ready(function() {
                                grecaptcha.execute(psrecaptcha_site_key, {action: 'submit'})
                                    .then(function(token) {
                                        recaptchaInput.value = token;
                                        form.submit();
                                    });
                            });
                        }
                    }
                });
            }
        });
    }

    /**
     * Refresh reCAPTCHA v3 token every 90 seconds
     * (reCAPTCHA v3 tokens expire after 2 minutes)
     */
    if (psrecaptcha_version === 'v3' && typeof grecaptcha !== 'undefined') {
        setInterval(function() {
            var recaptchaInputs = document.querySelectorAll('#g-recaptcha-response-v3');

            recaptchaInputs.forEach(function(input) {
                grecaptcha.ready(function() {
                    grecaptcha.execute(psrecaptcha_site_key, {action: 'submit'})
                        .then(function(token) {
                            input.value = token;
                        });
                });
            });
        }, 90000); // 90 seconds
    }

    /**
     * Handle form validation errors
     */
    window.onRecaptchaSuccess = function() {
        // Callback for v2 invisible
        var form = document.querySelector('form .g-recaptcha').closest('form');
        if (form) {
            form.submit();
        }
    };

    /**
     * Reset reCAPTCHA on form reset
     */
    var forms = document.querySelectorAll('form');

    forms.forEach(function(form) {
        form.addEventListener('reset', function() {
            if (psrecaptcha_version === 'v2' || psrecaptcha_version === 'v2_invisible') {
                if (typeof grecaptcha !== 'undefined') {
                    var recaptchaDiv = form.querySelector('.g-recaptcha');
                    if (recaptchaDiv) {
                        var widgetId = recaptchaDiv.getAttribute('data-widget-id');
                        if (widgetId) {
                            grecaptcha.reset(widgetId);
                        }
                    }
                }
            } else if (psrecaptcha_version === 'v3') {
                var recaptchaInput = form.querySelector('#g-recaptcha-response-v3');
                if (recaptchaInput) {
                    recaptchaInput.value = '';
                }
            }
        });
    });
});
