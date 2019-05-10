<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'KosanApp',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'timeZone' => 'Asia/Jakarta',
    'aliases' => [
        '@bower'      => '@vendor/bower-asset',
        '@npm'        => '@vendor/npm-asset',
        '@potoktp'    => '/uploads/potoktp',
        '@potokosan'  => '/uploads/potokosan',
    ],
    //'defaultRoute' =>'landing-page',
    'layout'       =>'main',
    /*component*/
    'components' => [
         'i18n' => [
         'translations' => [
            'app' => [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@app/messages',
            ],
            'kvgrid' => [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@app/messages',
             ],
           ],
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'defaultTimeZone'   => 'Asia/Jakarta',
            'decimalSeparator'  => ',',
            'thousandSeparator' => '.',
            'currencyCode'      => 'IDR',
        ],
        'authManager' => [
          'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\PhpManager'
        ],

        'mfile' => [
            'class'=>'app\components\KosanFile',
        ],

        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '_UkavrOwQLR1cdD3CUNuSJCchOZj9MBO',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'session' => [
            'class' => 'yii\web\Session',
            'cookieParams' => ['httponly' => false, 'lifetime' => 0],
            'timeout' => 3600 * 4,
            'useCookies' => true,
        ],
        'user' => [
            'identityClass' => 'app\models\identity\User',
            'enableAutoLogin' => true,
            //'enableSession' => false,
            //'loginUrl' => null,
            'loginUrl' => ['auth/login'],
            'authTimeout' => 3600,
        ],
        'errorHandler' => [
            'errorAction' => 'error',
        ],
        'mailer' => [
                'class' => 'yii\swiftmailer\Mailer',
                'viewPath' => '@app/notification/mail',
                'useFileTransport' => false,
                'transport' => [
                    'class' => 'Swift_SmtpTransport',
                    'host' => 'smtp.gmail.com',
                    'username' => 'mandiriatma@gmail.com',
                    'password' => 'PhpMysql',
                    'port' => '465',
                    'encryption' => 'ssl',
                ],
         ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                ''  => 'landing-page/index',                                
                '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
            ],
        ],
    ],
    /*params*/
    'params' => $params,
     /*modules*/
     'modules' => [
        'gridview' =>  [
            'class' => '\kartik\grid\Module',
            'downloadAction' => 'gridview/export/download',
            'i18n' => []
        ],
      'rbac' => [
          'class' => 'mdm\admin\Module',
           //'layout' => 'left-menu', //pilihan lain left-menu dan right-menu
           'mainLayout' => '@app/views/layouts/main.php',
             'menus' => [
                  'assignment' => [
                      'label' => 'Grant Access' // change label
                  ],
                  'rule' => null,
              ],
          ],
     ],
     /*as access*/
     'as access' => [
       'class' => 'mdm\admin\components\AccessControl',
       'allowActions' => [
           'site/*',
           'error/*',
           'landing-page/*',
           'dashboard/*',
           'auth/*',
           'rbac/*', // -> matikan saat fase production
           'gii/*', // -> matikan saat fase production
           'debug/*',// -> matikan saat fase production
           'kosan/*',
        
       ]
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
