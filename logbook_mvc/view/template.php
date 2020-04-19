<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="zressources/css/bootstrap.min.css" rel="stylesheet">
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="zressources/js/bootstrap.min.js"></script>
        <link href="zressources/css/themeSolar.css" rel="stylesheet" />
        <link href="zressources/css/style.css" rel="stylesheet" /> 

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
