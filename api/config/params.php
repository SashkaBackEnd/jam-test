<?php

return [
    'jwt' => [
        'issuer' => 'https://api.jam.market',
        'audience' => 'https://lk.jam.market',
        'expire' => 3600000,  // 60 минут
        'algorithm' => 'HS256',
        'secret' => 'a2e4ae90-a9eb-4972-83ce-f855cfc6d075', // используется для кодирования/декодирования JWT
    ],
    'cookieNameRefreshToken' => 'jwt-refresh',
    'cookieExpireRefreshToken' => 1036800, // 2 недели
];
