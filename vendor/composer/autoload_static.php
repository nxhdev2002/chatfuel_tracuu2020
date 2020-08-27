<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite939f7c05c04c785dc5c38c4d6003491
{
    public static $prefixLengthsPsr4 = array (
        'j' => 
        array (
            'juno_okyo\\' => 10,
        ),
        'C' => 
        array (
            'Curl\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'juno_okyo\\' => 
        array (
            0 => __DIR__ . '/..' . '/juno_okyo/php-chatfuel-class/src/juno_okyo',
        ),
        'Curl\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-curl-class/php-curl-class/src/Curl',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite939f7c05c04c785dc5c38c4d6003491::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite939f7c05c04c785dc5c38c4d6003491::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
