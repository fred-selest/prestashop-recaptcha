<?php return array(
    'root' => array(
        'name' => 'prestashop/psrecaptcha',
        'pretty_version' => 'dev-main',
        'version' => 'dev-main',
        'reference' => '754d548c1b61f595177a22f0dff130b420f88b61',
        'type' => 'prestashop-module',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => false,
    ),
    'versions' => array(
        'google/recaptcha' => array(
            'pretty_version' => '1.3.1',
            'version' => '1.3.1.0',
            'reference' => '56522c261d2e8c58ba416c90f81a4cd9f2ed89b9',
            'type' => 'library',
            'install_path' => __DIR__ . '/../google/recaptcha',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'prestashop/psrecaptcha' => array(
            'pretty_version' => 'dev-main',
            'version' => 'dev-main',
            'reference' => '754d548c1b61f595177a22f0dff130b420f88b61',
            'type' => 'prestashop-module',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
    ),
);
