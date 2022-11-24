<?php

return [
    // 'adminEmail' => 'admin@example.com',
    // Почта, на которую идут заявки с лендинга
    'supportEmail' => 'support@jam.market',
    // Почта, на которую приходят дублирующие письма или уведомления
    'notificationEmail' => 'notification@jam.market',
    // 'senderEmail' => 'noreply@example.com',
    // 'senderName' => 'Example.com mailer',
    'user.passwordResetTokenExpire' => 3600, // 60 минут
    'user.passwordMinLength' => 8,

    /**
     * @link https://www.exchangerate-api.com/docs/overview
     */
    'exchange_rate_api' => [
        'key' => '6a2677da797c6ccafb73a13d', //? anton.fedorov@jam.market
    ],
    /**
     * https://www.cryptocompare.com
     */
    'crypto_compare_api' => [
        'key' => '71311ab1d6ecabda4312e7ba13eb5281d7f9d39662e07381c77010321ab5dcb0', //? jocav87122@qqhow.com
    ],
    'bsVersion' => '4.x',
    'sentry_environment' => 'noenv', // `prod` для prod-сервера , `dev` для dev-сервера
    'mail_service' => [
        /**
         * Unisender API
         * @link https://www.unisender.com/en/support/integration/api/
         */
        // 'unisender_api' => [
        //     'api_key' => '5nyajyk3z8fwokw75afnoutcfxjaidqro95hdwqy',
        // ],
        /**
         * eSputnik API
         * @link https://esputnik.com/support/integraciya-s-api
         */
        'esputnik_api' => [
            'login' => 'login@jam.market',
            'api_key' => '9F7E3F8BFD3B9230CDEE602E6B195318',
            // Адрес отправителя (должен совпадать с одним из существующих адресов отправителя).
            //Формат адреса отправителя: "Имя" <email@mail.com>
            // 'from' => '"Pharma Courses Platform" <notification@news.pharmacourses.ae>',
            // //! отправитель, пока не завели нового
            'from' => '"Jam Platform" <support@jam.market>',
        ],
    ],
    'domain' => [
        'main' => 'https://jam.market',
        'lk' => 'https://lk.jam.market',
        'api' => 'https://api.jam.market',
    ],
];
