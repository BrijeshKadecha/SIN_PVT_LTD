<?php

/**
 * Simple PHPMailer autoloader (modern PHP compatible)
 * Works with older PHPMailer folder structure (class.*.php files)
 */

spl_autoload_register(function ($classname) {

    $filename = __DIR__ . DIRECTORY_SEPARATOR . 'class.' . strtolower($classname) . '.php';

    if (is_readable($filename)) {
        require $filename;
    }
});