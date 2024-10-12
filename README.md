# Basic MVC PHP Framework

"Terinspirasi dari Framework CodeIgniter 4"

## Config connection database, on 'src/config/config.php'

``` bash
return [
        'base_url' => 'http://localhost:8000',
        'database' => [
        'host' => '127.0.0.1',
        'port' => '3306',
        'dbname' => 'basic',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
    ],
    'env' => 'development',
    'display_errors' => true,
    'app_name' => 'basic',
    'timezone' => 'UTC',
];
```
## Configuration for Routing 'public/index.php'

```bash
require_once __DIR__ . '/../vendor/autoload.php';

use Core\Routes;

$router = new Routes();
$router->add('GET', '/', 'Home::index');
$router->run();
```

Selebihnya, semua menggunakan native, Dengan composer dan PSR-4. Konfigurasi lainnya seperti Controller dan model, Bisa langsung di lihat contohnya

## Path Controller

```bash
'src/App/controler'
```

## Path Model

```bash
'src/App/Models'
```

## Composer info:

``` bash
{
    "name": "kurt/basic",
    "description": "simple_framework",
    "type": "project",
    "require": {
        "php": "^7.4 || ^8.0",
        "propel/propel": "~2.0@dev",
        "twig/twig": "^3.11"
    },
    "autoload": {
        "psr-4": {
            "App\\": "src/App/",
            "Core\\": "src/Core/"
        }
    },
    "scripts": {
        "serve": [
            "php -S localhost:8000 -t public"
        ]
    },
    "config": {
        "optimize-autoloader": true,
        "sort-packages": true
    }
}
```
### Author
<a href="https://github.com/ibnuyasir"><img src="https://img.shields.io/badge/Original-Author-brightgreen.svg" alt=""/></a>

### Pengunjung
![Visitor Count](https://profile-counter.glitch.me/ibnuyasir/count.svg)
