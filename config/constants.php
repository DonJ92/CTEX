<?php
return [
    'reg_type' => [
        'BO' => 1,
        'CTEX' => 2,
    ],

    'user_status' => [
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
];