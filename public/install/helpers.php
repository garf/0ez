<?php

if (!function_exists('dd')) {
    function dd($str = null) {
        echo '<pre>';
        var_dump($str);
        echo '</pre>';
        die();
    }
}

if (!function_exists('base_path')) {
    function base_path($path = null) {
        return __DIR__ . '/' . $path;
    }
}
