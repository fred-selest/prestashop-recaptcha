<?php

global $_MODULE;
$_MODULE = [];

// Module information
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha'] = 'Google reCAPTCHA';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_desc'] = 'Protect your store forms with Google reCAPTCHA v2 and v3';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_confirm'] = 'Are you sure you want to uninstall this module?';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_warning'] = 'reCAPTCHA module needs to be configured with your API keys.';

// Configuration page
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_config_title'] = 'reCAPTCHA Configuration';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_settings_saved'] = 'Settings updated successfully.';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_keys_required'] = 'Site Key and Secret Key are required.';

// Form fields
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_enable'] = 'Enable reCAPTCHA';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_enable_desc'] = 'Enable or disable reCAPTCHA protection';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_enabled'] = 'Enabled';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_disabled'] = 'Disabled';

$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_site_key'] = 'Site Key';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_site_key_desc'] = 'Your Google reCAPTCHA Site Key. Get it from';

$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_secret_key'] = 'Secret Key';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_secret_key_desc'] = 'Your Google reCAPTCHA Secret Key';

$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_version'] = 'reCAPTCHA Version';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_version_desc'] = 'Select reCAPTCHA version';

$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_theme'] = 'Theme';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_theme_desc'] = 'reCAPTCHA theme (v2 only)';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_light'] = 'Light';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_dark'] = 'Dark';

$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_size'] = 'Size';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_size_desc'] = 'reCAPTCHA size (v2 only)';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_normal'] = 'Normal';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_compact'] = 'Compact';

$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_min_score'] = 'Minimum Score (v3)';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_min_score_desc'] = 'Minimum score required for reCAPTCHA v3 (0.0 to 1.0, recommended: 0.5)';

$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_forms'] = 'Protected Forms';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_forms_select'] = 'Select which forms to protect';

$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_contact_form'] = 'Contact Form';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_contact_form_desc'] = 'Protect contact form';

$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_customer_form'] = 'Customer Registration Form';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_customer_form_desc'] = 'Protect customer registration form';

$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_yes'] = 'Yes';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_no'] = 'No';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_save'] = 'Save';

// Validation messages
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_validation_required'] = 'Please complete the reCAPTCHA verification.';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_validation_failed'] = 'reCAPTCHA verification failed. Please try again.';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_score_low'] = 'reCAPTCHA score too low. Please try again.';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_error'] = 'An error occurred during reCAPTCHA validation.';
