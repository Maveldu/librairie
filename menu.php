﻿<?php
require_once 'fonc_bdd.php';
$bdd = OuvrirConnexion($session, $usr, $mdp);
require_once 'f_compte.php';
?>
<!DOCTYPE html>
<html>
<link rel="icon" type="image/png" href="favicon.png"/>


<head>
    <title>Librairie</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <style>
        body {
            font: 400 15px/1.8 Lato, sans-serif;
            color: #777;
        }

        h3, h4 {
            margin: 10px 0 30px 0;
            letter-spacing: 10px;
            font-size: 20px;
            color: #111;
        }

        .container {
            padding: 80px 120px;
        }

        .person {
            border: 10px solid transparent;
            margin-bottom: 25px;
            width: 80%;
            height: 80%;
            opacity: 0.7;
        }

        .person:hover {
            border-color: #f1f1f1;
        }

        .carousel-inner img {
            width: 100%; /* Set width to 100% */
            margin: auto;
        }

        .carousel-caption h3 {
            color: #fff !important;
        }

        @media (max-width: 600px) {
            .carousel-caption {
                display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
            }
        }

        .bg-1 {
            background: #2d2d30;
            color: #bdbdbd;
        }

        .bg-1 h3 {
            color: #fff;
        }

        .bg-1 p {
            font-style: italic;
        }

        .list-group-item:first-child {
            border-top-right-radius: 0;
            border-top-left-radius: 0;
        }

        .list-group-item:last-child {
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .thumbnail {
            padding: 0 0 15px 0;
            border: none;
            border-radius: 0;
        }

        .thumbnail p {
            margin-top: 15px;
            color: #555;
        }

        .btn {
            padding: 10px 20px;
            background-color: #333;
            color: #f1f1f1;
            border-radius: 0;
            transition: .2s;
        }

        .btn:hover, .btn:focus {
            border: 1px solid #333;
            background-color: #fff;
            color: #000;
        }

        .modal-header, h4, .close {
            background-color: #333;
            color: #fff !important;
            text-align: center;
            font-size: 30px;
        }

        .modal-header, .modal-body {
            padding: 40px 50px;
        }

        .nav-tabs li a {
            color: #777;
        }

        #googleMap {
            width: 100%;
            height: 400px;
        }

        .navbar {
            font-family: Montserrat, sans-serif;
            margin-bottom: 0;
            background-color: #2d2d30;
            border: 0;
            font-size: 11px !important;
            letter-spacing: 4px;
            opacity: 0.9;
        }

        .navbar li a, .navbar .navbar-brand {
            color: #d5d5d5 !important;
        }

        .navbar-nav li a:hover {
            color: #fff !important;
        }

        .navbar-nav li.active a {
            color: #fff !important;
            background-color: #29292c !important;
        }

        .navbar-default .navbar-toggle {
            border-color: transparent;
        }

        .open .dropdown-toggle {
            color: #fff;
            background-color: #555 !important;
        }

        .dropdown-menu li a {
            color: #000 !important;
        }

        .dropdown-menu li a:hover {
            background-color: red !important;
        }

        footer {
            background-color: #2d2d30;
            color: #f5f5f5;
        }

        footer a {
            color: #f5f5f5;
        }

        footer a:hover {
            color: #777;
            text-decoration: none;
        }

        .form-control {
            border-radius: 0;
        }

        textarea {
            resize: none;
        }
    </style>
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
<nav class="navbar navbar-default navbar-fixed-top">
    <div style="float:left; width:70px;">
        <a href="index.php">
            <img src="logo.png" alt="logo" title="Accueil" id="logo" width="60" height="60"/>
        </a>
    </div>
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="index.php">Accueil</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">AFFICHER
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="form_afficher_article.php">Article</a></li>
                        <li><a href="afficher_editeur.php">Éditeur</a></li>
                        <li><a href="afficher_auteur.php">Auteur</a></li>
                    </ul>
                </li>
					<?php if (f_compte($bdd)=="admin") { ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">AJOUTER
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="form_ajouter_article.php">Article</a></li>
                            <li><a href="form_ajouter_editeur.php">Éditeur</a></li>
                            <li><a href="form_ajouter_auteur.php">Auteur</a></li>
                            <li><a href="form_csvImport.php">CSV</a></li>
                            <li><a href="photo.php">Photo vitrine</a></li>
                        </ul>
                    </li>
					
					 <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">COMPTE
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="form_creer_admin.php">Admin</a></li>
                            <li><a href="form_compte_client_pro.php">Client pro</a></li>
                            <li><a href="form_compte_fournisseur.php">Fournisseur</a></li>
                        </ul>
                    </li>
					
					 <?php } ?>
					<?php if (isset($_SESSION['id'])) { ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown"
                           href="#"><?php echo strtoupper($_SESSION['id']); ?>
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
							<li><a href="MonCompte.php">Mon Compte</a></li>
                            <li><a href="form_deconnexion.php">Se déconnecter</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="mon_panier.php">MON PANIER</a>
                    </li>
                <?php } else { ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">MON COMPTE
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="form_inscription.php"> S'inscrire</a></li>
                            <li><a href="form_connexion.php"> Se connecter</a></li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>