<?php
require_once 'includes/config.php';
startSecureSession();
include 'includes/header.php';

$pdo = getDB();
$joueurs = $pdo->query("SELECT * FROM joueurs WHERE visible = 1 ORDER BY niveau DESC")->fetchAll();
?>

<section id="effectif" class="formation-section">

<div class="container">

<div class="section-header centered">
<span class="eyebrow">Effectif</span>
<h2 class="section-title">Maghreb FC <span class="red">Roster</span></h2>
<p class="section-sub centered">Notre équipe officielle Pro Clubs</p>
</div>

<div class="grid-players">

<?php foreach($joueurs as $j): ?>

<div class="card-player">

<div class="player-avatar">
<?= strtoupper(substr($j['pseudo'],0,2)) ?>
</div>

<div class="player-pseudo">
<?= htmlspecialchars($j['pseudo']) ?>
</div>

<div class="player-poste">
<?= htmlspecialchars($j['poste']) ?>
</div>

<div class="player-niveau">

<?php for($i=0;$i<10;$i++): ?>
<span class="star <?= $i < $j['niveau'] ? '' : 'empty' ?>">★</span>
<?php endfor; ?>

</div>

<div class="player-exp">
<?= htmlspecialchars($j['experience']) ?>
</div>

</div>

<?php endforeach; ?>

</div>

</div>

</section>

<?php include 'includes/footer.php'; ?>