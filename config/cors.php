<?php

return [
    'paths' => ['api/*'],
    'allowed_methods' => ['GET', 'POST', 'PUT', 'DELETE'],
    'allowed_origins' => ['http://localhost:3000'],
    'allowed_headers' => ['Content-Type', 'X-Requested-With'],
    'supports_credentials' => true,
];