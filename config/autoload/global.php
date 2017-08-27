<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return [
    // ...
    'db' => [
        'driver' => 'Pdo_Mysql',//"Pdo", try "Pdo_Mysql"
        'hostname' => 'localhost',// optional
        'database' => 'my_test_db',
        'username' => 'root',
        'password' => 'root',
        'charset' => 'utf8',
    ],// we can place db credentials in global.php, but we should instead place it in local.php
];
