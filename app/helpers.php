<?php


if (!function_exists('hdate')) {
    /* Human Readable Date */
    function hdate($date) {
        $obj = \Jenssegers\Date\Date::createFromFormat('Y-m-d H:i:s', $date);
        return $obj->ago();
    }
}