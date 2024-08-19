<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <title>Hello!</title>
</head>
<style>
    .navbar-brand {
        font-weight: bold;
        font-size: 20px;
    }
    #font-color {
        color: #fff;
    }
    .navbar .navbar-expand-lg .navbar-light .bg-light {
        background-color: #212121;
        color: #fff;
    }
    #font-color-i {
        border: solid white;
    }
    .navbar-toggler {
        color: #fff;
    }
    .main, #main2 {
        position: relative;
        top: 60px;
        text-align: center;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
    .footer {
        position: relative;
        bottom: -190px;
        margin: 20px;
    }
    fieldset {
        background-color: #c0c0c0;
        width: 40%;
    }
    pre {
        margin: 20px;
    }
    .bawah {
        width: 100%;
        height: 70px;
        background-color: #212121;
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
    }
    .fuut {
        color:#fff;
        margin: 20px;
        position: relative;
        bottom: -10px;
        font-family: monospace;
    }
</style>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <a class="navbar-brand" id="font-color" href="#">BASIC</a>
  <button class="navbar-toggler" id="font-color-i" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" id="font-color" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="font-color" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<h1 class="main" id="main"></h1>
<p id="main2"></p>
<script>
    let text = "Hello, World!";
    let text2 = "Makasih bang, udah mau pakai/coba framework mvc gw :)";
    function textTypinAnimate () {
        for (let i = 0; i < text.length; i++) {
            setTimeout(() => {
                let ttt = document.getElementById('main');
                $(ttt).append(text[i]);
            }, i * 100);
        }
    }
    textTypinAnimate();
    setTimeout(() => {
    function textTypinAnimate2 () {
        for (let i = 0; i < text2.length; i++) {
            setTimeout(() => {
                let text = document.getElementById('main2');
                $(text).append(text2[i]);
            }, i * 100);
        }
    }
    textTypinAnimate2();
}, 2000);
</script>
<div class="footer">
    <h5>Config connection database, on 'src/config/config.php'</h5>
    <br><br>
        <pre>
return [
        'base_url' => 'http://localhost:8080',
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
        </pre>
    <br><br><br>
    <h4>Configuration for Routing 'public/index.php'</h4>
    <br><br>
        <pre>
require_once __DIR__ . '/../vendor/autoload.php';

use Core\Routes;

$router = new Routes();
$router->add('GET', '/', 'Home::index');
$router->run();
        </pre>
    <br>
    <p>Selebihnya, semua menggunakan native, Dengan composer dan PSR-4. Konfigurasi lainnya seperti Controller dan model, Bisa langsung di lihat contohnya</p>
    <p>Path Controller: <pre>'src/App/controler'</pre></p>
    <p>Path Model: <pre>'src/App/Models'</pre></p>
    <br><br>
    <b>composer info:</b>
    <pre>
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
    </pre>
    Masih belum keinstall ORM Btw.
</div>
<div class="bawah">
    <b class="fuut">Creator: kurt {Ibnu_Yasir}</b>
    <br>
    <b class="fuut">GitHub: ibnuyasir</b>
</div>
</body>
</html>