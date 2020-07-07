<!DOCTYPE html>
<html lang="pl">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="sklep, biała podlaska">
        <meta name="author" content="Grzegorz Poczynajło">

        <title>Sklep code</title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
              integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <!-- Custom styles for this template -->
        <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="<?php echo base_url(); ?>">Sklep</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo base_url(); ?>">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('about'); ?>">O nas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('contact'); ?>">Kontakt</a>
                        </li>
                        
                        <?php
                            $contents = $this->cart->contents();
                                if(!empty($contents)) {
                        ?>
                        <a class="nav-link" href="<?php echo site_url('cart/index'); ?>">Koszyk</a>
                        <?php
									$sumContentHeader = 0;
									foreach($contents as $content) {
										$sumContentHeader += $content['qty'];
									}
									echo "<span style='color: red'>".$sumContentHeader."</span>";
                                }
                        ?>
        
                        <?php if(isset($_SESSION['logged_in'])): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('login/logout'); ?>">Wyloguj</a>
                        </li>
                        <?php if($_SESSION['name'] == 'Administrator'): ?>
                            <a class="nav-link" href="<?php echo site_url('admin/index'); ?>">Panel</a>
                        <?php endif; ?>
                        <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('login/index'); ?>">Logowanie</a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">

        <!-- Page Content -->
