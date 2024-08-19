<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita90f52915c1eec09acbedafedddd7312
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Core\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Core',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/App',
        ),
    );

    public static $classMap = array (
        'App\\Models\\User' => __DIR__ . '/../..' . '/src/App/Models/User.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Core\\BaseController' => __DIR__ . '/../..' . '/src/Core/BaseController.php',
        'Core\\BaseModel' => __DIR__ . '/../..' . '/src/Core/BaseModel.php',
        'Core\\Routes' => __DIR__ . '/../..' . '/src/Core/Routes.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita90f52915c1eec09acbedafedddd7312::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita90f52915c1eec09acbedafedddd7312::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita90f52915c1eec09acbedafedddd7312::$classMap;

        }, null, ClassLoader::class);
    }
}
