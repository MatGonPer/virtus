<?php

return [

    'paths' => ['api/*', 'sanctum/csrf-cookie', 'oauth/*'],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['http://localhost:3000'],  // Porta do React

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true,

];
