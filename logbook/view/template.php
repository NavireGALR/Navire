<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="zressources/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="zressources/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="zressources/favicon/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <!-- reCaptcha Google -->
        <script src="https://www.google.com/recaptcha/api.js?"></script>
        <!-- script JS -->
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="zressources/js/bootstrap.min.js"></script>
        <!-- Icon -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- fichiers CSS -->
        <link href="zressources/css/bootstrap.min.css" rel="stylesheet">
        <link href="zressources/css/themeSolar.css" rel="stylesheet" />
        <link href="zressources/css/style.css" rel="stylesheet" /> 


        <title><?= $title ?></title>
    </head>
        
    <body class="container-fluid">
        <header class="row">
            <?php require('headerView.php'); ?>
        </header>
        

        <section class="row">
            <?= $content ?>
        </section>
        
        <footer class="row mt-5 justify-content-around">
             <?php require('footerView.php'); ?>
        </footer>
    </body>
</html>
