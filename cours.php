<?php
/**
 * views/cours.php
 * Course content page (protected by session check in index.php)
 */
$pageTitle = 'My Courses';
require 'views/partials/header.php';
?>

<section class="cours-section">
    <div class="section-header">
        <h1>My Courses</h1>
        <p>Welcome to your personalized learning experience</p>
    </div>

    <?php if (isset($_SESSION['formation_titre'])): ?>
        <div class="course-welcome">
            <div class="welcome-card">
                <h2><?= htmlspecialchars($_SESSION['formation_titre']) ?></h2>
                <p>Congratulations! You now have full access to this course.</p>
                <p class="welcome-subtitle">Learn at your own pace and achieve your goals</p>
            </div>
        </div>
    <?php endif; ?>

    <?php if (!empty($formation_courante['chapitres'])): ?>
        <div class="chapters-container">
            <h2>Course Chapters</h2>
            <div class="chapters-grid">
                <?php foreach ($formation_courante['chapitres'] as $index => $chapitre): ?>
                    <div class="chapter-card">
                        <div class="chapter-number">
                            <?= $index + 1 ?>
                        </div>
                        <div class="chapter-content">
                            <h3><?= htmlspecialchars($chapitre['titre']) ?></h3>
                            <p><?= htmlspecialchars($chapitre['description']) ?></p>
                        </div>
                        <div class="chapter-footer">
                            <span class="status">Unlocked</span>
                            <a href="#" class="btn btn-small">Start Lesson</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php else: ?>
        <div class="no-data">
            <p>Course materials are being prepared. Please check back soon!</p>
        </div>
    <?php endif; ?>

    <section class="course-resources">
        <h2>Course Resources</h2>
        <div class="resources-grid">
            <div class="resource-card">
                <div class="resource-icon">📚</div>
                <h3>Study Materials</h3>
                <p>Access comprehensive study guides and handouts</p>
            </div>
            <div class="resource-card">
                <div class="resource-icon">🎥</div>
                <h3>Video Lectures</h3>
                <p>Watch high-quality lecture videos on demand</p>
            </div>
            <div class="resource-card">
                <div class="resource-icon">📝</div>
                <h3>Assignments</h3>
                <p>Complete assignments and get feedback from instructors</p>
            </div>
            <div class="resource-card">
                <div class="resource-icon">💬</div>
                <h3>Support Forum</h3>
                <p>Connect with other students and get help from mentors</p>
            </div>
        </div>
    </section>

    <div class="course-footer-section">
        <p>Questions? <a href="#">Contact our support team</a></p>
        <a href="index.php" class="btn btn-secondary">Back to Home</a>
    </div>
</section>

<?php require 'views/partials/footer.php'; ?>
