<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8da9b9ee4af15263277edbf06d617005
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'SupergiuLab\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'SupergiuLab\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8da9b9ee4af15263277edbf06d617005::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8da9b9ee4af15263277edbf06d617005::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8da9b9ee4af15263277edbf06d617005::$classMap;

        }, null, ClassLoader::class);
    }
}
