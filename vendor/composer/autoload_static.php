<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita314df8c4ab662b3d6d55c1d4fa2c6b9
{
    public static $files = array (
        '3917c79c5052b270641b5a200963dbc2' => __DIR__ . '/..' . '/kint-php/kint/init.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'L' => 
        array (
            'Laminas\\Escaper\\' => 16,
        ),
        'K' => 
        array (
            'Kint\\' => 5,
        ),
        'C' => 
        array (
            'CodeIgniter\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Laminas\\Escaper\\' => 
        array (
            0 => __DIR__ . '/..' . '/laminas/laminas-escaper/src',
        ),
        'Kint\\' => 
        array (
            0 => __DIR__ . '/..' . '/kint-php/kint/src',
        ),
        'CodeIgniter\\' => 
        array (
            0 => __DIR__ . '/..' . '/codeigniter4/framework/system',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita314df8c4ab662b3d6d55c1d4fa2c6b9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita314df8c4ab662b3d6d55c1d4fa2c6b9::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita314df8c4ab662b3d6d55c1d4fa2c6b9::$classMap;

        }, null, ClassLoader::class);
    }
}
