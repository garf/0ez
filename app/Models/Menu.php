<?php

namespace App\Models;

class Menu extends Model
{
    protected $table = 'menu';
    protected $fillable = ['*'];
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
