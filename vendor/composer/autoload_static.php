<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit70cc1b9146fb11511a520a62f802c6eb
{
    public static $prefixLengthsPsr4 = array (
        1 => 
        array (
            '10\\MyBlog\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        '10\\MyBlog\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit70cc1b9146fb11511a520a62f802c6eb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit70cc1b9146fb11511a520a62f802c6eb::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit70cc1b9146fb11511a520a62f802c6eb::$classMap;

        }, null, ClassLoader::class);
    }
}
