<?php
/**
 * PrestaShop reCAPTCHA Module
 *
 * @author    Your Name
 * @copyright 2024-2026
 * @license   MIT License
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

class PsRecaptcha extends Module
{
    /**
     * Module constructor
     */
    public function __construct()
    {
        $this->name = 'psrecaptcha';
        $this->tab = 'front_office_features';
        $this->version = '1.0.2';
        $this->author = 'Your Name';
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
            && $this->registerHook('actionCustomerAccountAdd')
            && Configuration::updateValue('PSRECAPTCHA_SITE_KEY', '')
            && Configuration::updateValue('PSRECAPTCHA_SECRET_KEY', '')
            && Configuration::updateValue('PSRECAPTCHA_VERSION', 'v2')
            && Configuration::updateValue('PSRECAPTCHA_THEME', 'light')
            && Configuration::updateValue('PSRECAPTCHA_SIZE', 'normal')
            && Configuration::updateValue('PSRECAPTCHA_ENABLED', '0')
            && Configuration::updateValue('PSRECAPTCHA_CONTACT_FORM', '1')
            && Configuration::updateValue('PSRECAPTCHA_CUSTOMER_FORM', '1')
            && Configuration::updateValue('PSRECAPTCHA_REVIEW_FORM', '1');
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
            && Configuration::deleteByName('PSRECAPTCHA_REVIEW_FORM')
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
            $reviewForm = Tools::getValue('PSRECAPTCHA_REVIEW_FORM');

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
                Configuration::updateValue('PSRECAPTCHA_REVIEW_FORM', $reviewForm);

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
                                ['id' => 'v2_invisible', 'name' => 'reCAPTCHA v2 (Invisible)'],
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
                    [
                        'type' => 'switch',
                        'label' => $this->l('Product Review Form'),
                        'name' => 'PSRECAPTCHA_REVIEW_FORM',
                        'is_bool' => true,
                        'desc' => $this->l('Protect product review form'),
                        'values' => [
                            ['id' => 'review_on', 'value' => 1, 'label' => $this->l('Yes')],
                            ['id' => 'review_off', 'value' => 0, 'label' => $this->l('No')]
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
        $helper->fields_value['PSRECAPTCHA_REVIEW_FORM'] = Configuration::get('PSRECAPTCHA_REVIEW_FORM');

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
            return;
        }

        $this->verifyRecaptcha();
    }

    /**
     * Hook: actionCustomerAccountAdd
     * Verify reCAPTCHA on customer registration
     */
    public function hookActionCustomerAccountAdd($params)
    {
        if (!Configuration::get('PSRECAPTCHA_ENABLED') || !Configuration::get('PSRECAPTCHA_CUSTOMER_FORM')) {
            return;
        }

        $this->verifyRecaptcha();
    }

    /**
     * Verify reCAPTCHA response
     */
    protected function verifyRecaptcha()
    {
        $version = Configuration::get('PSRECAPTCHA_VERSION');
        $secretKey = Configuration::get('PSRECAPTCHA_SECRET_KEY');

        if ($version === 'v3') {
            $recaptchaResponse = Tools::getValue('g-recaptcha-response-v3');
        } else {
            $recaptchaResponse = Tools::getValue('g-recaptcha-response');
        }

        if (empty($recaptchaResponse)) {
            throw new PrestaShopException($this->l('Please complete the reCAPTCHA verification.'));
        }

        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = [
            'secret' => $secretKey,
            'response' => $recaptchaResponse,
            'remoteip' => Tools::getRemoteAddr()
        ];

        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            ]
        ];

        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $resultJson = json_decode($result);

        if (!$resultJson->success) {
            throw new PrestaShopException($this->l('reCAPTCHA verification failed. Please try again.'));
        }

        // For v3, check score
        if ($version === 'v3' && isset($resultJson->score)) {
            $minScore = 0.5; // You can make this configurable
            if ($resultJson->score < $minScore) {
                throw new PrestaShopException($this->l('reCAPTCHA score too low. Please try again.'));
            }
        }
    }
}
