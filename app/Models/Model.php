<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model as Mod;


abstract class Model extends Mod
{
    public static $_instance = null;

    public static function i()
    {
        $class = get_called_class();
        if (!static::$_instance) {
            static::$_instance = new $class();
        }

        return static::$_instance;
    }
}