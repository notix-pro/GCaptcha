<?php
/*!******************************************************************************
 * Copyright (c) NOTIX Development 2022.
 ******************************************************************************/

/**
 * https://www.google.com/recaptcha
 */
return [
    'secret' => env('CAPTCHA_SECRET', 'default_secret'),
    'sitekey' => env('CAPTCHA_SITEKEY', 'default_sitekey'),
    'request_method' => null,
    'options' => [
        'multiple' => false,
        'lang' => app()->getLocale(),
    ],
    'attributes' => [
        'theme' => env('CAPTCHA_THEME', 'light')
    ]
];
