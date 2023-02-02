<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6d7c878e798897c5f9b2e97a6e2b61ce
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6d7c878e798897c5f9b2e97a6e2b61ce::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6d7c878e798897c5f9b2e97a6e2b61ce::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6d7c878e798897c5f9b2e97a6e2b61ce::$classMap;

        }, null, ClassLoader::class);
    }
}