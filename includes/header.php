<?php
if (!defined('SITE_NAME')) {
    require_once __DIR__ . '/config.php';
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?= SITE_NAME ?></title>

<meta name="description"
      content="Maghreb FC - Club Pro Clubs FC 26">

<link rel="stylesheet"
      href="assets/css/style.css">

<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body>

<nav class="navbar">

    <div class="nav-inner">

        <a href="index.php" class="nav-logo">

            <img src="assets/images/logo.png"
                 alt="Maghreb FC">

            <div>
                MAGHREB
                <span>FC</span>
            </div>

        </a>

        <div class="nav-links">

            <a href="index.php">Accueil</a>

            <a href="recrutement.php">Recrutement</a>

            <a href="compositions.php">Compositions</a>

            <a href="effectif.php">Effectif</a> 
            
            <a href="contact.php">Contact</a>

        </div>

    </div>

</nav>