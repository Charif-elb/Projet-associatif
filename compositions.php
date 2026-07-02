<?php
require_once 'includes/config.php';
startSecureSession();
include 'includes/header.php';
?>

<section class="formation-section">

<div class="container">

<div class="section-header centered">
<span class="eyebrow">Tactiques</span>
<h2 class="section-title">
Compositions <span class="red">Maghreb FC</span>
</h2>
<p class="section-sub centered">
Analyse des formations et positionnement des joueurs
</p>
</div>

<!-- TABS -->
<div class="formation-tabs">

<button class="formation-tab active" onclick="showFormation('433')">4-3-3</button>
<button class="formation-tab" onclick="showFormation('41212')">4-1-2-1-2</button>
<button class="formation-tab" onclick="showFormation('442')">4-4-2</button>

</div>

<!-- FORMATION 4-3-3 -->
<div id="433" class="formation-content active">

<div class="pitch-container">
<svg viewBox="0 0 100 150" class="pitch">

<rect width="100" height="150" class="field"/>

<rect x="10" y="10" width="80" height="130" class="line"/>
<circle cx="50" cy="75" r="18" class="line"/>

<!-- GK -->
<circle cx="50" cy="140" r="4" class="pos-circle"/>
<text x="50" y="140" class="pos-label">GK</text>

<!-- DEF -->
<circle cx="20" cy="110" r="4" class="pos-circle"/>
<text x="20" y="110" class="pos-label">LB</text>

<circle cx="40" cy="110" r="4" class="pos-circle"/>
<text x="40" y="110" class="pos-label">CB</text>

<circle cx="60" cy="110" r="4" class="pos-circle"/>
<text x="60" y="110" class="pos-label">CB</text>

<circle cx="80" cy="110" r="4" class="pos-circle"/>
<text x="80" y="110" class="pos-label">RB</text>

<!-- MID -->
<circle cx="30" cy="75" r="4" class="pos-circle"/>
<text x="30" y="75" class="pos-label">CM</text>

<circle cx="50" cy="65" r="4" class="pos-circle"/>
<text x="50" y="65" class="pos-label">CM</text>

<circle cx="70" cy="75" r="4" class="pos-circle"/>
<text x="70" y="75" class="pos-label">CM</text>

<!-- ATT -->
<circle cx="20" cy="35" r="4" class="pos-circle"/>
<text x="20" y="35" class="pos-label">LW</text>

<circle cx="50" cy="25" r="4" class="pos-circle"/>
<text x="50" y="25" class="pos-label">ST</text>

<circle cx="80" cy="35" r="4" class="pos-circle"/>
<text x="80" y="35" class="pos-label">RW</text>

</svg>
</div>

<div class="formation-info">

<h3 class="formation-name">4-3-3 Offensive</h3>

<p class="formation-desc">
Formation équilibrée entre attaque et contrôle du milieu de terrain.
Idéale pour un jeu rapide et vertical.
</p>

<div class="roles-list">

<div class="role-item">
<span class="role-badge">GK</span>
<span class="role-desc">Gardien - dernier rempart</span>
</div>

<div class="role-item">
<span class="role-badge">DEF</span>
<span class="role-desc">Défenseurs solides et agressifs</span>
</div>

<div class="role-item">
<span class="role-badge">MID</span>
<span class="role-desc">Contrôle du jeu et transitions</span>
</div>

<div class="role-item">
<span class="role-badge">ATT</span>
<span class="role-desc">Vitesse + finition offensive</span>
</div>

</div>

</div>

</div>

<!-- FORMATION 4-1-2-1-2 -->
<div id="41212" class="formation-content">

<div class="pitch-container">
<svg viewBox="0 0 100 150" class="pitch">

<rect width="100" height="150" class="field"/>
<rect x="10" y="10" width="80" height="130" class="line"/>
<circle cx="50" cy="75" r="18" class="line"/>

<!-- GK -->
<circle cx="50" cy="140" r="4" class="pos-circle"/>
<text x="50" y="140" class="pos-label">GK</text>

<!-- DEF -->
<circle cx="25" cy="110" r="4" class="pos-circle"/><text x="25" y="110">LB</text>
<circle cx="40" cy="110" r="4" class="pos-circle"/><text x="40" y="110">CB</text>
<circle cx="60" cy="110" r="4" class="pos-circle"/><text x="60" y="110">CB</text>
<circle cx="75" cy="110" r="4" class="pos-circle"/><text x="75" y="110">RB</text>

<!-- MDC -->
<circle cx="50" cy="90" r="4" class="pos-circle"/><text x="50" y="90">MDC</text>

<!-- MID -->
<circle cx="35" cy="70" r="4" class="pos-circle"/><text x="35" y="70">CM</text>
<circle cx="65" cy="70" r="4" class="pos-circle"/><text x="65" y="70">CM</text>

<!-- MOC -->
<circle cx="50" cy="50" r="4" class="pos-circle"/><text x="50" y="50">MOC</text>

<!-- ATT -->
<circle cx="40" cy="25" r="4" class="pos-circle"/><text x="40" y="25">ST</text>
<circle cx="60" cy="25" r="4" class="pos-circle"/><text x="60" y="25">ST</text>

</svg>
</div>

<div class="formation-info">

<h3 class="formation-name">4-1-2-1-2</h3>

<p class="formation-desc">
Formation compacte axée sur la possession et les attaques centrales.
Très efficace en jeu rapide.
</p>

<div class="roles-list">
<div class="role-item"><span class="role-badge">MDC</span><span class="role-desc">Sentinelle défensive</span></div>
<div class="role-item"><span class="role-badge">MOC</span><span class="role-desc">Créateur de jeu</span></div>
<div class="role-item"><span class="role-badge">ATT</span><span class="role-desc">Double attaquant</span></div>
</div>

</div>

</div>

</div>

</section>

<script>
function showFormation(id) {

document.querySelectorAll('.formation-content').forEach(el => {
el.classList.remove('active');
});

document.querySelectorAll('.formation-tab').forEach(el => {
el.classList.remove('active');
});

document.getElementById(id).classList.add('active');
event.target.classList.add('active');
}
</script>

<?php include 'includes/footer.php'; ?>