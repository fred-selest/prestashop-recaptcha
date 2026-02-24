<?php

global $_MODULE;
$_MODULE = [];

// Module information
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha'] = 'Google reCAPTCHA';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_desc'] = 'Protégez les formulaires de votre boutique avec Google reCAPTCHA v2 et v3';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_confirm'] = 'Êtes-vous sûr de vouloir désinstaller ce module ?';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_warning'] = 'Le module reCAPTCHA doit être configuré avec vos clés API.';

// Configuration page
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_config_title'] = 'Configuration reCAPTCHA';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_settings_saved'] = 'Paramètres mis à jour avec succès.';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_keys_required'] = 'La clé du site et la clé secrète sont obligatoires.';

// Form fields
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_enable'] = 'Activer reCAPTCHA';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_enable_desc'] = 'Activer ou désactiver la protection reCAPTCHA';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_enabled'] = 'Activé';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_disabled'] = 'Désactivé';

$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_site_key'] = 'Clé du site';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_site_key_desc'] = 'Votre clé de site Google reCAPTCHA. Obtenez-la sur';

$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_secret_key'] = 'Clé secrète';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_secret_key_desc'] = 'Votre clé secrète Google reCAPTCHA';

$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_version'] = 'Version reCAPTCHA';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_version_desc'] = 'Sélectionnez la version de reCAPTCHA';

$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_theme'] = 'Thème';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_theme_desc'] = 'Thème reCAPTCHA (v2 uniquement)';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_light'] = 'Clair';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_dark'] = 'Sombre';

$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_size'] = 'Taille';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_size_desc'] = 'Taille reCAPTCHA (v2 uniquement)';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_normal'] = 'Normal';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_compact'] = 'Compact';

$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_min_score'] = 'Score minimum (v3)';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_min_score_desc'] = 'Score minimum requis pour reCAPTCHA v3 (0.0 à 1.0, recommandé : 0.5)';

$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_forms'] = 'Formulaires protégés';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_forms_select'] = 'Sélectionnez les formulaires à protéger';

$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_contact_form'] = 'Formulaire de contact';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_contact_form_desc'] = 'Protéger le formulaire de contact';

$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_customer_form'] = 'Formulaire d\'inscription client';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_customer_form_desc'] = 'Protéger le formulaire d\'inscription client';

$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_yes'] = 'Oui';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_no'] = 'Non';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_save'] = 'Enregistrer';

// Validation messages
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_validation_required'] = 'Veuillez compléter la vérification reCAPTCHA.';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_validation_failed'] = 'La vérification reCAPTCHA a échoué. Veuillez réessayer.';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_score_low'] = 'Score reCAPTCHA trop bas. Veuillez réessayer.';
$_MODULE['<{psrecaptcha}prestashop>psrecaptcha_error'] = 'Une erreur est survenue lors de la validation reCAPTCHA.';
