<?php
define('API_HOST', 'https://wallet.adam-bit.net/api/?1_0_0');
define('API_HOST2', 'https://wallet.adam-bit.net/api/?2_0_0');
define('API_HOST3', 'https://wallet.adam-bit.net/api/?3_0_0');
define('API_RETRY_COUNT', 5);

define('ETH_GAS_LIMIT', '21000');
define('GAS_UNIT', '1000000000');

define('COIN_TEST_NET', 'TESTNET');
define('COIN_REAL_NET', 'REALNET');
define('COIN_NET', (env('APP_ENV') == 'local' ? COIN_REAL_NET : COIN_REAL_NET));

define('HTTP_METHOD_GET', 'GET');
define('HTTP_METHOD_POST', 'POST');
define('HTTP_METHOD_PUT', 'PUT');
define('HTTP_METHOD_DELETE', 'DELETE');

define('QR_GENERATE_URL', 'https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=');

return [
    'reg_type' => [
        'BO' => 1,
        'CTEX' => 2,
    ],

    'user_status' => [
        'invalid' => 0,
        'valid' => 1,
    ],

    'balance_status' => [
        'invalid' => 0,
        'valid' => 1,
    ],

    'crypto_setting_status' => [
        'invalid' => 0,
        'valid' => 1,
    ],

    'currency_status' => [
        'invalid' => 0,
        'valid' => 1,
    ],

    'device' => [
        'Mobile' => 1,
        'Tablet' => 2,
        'Desktop' => 3,
        'Unknown' => 4,
    ],

    'gender_list' => [
        ['id' => 0, 'gender' => 'male'],
        ['id' => 1, 'gender' => 'female'],
    ],

    'language_list' => [
        ['code' => 'en', 'name' => 'English'],
        ['code' => 'ja', 'name' => '日本語'],
        ['code' => 'zh', 'name' => '中文'],
        ['code' => 'ru', 'name' => 'Русский'],
        ['code' => 'fr', 'name' => 'Français'],
        ['code' => 'kr', 'name' => '한국어'],
    ],

    'disposable_status' => [
        'invalid' => 0,
        'valid' => 1,
    ],

    'deposit_status' => [
        'confirmed' => 0,
        'completed' => 1,
        'processing' => 2,
        'failed' => 3,
    ],

    'withdraw_type' => [
        'crypto' => 1,
        'transfer' => 2,
    ],

    'withdraw_status' => [
        'requested' => 0,
        'completed' => 1,
        'processing' => 2,
        'failed' => 3,
        'canceled' => 4,
    ],

    'trade_type' => [
        'exchange' => 1,
        'dealer' => 2,
    ],

    'order_type' => [
        'sell' => 1,
        'buy' => 2,
    ],

    'order_type2' => [
        'market' => 1,
        'limit' => 2,
    ],

    'order_status' => [
        'pending' => 0,
        'settled' => 1,
        'settlement' => 2,
        'canceled' => 3,
        'canceling' => 4,
    ],

    'trade_status' => [
        'settled' => 1,
        'canceled' => 2,
    ],

    'news_status' => [
        'invalid' => 0,
        'valid' => 1,
    ],

    'notifications_status' => [
        'unread' => 0,
        'read' => 1,
    ],

    'faq_status' => [
        'invalid' => 0,
        'valid' => 1,
    ],

    'contact_status' => [
        'requested' => 0,
        'replied' => 1,
        'pending' => 2,
    ],

    'kyc_status' => [
        'not_verified' => 0,
        'verified' => 1,
        'review' => 2,
        'failed' => 3
    ],

    'step_auth_status' => [
        'no_use' => 0,
        'use' => 1,
    ],

    'data_status' => [
        'invalid' => 0,
        'valid' => 1,
    ],

    'order_book_count' => 14,

    'page_num' => 10,
    'last_news_count' => 4,
    'last_notification_count' => 4,
];