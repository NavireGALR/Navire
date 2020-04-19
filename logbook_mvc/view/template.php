<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- script JS -->
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="zressources/js/bootstrap.min.js"></script>
        <!-- fichiers CSS -->
        <link href="zressources/css/bootstrap.min.css" rel="stylesheet">
        <link href="zressources/css/themeSolar.css" rel="stylesheet" />
        <link href="zressources/css/style.css" rel="stylesheet" /> 
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="zressources/favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="zressources/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="96x96" href="zressources/favicon/favicon-96x96.png">
        <link rel="manifest" href="/manifest.json">
        <meta name="msapplication-TileImage" content="zressources/favicon/ms-icon-144x144.png">




        <title><?= $title ?></title>
    </head>
        
    <body class="container-fluid">
        <header class="row">
            <?php require('frontend/headerView.php'); ?>
        </header>
        

        <section class="row">
            <?= $content ?>
        </section>
        
        <footer class="row mt-5 justify-content-around">
             <?php require('frontend/footerView.php'); ?>
        </footer>
    </body>
</html>
