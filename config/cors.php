<?php

return [
    'supports_credentials' => true,
    'allowed_origins' => ['http://localhost:4200'], // Cambia esto al origen de tu frontend
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'allowed_methods' => ['*'],
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
];
