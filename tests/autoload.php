<?php
include_once __DIR__.'/../vendor/autoload.php';

$classLoader = new \Composer\Autoload\ClassLoader();
$classLoader->addPsr4("Tests\\", __DIR__, true);
$classLoader->addPsr4("Yerkebulan\\", __DIR__ . '../src', true);
$classLoader->register();
