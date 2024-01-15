<?php

// Подключаем константы
require_once (dirname($_SERVER['DOCUMENT_ROOT']). DIRECTORY_SEPARATOR. 'resources' . DIRECTORY_SEPARATOR. 'views' . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'define.php');
require_once (DR . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'request.php');
/**
 * @var string $pageTitle
 */
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title><?= $pageTitle ?? 'Главная' ?></title>
    <link rel="shortcut icon" href="\img\flow.png" />

    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css' rel='stylesheet'
          integrity='sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ' crossorigin='anonymous'>

{{--    <link rel="stylesheet" href="/resources/css/main.css">--}}
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        [class*="col-x"] {
            background-color: #eee;
            text-align: center;
            padding-top: 10px;
            padding-bottom: 10px;
            margin-bottom: 10px;
            font-size: 2rem;
        }
    </style>
</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<div class="container">
    <div class="row">
        <div style="background-color: white" class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <img src="/img/flowMini.png">
        </div>
        <div style="background-color: white" class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <a href="/" class="link-dark">Home green</a>

        </div>
        <div style="background-color: white" class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <a href="/resources/views/admin" class="link-dark">Админка</a>
        </div>
    </div>
</div>

<div class="wrapper">
    @yield('content')

    <footer class="footer">

    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
