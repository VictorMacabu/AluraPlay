<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit457ad814c170c5db3401aafb3a1eb2eb
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Alura\\Mvc\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Alura\\Mvc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit457ad814c170c5db3401aafb3a1eb2eb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit457ad814c170c5db3401aafb3a1eb2eb::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit457ad814c170c5db3401aafb3a1eb2eb::$classMap;

        }, null, ClassLoader::class);
    }
}
