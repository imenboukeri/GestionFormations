<?php
/**
 * views/succes.php
 * Success page after payment
 */
$pageTitle = 'Success';
require 'views/partials/header.php';
?>

<section class="succes-section">
    <div class="success-container">
        <div class="success-icon">✓</div>
        
        <h1>Payment Successful!</h1>
        <p class="success-subtitle">Welcome to your learning journey</p>

        <div class="success-details">
            <div class="detail-box">
                <h3>Registration Confirmed</h3>
                <?php if (isset($_SESSION['etudiant_prenom'])): ?>
                    <p>Hello <strong><?= htmlspecialchars($_SESSION['etudiant_prenom']) ?></strong>,</p>
                <?php endif; ?>
                <p>Your registration has been successfully processed and your payment has been received.</p>
            </div>

            <div class="detail-box">
                <h3>Formation Details</h3>
                <?php if (isset($_SESSION['formation_titre'])): ?>
                    <p><strong><?= htmlspecialchars($_SESSION['formation_titre']) ?></strong></p>
                <?php endif; ?>
                <p>You now have full access to all course materials, videos, and resources.</p>
            </div>

            <div class="detail-box">
                <h3>Next Steps</h3>
                <ul class="steps-list">
                    <li>Access your course dashboard</li>
                    <li>Download course materials</li>
                    <li>Complete modules at your own pace</li>
                    <li>Interact with instructors and peers</li>
                </ul>
            </div>
        </div>

        <div class="success-actions">
            <a href="index.php?page=cours" class="btn btn-primary btn-lg">
                Start Learning Now →
            </a>
            <a href="index.php" class="btn btn-secondary">
                Back to Home
            </a>
        </div>

        <div class="confirmation-note">
            <p>A confirmation email has been sent to your registered email address.</p>
        </div>
    </div>
</section>

<?php require 'views/partials/footer.php'; ?>
