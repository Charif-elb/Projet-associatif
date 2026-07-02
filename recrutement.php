<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

startSecureSession();

$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (!verifyCsrfToken($_POST['csrf_token'])) {
        $error = "Token invalide.";
    } else {

        $pdo = getDB();

        $stmt = $pdo->prepare("
            INSERT INTO candidatures
            (nom, pseudo_ea, age, poste_principal, poste_secondaire,
             niveau_experience, disponibilites, discord, motivation)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");

        $stmt->execute([
            sanitize($_POST['nom']),
            sanitize($_POST['pseudo_ea']),
            intval($_POST['age']),
            sanitize($_POST['poste_principal']),
            sanitize($_POST['poste_secondaire']),
            sanitize($_POST['niveau_experience']),
            sanitize($_POST['disponibilites']),
            sanitize($_POST['discord']),
            sanitize($_POST['motivation'])
        ]);

        // EMAIL
        $to = CONTACT_EMAIL;
        $subject = "Nouvelle candidature Maghreb FC";

        $message = "Nouvelle candidature reçue :\n\n";
        $message .= "Nom: ".$_POST['nom']."\n";
        $message .= "Pseudo: ".$_POST['pseudo_ea']."\n";
        $message .= "Âge: ".$_POST['age']."\n";
        $message .= "Poste: ".$_POST['poste_principal']."\n";

        mail($to, $subject, $message);

        $success = "Candidature envoyée avec succès !";
    }
}

$token = generateCsrfToken();

include 'includes/header.php';
?>

<section class="form-section">

<div class="container">

<h2 class="section-title">Recrutement Maghreb FC</h2>

<?php if($success): ?>
<div class="form-message success"><?= $success ?></div>
<?php endif; ?>

<?php if($error): ?>
<div class="form-message error"><?= $error ?></div>
<?php endif; ?>

<form method="POST" class="form-card">

<input type="hidden" name="csrf_token" value="<?= $token ?>">

<div class="form-grid">

<div class="form-group">
<label>Nom</label>
<input type="text" name="nom" required>
</div>

<div class="form-group">
<label>Pseudo EA FC</label>
<input type="text" name="pseudo_ea" required>
</div>

<div class="form-group">
<label>Âge</label>
<input type="number" name="age" required>
</div>

<div class="form-group">
<label>Poste principal</label>
<input type="text" name="poste_principal" required>
</div>

<div class="form-group">
<label>Poste secondaire</label>
<input type="text" name="poste_secondaire">
</div>

<div class="form-group">
<label>Niveau expérience</label>
<input type="text" name="niveau_experience">
</div>

<div class="form-group">
<label>Disponibilités</label>
<input type="text" name="disponibilites">
</div>

<div class="form-group">
<label>Discord</label>
<input type="text" name="discord">
</div>

<div class="form-group full">
<label>Motivation</label>
<textarea name="motivation" rows="5"></textarea>
</div>

</div>

<div class="form-submit-wrap">
<button type="submit" class="btn-submit">
Envoyer ma candidature
</button>
</div>

</form>

</div>

</section>

<?php include 'includes/footer.php'; ?>