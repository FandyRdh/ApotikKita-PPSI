<!doctype html>
<html lang="en">

<head>
    <link rel="icon" href="<?php echo base_url('assets/Landing_Page/img/Apotik/icon-web.ico'); ?>">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link href="<?= base_url('assets/Master/css/Style_Master.css'); ?>" rel="stylesheet">

    <title><?= $title; ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('/'); ?>">Apotik Kita</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto btn-halaman">
                    <li class="nav-item active">
                        <a class="nav-link link-halaman" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link link-halaman" href="#">Database</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link link-halaman" href="#">Master</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link link-halaman" href="#">Laporan</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">
                            <img src="<?= base_url('assets/Master/img/Normal/notification.png'); ?>" class="Notif-icon" alt="">
                        </a>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle akun" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="<?= base_url('assets/Master/img/Normal/avatar.png'); ?>" class="Avatar-icon" alt="">
                            Oh Soo-Ah
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Profile</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="/Logout">Keluar</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>