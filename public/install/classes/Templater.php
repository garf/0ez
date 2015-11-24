<?php

class Templater
{
    public static $_instance = null;

    public static function instance()
    {
        if (null === self::$_instance) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    public function render($body, $data = [])
    {
        ob_start();
        $body = 'html/' . $body;
        extract($data);
        include(base_path('html/layout.php'));
        $html = ob_get_contents();
        ob_end_clean();
        return $html;
    }
}