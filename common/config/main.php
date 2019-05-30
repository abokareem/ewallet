<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
		// '@getCurrencyRates' => '@vendor/artembaranovsky/yii2GetCurrencyRates',

    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'modules' => [
        'yii2-get-currency-rates' => [
            'class' => 'common\modules\GetCurrencyRates',
        ],
    ],  
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
/*            'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
                        // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'viewPath' => '@common/mail',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'testewallet940@gmail.com',
                'password' => "test123+",
                'port' => '465',
                'encryption' => 'tls',
                // 'port' => '587',
                'streamOptions' => [
                    'ssl' => [
                        'allow_self_signed' => true,
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                    ],
                ],
            ],
        ],*/
    ],
];