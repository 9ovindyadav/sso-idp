<?php
$envFile = __DIR__ .'/../.env'; // Path to your .env file

if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        list($name, $value) = explode('=', $line, 2);
        $_ENV[$name] = $value;
    }
}

