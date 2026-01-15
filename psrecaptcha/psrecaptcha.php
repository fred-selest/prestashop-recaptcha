<?php
/**
 * PrestaShop reCAPTCHA Module
 *
 * @author    PrestaShop Module
 * @copyright 2024-2026
 * @license   MIT License
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

// Load Composer autoloader for Google reCAPTCHA library
require_once dirname(__FILE__) . '/vendor/autoload.php';

use ReCaptcha\ReCaptcha;

class PsRecaptcha extends Module
{
    /**
     * Module constructor
     */
    public function __construct()
    {
        $this->name = 'psrecaptcha';
        $this->tab = 'front_office_features';
        $this->version = '1.0.3';
        $this->author = 'PrestaShop Module';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = [
            'min' => '8.0.0',
            'max' => _PS_VERSION_
        ];
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Google reCAPTCHA');
        $this->description = $this->l('Protect your store forms with Google reCAPTCHA v2 and v3');
        $this->confirmUninstall = $this->l('Are you sure you want to uninstall this module?');

        // Warning if not configured
        if ($this->active && (!Configuration::get('PSRECAPTCHA_SITE_KEY') || !Configuration::get('PSRECAPTCHA_SECRET_KEY'))) {
            $this->warning = $this->l('reCAPTCHA module needs to be configured with your API keys.');
        }
    }

    /**
     * Install module
     */
    public function install()
    {
        return parent::install()
            && $this->registerHook('displayHeader')
            && $this->registerHook('displayCustomerAccountForm')
            && $this->registerHook('displayContactForm')
            && $this->registerHook('actionContactFormSubmitBefore')
            && $this->registerHook('actionSubmitAccountBefore')
            && Configuration::updateValue('PSRECAPTCHA_SITE_KEY', '')
            && Configuration::updateValue('PSRECAPTCHA_SECRET_KEY', '')
            && Configuration::updateValue('PSRECAPTCHA_VERSION', 'v2')
            && Configuration::updateValue('PSRECAPTCHA_THEME', 'light')
            && Configuration::updateValue('PSRECAPTCHA_SIZE', 'normal')
            && Configuration::updateValue('PSRECAPTCHA_ENABLED', '0')
            && Configuration::updateValue('PSRECAPTCHA_CONTACT_FORM', '1')
            && Configuration::updateValue('PSRECAPTCHA_CUSTOMER_FORM', '1')
            && Configuration::updateValue('PSRECAPTCHA_V3_MIN_SCORE', '0.5');
    }

    /**
     * Uninstall module
     */
    public function uninstall()
    {
        return Configuration::deleteByName('PSRECAPTCHA_SITE_KEY')
            && Configuration::deleteByName('PSRECAPTCHA_SECRET_KEY')
            && Configuration::deleteByName('PSRECAPTCHA_VERSION')
            && Configuration::deleteByName('PSRECAPTCHA_THEME')
            && Configuration::deleteByName('PSRECAPTCHA_SIZE')
            && Configuration::deleteByName('PSRECAPTCHA_ENABLED')
            && Configuration::deleteByName('PSRECAPTCHA_CONTACT_FORM')
            && Configuration::deleteByName('PSRECAPTCHA_CUSTOMER_FORM')
            && Configuration::deleteByName('PSRECAPTCHA_V3_MIN_SCORE')
            && parent::uninstall();
    }

    /**
     * Module configuration page
     */
    public function getContent()
    {
        $output = '';

        if (Tools::isSubmit('submit' . $this->name)) {
            $siteKey = Tools::getValue('PSRECAPTCHA_SITE_KEY');
            $secretKey = Tools::getValue('PSRECAPTCHA_SECRET_KEY');
            $version = Tools::getValue('PSRECAPTCHA_VERSION');
            $theme = Tools::getValue('PSRECAPTCHA_THEME');
            $size = Tools::getValue('PSRECAPTCHA_SIZE');
            $enabled = Tools::getValue('PSRECAPTCHA_ENABLED');
            $contactForm = Tools::getValue('PSRECAPTCHA_CONTACT_FORM');
            $customerForm = Tools::getValue('PSRECAPTCHA_CUSTOMER_FORM');
            $minScore = Tools::getValue('PSRECAPTCHA_V3_MIN_SCORE');

            if (empty($siteKey) || empty($secretKey)) {
                $output .= $this->displayError($this->l('Site Key and Secret Key are required.'));
            } else {
                Configuration::updateValue('PSRECAPTCHA_SITE_KEY', $siteKey);
                Configuration::updateValue('PSRECAPTCHA_SECRET_KEY', $secretKey);
                Configuration::updateValue('PSRECAPTCHA_VERSION', $version);
                Configuration::updateValue('PSRECAPTCHA_THEME', $theme);
                Configuration::updateValue('PSRECAPTCHA_SIZE', $size);
                Configuration::updateValue('PSRECAPTCHA_ENABLED', $enabled);
                Configuration::updateValue('PSRECAPTCHA_CONTACT_FORM', $contactForm);
                Configuration::updateValue('PSRECAPTCHA_CUSTOMER_FORM', $customerForm);
                Configuration::updateValue('PSRECAPTCHA_V3_MIN_SCORE', $minScore);

                $output .= $this->displayConfirmation($this->l('Settings updated successfully.'));
            }
        }

        return $output . $this->displayForm();
    }

    /**
     * Display configuration form
     */
    public function displayForm()
    {
        $defaultLang = (int)Configuration::get('PS_LANG_DEFAULT');

        $fieldsForm = [
            'form' => [
                'legend' => [
                    'title' => $this->l('reCAPTCHA Configuration'),
                    'icon' => 'icon-cogs'
                ],
                'input' => [
                    [
                        'type' => 'switch',
                        'label' => $this->l('Enable reCAPTCHA'),
                        'name' => 'PSRECAPTCHA_ENABLED',
                        'is_bool' => true,
                        'desc' => $this->l('Enable or disable reCAPTCHA protection'),
                        'values' => [
                            [
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Enabled')
                            ],
                            [
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Disabled')
                            ]
                        ],
                    ],
                    [
                        'type' => 'text',
                        'label' => $this->l('Site Key'),
                        'name' => 'PSRECAPTCHA_SITE_KEY',
                        'size' => 50,
                        'required' => true,
                        'desc' => $this->l('Your Google reCAPTCHA Site Key. Get it from') . ' <a href="https://www.google.com/recaptcha/admin" target="_blank">https://www.google.com/recaptcha/admin</a>'
                    ],
                    [
                        'type' => 'text',
                        'label' => $this->l('Secret Key'),
                        'name' => 'PSRECAPTCHA_SECRET_KEY',
                        'size' => 50,
                        'required' => true,
                        'desc' => $this->l('Your Google reCAPTCHA Secret Key')
                    ],
                    [
                        'type' => 'select',
                        'label' => $this->l('reCAPTCHA Version'),
                        'name' => 'PSRECAPTCHA_VERSION',
                        'desc' => $this->l('Select reCAPTCHA version'),
                        'options' => [
                            'query' => [
                                ['id' => 'v2', 'name' => 'reCAPTCHA v2 (Checkbox)'],
                                ['id' => 'v3', 'name' => 'reCAPTCHA v3']
                            ],
                            'id' => 'id',
                            'name' => 'name'
                        ]
                    ],
                    [
                        'type' => 'select',
                        'label' => $this->l('Theme'),
                        'name' => 'PSRECAPTCHA_THEME',
                        'desc' => $this->l('reCAPTCHA theme (v2 only)'),
                        'options' => [
                            'query' => [
                                ['id' => 'light', 'name' => $this->l('Light')],
                                ['id' => 'dark', 'name' => $this->l('Dark')]
                            ],
                            'id' => 'id',
                            'name' => 'name'
                        ]
                    ],
                    [
                        'type' => 'select',
                        'label' => $this->l('Size'),
                        'name' => 'PSRECAPTCHA_SIZE',
                        'desc' => $this->l('reCAPTCHA size (v2 only)'),
                        'options' => [
                            'query' => [
                                ['id' => 'normal', 'name' => $this->l('Normal')],
                                ['id' => 'compact', 'name' => $this->l('Compact')]
                            ],
                            'id' => 'id',
                            'name' => 'name'
                        ]
                    ],
                    [
                        'type' => 'text',
                        'label' => $this->l('Minimum Score (v3)'),
                        'name' => 'PSRECAPTCHA_V3_MIN_SCORE',
                        'size' => 10,
                        'desc' => $this->l('Minimum score required for reCAPTCHA v3 (0.0 to 1.0, recommended: 0.5)')
                    ],
                    [
                        'type' => 'html',
                        'label' => $this->l('Protected Forms'),
                        'name' => 'forms_section',
                        'html_content' => '<hr><h4>' . $this->l('Select which forms to protect') . '</h4>'
                    ],
                    [
                        'type' => 'switch',
                        'label' => $this->l('Contact Form'),
                        'name' => 'PSRECAPTCHA_CONTACT_FORM',
                        'is_bool' => true,
                        'desc' => $this->l('Protect contact form'),
                        'values' => [
                            ['id' => 'contact_on', 'value' => 1, 'label' => $this->l('Yes')],
                            ['id' => 'contact_off', 'value' => 0, 'label' => $this->l('No')]
                        ],
                    ],
                    [
                        'type' => 'switch',
                        'label' => $this->l('Customer Registration Form'),
                        'name' => 'PSRECAPTCHA_CUSTOMER_FORM',
                        'is_bool' => true,
                        'desc' => $this->l('Protect customer registration form'),
                        'values' => [
                            ['id' => 'customer_on', 'value' => 1, 'label' => $this->l('Yes')],
                            ['id' => 'customer_off', 'value' => 0, 'label' => $this->l('No')]
                        ],
                    ],
                ],
                'submit' => [
                    'title' => $this->l('Save'),
                    'class' => 'btn btn-default pull-right'
                ]
            ],
        ];

        $helper = new HelperForm();
        $helper->module = $this;
        $helper->name_controller = $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = AdminController::$currentIndex . '&configure=' . $this->name;
        $helper->default_form_language = $defaultLang;
        $helper->allow_employee_form_lang = $defaultLang;
        $helper->title = $this->displayName;
        $helper->show_toolbar = true;
        $helper->toolbar_scroll = true;
        $helper->submit_action = 'submit' . $this->name;

        $helper->fields_value['PSRECAPTCHA_ENABLED'] = Configuration::get('PSRECAPTCHA_ENABLED');
        $helper->fields_value['PSRECAPTCHA_SITE_KEY'] = Configuration::get('PSRECAPTCHA_SITE_KEY');
        $helper->fields_value['PSRECAPTCHA_SECRET_KEY'] = Configuration::get('PSRECAPTCHA_SECRET_KEY');
        $helper->fields_value['PSRECAPTCHA_VERSION'] = Configuration::get('PSRECAPTCHA_VERSION');
        $helper->fields_value['PSRECAPTCHA_THEME'] = Configuration::get('PSRECAPTCHA_THEME');
        $helper->fields_value['PSRECAPTCHA_SIZE'] = Configuration::get('PSRECAPTCHA_SIZE');
        $helper->fields_value['PSRECAPTCHA_CONTACT_FORM'] = Configuration::get('PSRECAPTCHA_CONTACT_FORM');
        $helper->fields_value['PSRECAPTCHA_CUSTOMER_FORM'] = Configuration::get('PSRECAPTCHA_CUSTOMER_FORM');
        $helper->fields_value['PSRECAPTCHA_V3_MIN_SCORE'] = Configuration::get('PSRECAPTCHA_V3_MIN_SCORE');

        return $helper->generateForm([$fieldsForm]);
    }

    /**
     * Hook: displayHeader
     * Add reCAPTCHA script to header
     */
    public function hookDisplayHeader($params)
    {
        if (!Configuration::get('PSRECAPTCHA_ENABLED')) {
            return;
        }

        $version = Configuration::get('PSRECAPTCHA_VERSION');
        $siteKey = Configuration::get('PSRECAPTCHA_SITE_KEY');

        if (empty($siteKey)) {
            return;
        }

        $this->context->controller->registerStylesheet(
            'module-psrecaptcha-css',
            'modules/' . $this->name . '/views/css/recaptcha.css',
            [
                'media' => 'all',
                'priority' => 150,
            ]
        );

        $this->context->controller->registerJavascript(
            'module-psrecaptcha-recaptcha',
            'modules/' . $this->name . '/views/js/recaptcha.js',
            [
                'position' => 'bottom',
                'priority' => 150,
            ]
        );

        // Add Google reCAPTCHA API script
        if ($version === 'v3') {
            $this->context->controller->registerJavascript(
                'module-psrecaptcha-api-v3',
                'https://www.google.com/recaptcha/api.js?render=' . $siteKey,
                [
                    'server' => 'remote',
                    'position' => 'head',
                    'priority' => 100,
                ]
            );
        } else {
            $this->context->controller->registerJavascript(
                'module-psrecaptcha-api-v2',
                'https://www.google.com/recaptcha/api.js',
                [
                    'server' => 'remote',
                    'position' => 'head',
                    'priority' => 100,
                ]
            );
        }

        // Pass configuration to JavaScript
        Media::addJsDef([
            'psrecaptcha_site_key' => $siteKey,
            'psrecaptcha_version' => $version,
            'psrecaptcha_theme' => Configuration::get('PSRECAPTCHA_THEME'),
            'psrecaptcha_size' => Configuration::get('PSRECAPTCHA_SIZE'),
        ]);
    }

    /**
     * Hook: displayContactForm
     * Display reCAPTCHA on contact form
     */
    public function hookDisplayContactForm($params)
    {
        if (!Configuration::get('PSRECAPTCHA_ENABLED') || !Configuration::get('PSRECAPTCHA_CONTACT_FORM')) {
            return;
        }

        return $this->displayRecaptcha();
    }

    /**
     * Hook: displayCustomerAccountForm
     * Display reCAPTCHA on customer registration form
     */
    public function hookDisplayCustomerAccountForm($params)
    {
        if (!Configuration::get('PSRECAPTCHA_ENABLED') || !Configuration::get('PSRECAPTCHA_CUSTOMER_FORM')) {
            return;
        }

        return $this->displayRecaptcha();
    }

    /**
     * Display reCAPTCHA widget
     */
    protected function displayRecaptcha()
    {
        $version = Configuration::get('PSRECAPTCHA_VERSION');
        $siteKey = Configuration::get('PSRECAPTCHA_SITE_KEY');

        if (empty($siteKey)) {
            return '';
        }

        $this->context->smarty->assign([
            'site_key' => $siteKey,
            'version' => $version,
            'theme' => Configuration::get('PSRECAPTCHA_THEME'),
            'size' => Configuration::get('PSRECAPTCHA_SIZE'),
        ]);

        return $this->display(__FILE__, 'views/templates/hook/recaptcha.tpl');
    }

    /**
     * Hook: actionContactFormSubmitBefore
     * Verify reCAPTCHA on contact form submission
     */
    public function hookActionContactFormSubmitBefore($params)
    {
        if (!Configuration::get('PSRECAPTCHA_ENABLED') || !Configuration::get('PSRECAPTCHA_CONTACT_FORM')) {
            return true;
        }

        return $this->validateRecaptcha();
    }

    /**
     * Hook: actionSubmitAccountBefore
     * Verify reCAPTCHA on customer registration
     */
    public function hookActionSubmitAccountBefore($params)
    {
        if (!Configuration::get('PSRECAPTCHA_ENABLED') || !Configuration::get('PSRECAPTCHA_CUSTOMER_FORM')) {
            return true;
        }

        return $this->validateRecaptcha();
    }

    /**
     * Verify reCAPTCHA response using Google's official library
     */
    protected function validateRecaptcha()
    {
        $version = Configuration::get('PSRECAPTCHA_VERSION');
        $secretKey = Configuration::get('PSRECAPTCHA_SECRET_KEY');
        $recaptchaResponse = Tools::getValue('g-recaptcha-response');

        if (empty($recaptchaResponse)) {
            $this->context->controller->errors[] = $this->l('Please complete the reCAPTCHA verification.');
            return false;
        }

        try {
            // Fix issue if allow_url_fopen is set to 0 - use cURL instead
            if (function_exists('ini_get') && !ini_get('allow_url_fopen')) {
                $recaptchaMethod = new \ReCaptcha\RequestMethod\CurlPost();
            } else {
                $recaptchaMethod = null;
            }

            // Create ReCaptcha instance
            $recaptcha = new ReCaptcha($secretKey, $recaptchaMethod);

            // For v3, set score threshold
            if ($version === 'v3') {
                $minScore = (float)Configuration::get('PSRECAPTCHA_V3_MIN_SCORE');
                $recaptcha->setScoreThreshold($minScore);
            }

            // Verify the response
            $result = $recaptcha->verify($recaptchaResponse, Tools::getRemoteAddr());

            if (!$result->isSuccess()) {
                $errorMessage = $this->l('reCAPTCHA verification failed. Please try again.');

                // For v3, add score information if available
                if ($version === 'v3' && method_exists($result, 'getScore')) {
                    $score = $result->getScore();
                    $minScore = (float)Configuration::get('PSRECAPTCHA_V3_MIN_SCORE');
                    if ($score < $minScore) {
                        $errorMessage = $this->l('reCAPTCHA score too low. Please try again.');
                    }
                }

                $this->context->controller->errors[] = $errorMessage;
                return false;
            }

            return true;
        } catch (Exception $e) {
            $this->context->controller->errors[] = $this->l('An error occurred during reCAPTCHA validation.');
            return false;
        }
    }
}
