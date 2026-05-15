<?php
/**
 * views/inscription.php
 * Registration form with error display and pre-filling
 */
$pageTitle = 'Registration';
require 'views/partials/header.php';
?>

<section class="inscription-section">
    <div class="form-container">
        <div class="form-header">
            <h1>Registration Form</h1>
            <p>Join our learning community today</p>
        </div>

        <!-- Display validation errors if any -->
        <?php if (!empty($erreurs)): ?>
            <div class="alert alert-error">
                <strong>⚠️ Errors detected:</strong>
                <ul>
                    <?php foreach ($erreurs as $erreur): ?>
                        <li><?= htmlspecialchars($erreur) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Registration form -->
        <form method="POST" action="index.php?page=inscription" class="form">
            <div class="form-group">
                <label for="nom">Last Name *</label>
                <input 
                    type="text" 
                    id="nom"
                    name="nom" 
                    value="<?= htmlspecialchars($_POST['nom'] ?? '') ?>" 
                    required
                    class="form-input"
                    placeholder="Enter your last name">
            </div>

            <div class="form-group">
                <label for="prenom">First Name *</label>
                <input 
                    type="text" 
                    id="prenom"
                    name="prenom" 
                    value="<?= htmlspecialchars($_POST['prenom'] ?? '') ?>" 
                    required
                    class="form-input"
                    placeholder="Enter your first name">
            </div>

            <div class="form-group">
                <label for="email">Email Address *</label>
                <input 
                    type="email" 
                    id="email"
                    name="email" 
                    value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" 
                    required
                    class="form-input"
                    placeholder="Enter your email address">
            </div>

            <div class="form-group">
                <label for="formation_id">Select Formation *</label>
                <select 
                    id="formation_id"
                    name="formation_id" 
                    required
                    class="form-input">
                    <option value="">-- Choose a formation --</option>
                    <?php foreach ($formations as $f): ?>
                        <option 
                            value="<?= $f['id'] ?>"
                            <?= ($formation_preselect == $f['id']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($f['titre']) ?> – <?= $f['prix'] ?> DT
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary btn-lg">
                Continue to Payment →
            </button>
        </form>

        <div class="form-footer">
            <p>Already registered? <a href="index.php?page=paiement">Go to payment</a></p>
            <p><a href="index.php?page=formations">← Back to formations</a></p>
        </div>
    </div>
</section>

<?php require 'views/partials/footer.php'; ?>
