<?php


if (!function_exists('hdate')) {
    /* Human Readable Date */
    function hdate($date)
    {
        $obj = \Jenssegers\Date\Date::createFromFormat('Y-m-d H:i:s', $date);

        return $obj->ago();
    }
}

if (!function_exists('generate_filename')) {
    /* Generate Unique filename */
    function generate_filename($dir, $ext)
    {
        do {
            $name = str_random(10).'.'.$ext;
        } while (file_exists($dir.$name));

        return $name;
    }
}

if (!function_exists('highlight_str')) {
    function highlight_str($haystack, $needle, $filter = true)
    {
        if ($filter) {
            $needle = e($needle);
            $haystack = e($haystack);
        }

        return str_replace($needle, '<span class="highlight">'.$needle.'</span>', $haystack);
    }
}
