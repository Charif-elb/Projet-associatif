<?php include 'includes/header.php'; ?>

<section class="recrutement-page">
    <div class="container">

        <h1 class="page-title">Contact Maghreb FC</h1>

        <?php if(isset($_GET['success'])): ?>
            <div class="success-message">
                Votre message a bien été envoyé.
            </div>
        <?php endif; ?>

        <div class="recrutement-form-container">

            <form action="send_contact.php" method="POST">

                <div class="form-grid">

                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" name="nom" required>
                    </div>

                    <div class="form-group">
                        <label>Discord</label>
                        <input type="text" name="discord" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label>Sujet</label>
                        <input type="text" name="sujet" required>
                    </div>

                </div>

                <div class="form-group full-width">
                    <label>Message</label>
                    <textarea name="message" rows="8" required></textarea>
                </div>

                <button type="submit" class="btn-submit">
                    ENVOYER MON MESSAGE
                </button>

            </form>

        </div>

    </div>
</section>

<?php include 'includes/footer.php'; ?>