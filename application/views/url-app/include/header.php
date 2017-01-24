<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Demos | CodeBeing.com</title>

    <link rel="apple-touch-icon" sizes="57x57" href="<?= base_url('url-app-assets/apple-icon-57x57.png') ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= base_url('url-app-assets/apple-icon-60x60.png') ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url('url-app-assets/apple-icon-72x72.png') ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('url-app-assets/apple-icon-76x76.png') ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url('url-app-assets/apple-icon-114x114.png') ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url('url-app-assets/apple-icon-120x120.png') ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= base_url('url-app-assets/apple-icon-144x144.png') ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= base_url('url-app-assets/apple-icon-152x152.png') ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('url-app-assets/apple-icon-180x180.png') ?>">
    <link rel="icon" type="image/png" sizes="192x192"
          href="<?= base_url('url-app-assets/android-icon-192x192.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('url-app-assets/favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= base_url('url-app-assets/favicon-96x96.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('url-app-assets/favicon-16x16.png') ?>">
    <link rel="manifest" href="<?= base_url('url-app-assets/manifest.json') ?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= base_url('url-app-assets/ms-icon-144x144.png') ?>">
    <meta name="theme-color" content="#ffffff">


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet"
          href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet"
          href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src='//www.google.com/recaptcha/api.js'></script>


</head>
<body>
<input type="hidden" id="meta_email" value="<?= $this->session->userdata('email') ?>">

<div class="container">

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/url-app">Url Shortener</a>
                <a class="navbar-brand" href="<?= base_url() ?>">
                    <h6>
                        <small>CodeBeing.com</small>
                    </h6>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">

                    <?php if ($this->session->userdata('email') !== NULL): ?>


                        <?php if ($this->uri->segment(2) === NULL || 'home' === $this->uri->segment(2)): ?>
                            <li class="active"><a href="/url-app/">Home</a></li>
                        <?php else: ?>
                            <li><a href="/url-app/">Home</a></li>
                        <?php endif; ?>


                        <?php if ($this->uri->segment(2) === 'profile'): ?>
                            <li class="active"><a href="/url-app/profile">Profile</a></li>
                        <?php else: ?>
                            <li><a href="/url-app/profile">Profile</a></li>
                        <?php endif; ?>


                        <?php if ($this->uri->segment(2) === 'history'): ?>
                            <li class="active"><a href="/url-app/history">History</a></li>
                        <?php else: ?>
                            <li><a href="/url-app/history">History</a></li>
                        <?php endif; ?>


                        <li><a href="/url-app/account/logout">Logout</a></li>
                    <?php else: ?>
                        <li><a href="/url-app/account/login">Login</a></li>
                        <li><a href="/url-app/account/signup">Sign up</a></li>
                    <?php endif; ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
