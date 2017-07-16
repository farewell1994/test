<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb9fa4d75864668b72c52e48869c2b2f3
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twig\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twig\\' => 
        array (
            0 => __DIR__ . '/..' . '/twig/twig/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'T' => 
        array (
            'Twig_' => 
            array (
                0 => __DIR__ . '/..' . '/twig/twig/lib',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb9fa4d75864668b72c52e48869c2b2f3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb9fa4d75864668b72c52e48869c2b2f3::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitb9fa4d75864668b72c52e48869c2b2f3::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}