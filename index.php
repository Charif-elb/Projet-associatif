<?php

require_once 'includes/config.php';
require_once 'includes/functions.php';

$actualites = getActualites();
$tournois   = getTournois();
$joueurs    = getJoueurs();

include 'includes/header.php';

?>

<section class="hero">

    <div class="hero-content">

        <img src="assets/images/logo.png"
             class="hero-logo"
             alt="Maghreb FC">

        <h1 class="hero-title">
            MAGHREB
            <span class="accent">FC</span>
        </h1>

        <p class="hero-slogan">
            L'élite du Pro Clubs
        </p>

        <div class="hero-actions">

            <a href="recrutement.php"
               class="btn-primary">
                Rejoindre le club
            </a>

            <a href="#actualites"
               class="btn-secondary">
                Actualités
            </a>

        </div>

    </div>

</section>

<section id="actualites">

<div class="container">

<h2 class="section-title">
Actualités
</h2>

<div class="grid-news">

<?php foreach($actualites as $actu): ?>

<div class="card-news">

<div class="card-news-body">

<div class="card-news-date">
<?= date('d/m/Y', strtotime($actu['date_publication'])) ?>
</div>

<h3 class="card-news-title">
<?= htmlspecialchars($actu['titre']) ?>
</h3>

<p class="card-news-excerpt">
<?= substr(strip_tags($actu['contenu']),0,150) ?>...
</p>

</div>

</div>

<?php endforeach; ?>

</div>

</div>

</section>

<section id="tournois">

<div class="container">

<h2 class="section-title">
Tournois
</h2>

<div class="grid-tournois">

<?php foreach($tournois as $tournoi): ?>

<div class="card-tournoi">

<h3 class="tournoi-name">
<?= htmlspecialchars($tournoi['nom']) ?>
</h3>

<p>
<?= htmlspecialchars($tournoi['description']) ?>
</p>

</div>

<?php endforeach; ?>

</div>

</div>

</section>

<section id="effectif">

<div class="container">

<h2 class="section-title">
Effectif
</h2>

<div class="grid-players">

<?php foreach($joueurs as $joueur): ?>

<div class="card-player">

<div class="player-avatar">
<?= strtoupper(substr($joueur['pseudo'],0,1)) ?>
</div>

<div class="player-pseudo">
<?= htmlspecialchars($joueur['pseudo']) ?>
</div>

<div class="player-poste">
<?= htmlspecialchars($joueur['poste']) ?>
</div>

</div>

<?php endforeach; ?>

</div>

</div>

</section>

<?php include 'includes/footer.php'; ?>