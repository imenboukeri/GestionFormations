<?php
/**
 * views/paiement.php
 * Payment simulation page
 */
$pageTitle = 'Payment';
require 'views/partials/header.php';
?>

<section class="paiement-section">
    <div class="form-container">
        <div class="form-header">
            <h1>Payment Page</h1>
            <p>Complete your registration</p>
        </div>

        <?php if ($inscription): ?>
            <div class="payment-summary">
                <h2>Order Summary</h2>
                <div class="summary-item">
                    <span>Student Name:</span>
                    <strong><?= htmlspecialchars($inscription['prenom'] . ' ' . $inscription['nom']) ?></strong>
                </div>
                <div class="summary-item">
                    <span>Email:</span>
                    <strong><?= htmlspecialchars($inscription['email']) ?></strong>
                </div>
                <div class="summary-item">
                    <span>Formation:</span>
                    <strong><?= htmlspecialchars($inscription['formation_titre']) ?></strong>
                </div>
                <div class="summary-item total">
                    <span>Total Amount:</span>
                    <strong><?= $inscription['prix'] ?> DT</strong>
                </div>
            </div>

            <!-- Payment Error Alert -->
            <?php if ($erreur_paiement): ?>
                <div class="alert alert-error">
                    <strong>⚠️ Payment Failed:</strong>
                    <p>Your payment was declined. Please try again or use a different payment method.</p>
                </div>
            <?php endif; ?>

            <!-- Payment Form -->
            <form method="POST" action="index.php?page=paiement&id=<?= $inscription['id'] ?>" class="form payment-form">
                <fieldset class="payment-methods">
                    <legend>Choose Payment Option</legend>
                    
                    <div class="payment-option">
                        <input 
                            type="radio" 
                            id="payment_success" 
                            name="mode" 
                            value="ok"
                            checked
                            class="radio-input">
                        <label for="payment_success" class="radio-label">
                            <span class="icon">✓</span>
                            <span class="text">Complete Payment Successfully</span>
                        </label>
                    </div>

                    <div class="payment-option">
                        <input 
                            type="radio" 
                            id="payment_fail" 
                            name="mode" 
                            value="fail"
                            class="radio-input">
                        <label for="payment_fail" class="radio-label">
                            <span class="icon">✗</span>
                            <span class="text">Simulate Payment Failure</span>
                        </label>
                    </div>
                </fieldset>

                <div class="payment-info">
                    <p>ℹ️ This is a simulation. No actual payment will be processed.</p>
                </div>

                <button type="submit" class="btn btn-primary btn-lg">
                    Process Payment
                </button>
            </form>

            <div class="form-footer">
                <p><a href="index.php?page=inscription">← Back to registration</a></p>
            </div>
        <?php else: ?>
            <div class="alert alert-error">
                <p>Registration not found. Please start over.</p>
                <a href="index.php?page=inscription" class="btn btn-secondary">New Registration</a>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php require 'views/partials/footer.php'; ?>
