<?php

return [
    'test' => env('FECO_TEST', false),
    'software' => [
        'identifier' => env('FECO_SOFTWARE_IDENTIFIER'),
        'test_set_id' => env('FECO_SOFTWARE_TEST_SET_ID'),
        'pin' => env('FECO_SOFTWARE_PIN'),
    ],
    'certificate' => [
        'path' => env('FECO_CERTIFICATE_PATH'),
        'password' => env('FECO_CERTIFICATE_PASSWORD'),
    ],
    'path' => env('FECO_PATH'),
    'technical_key' => env('FECO_TECHNICAL_KEY'),
];
