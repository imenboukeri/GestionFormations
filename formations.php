<?php
/**
 * views/formations.php
 * Display all available formations
 */
$pageTitle = 'Formations';
require 'views/partials/header.php';
?>

<section class="formations-section">
    <div class="section-header">
        <h1>Our Formations</h1>
        <p>Choose from our range of professional development programs</p>
    </div>

    <?php if (!empty($formations)): ?>
        <div class="formations-grid">
            <?php foreach ($formations as $formation): ?>
                <div class="formation-card">
                    <div class="formation-header">
                        <h2><?= htmlspecialchars($formation['titre']) ?></h2>
                        <div class="formation-meta">
                            <span class="badge"><?= htmlspecialchars($formation['niveau']) ?></span>
                        </div>
                    </div>

                    <div class="formation-body">
                        <p class="description"><?= htmlspecialchars(substr($formation['description'], 0, 100)) ?>...</p>
                        
                        <div class="formation-details">
                            <div class="detail">
                                <span class="label">Duration:</span>
                                <span class="value"><?= htmlspecialchars($formation['duree']) ?></span>
                            </div>
                            <div class="detail">
                                <span class="label">Price:</span>
                                <span class="price"><?= $formation['prix'] ?> DT</span>
                            </div>
                        </div>
                    </div>

                    <div class="formation-footer">
                        <a href="index.php?page=inscription&formation_id=<?= $formation['id'] ?>" class="btn btn-primary btn-block">
                            Register Now
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="no-data">
            <p>No formations available at the moment.</p>
            <a href="index.php" class="btn btn-secondary">Back to Home</a>
        </div>
    <?php endif; ?>
</section>

<?php require 'views/partials/footer.php'; ?>
