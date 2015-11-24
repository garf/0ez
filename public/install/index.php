<?php
session_start();
require_once(__DIR__ . '/classes/Templater.php');
require_once(__DIR__ . '/classes/Installer.php');
require_once(__DIR__ . '/helpers.php');

$installer = new Installer();

$methods_mapping = include(__DIR__ . '/config/routes.php');

if(!isset($methods_mapping[$_GET['action']])) {
    echo $installer->$methods_mapping['default'][0]();
} elseif (method_exists($installer, $methods_mapping[$_GET['action']][0])) {
    echo $installer->$methods_mapping[$_GET['action']][0]();
} else {
    header('Not found', true, 404);
    throw new Exception('Route not found');
}