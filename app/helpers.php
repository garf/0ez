<?php


if (!function_exists('hdate')) {
    /* Human Readable Date */
    function hdate($date) {
        $obj = \Jenssegers\Date\Date::createFromFormat('Y-m-d H:i:s', $date);
        return $obj->ago();
    }
}

if (!function_exists('generate_filename')) {
    /* Generate Unique filename */
    function generate_filename($dir, $ext) {
        do {
            $name = str_random(10) . '.' . $ext;
        } while(file_exists($dir . $name));

        return $name;
    }
}