<?php
/**
 * views/home.php
 * Home page - landing page of the platform
 */
$pageTitle = 'Home';
require 'views/partials/header.php';
?>

<section class="hero">
    <div class="hero-content">
        <h1>Welcome to GestionFormations</h1>
        <p>Your Gateway to Professional Learning</p>
        <p class="hero-subtitle">Explore our comprehensive training programs and start your learning journey today</p>
        <a href="index.php?page=formations" class="btn btn-primary btn-lg">Explore Formations</a>
    </div>
    <div class="hero-background"></div>
</section>

<section class="features">
    <h2>Why Choose GestionFormations?</h2>
    <div class="features-grid">
        <div class="feature-card">
            <div class="feature-icon">🎯</div>
            <h3>Expert-Designed Curriculum</h3>
            <p>Courses crafted by industry professionals with years of experience</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">🚀</div>
            <h3>Learn at Your Pace</h3>
            <p>Flexible learning schedules that fit your lifestyle and commitments</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">📚</div>
            <h3>Comprehensive Content</h3>
            <p>In-depth modules covering theory and practical applications</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">🏆</div>
            <h3>Recognized Certificates</h3>
            <p>Earn professional certificates upon successful completion</p>
        </div>
    </div>
</section>

<section class="cta-section">
    <h2>Ready to Transform Your Career?</h2>
    <p>Browse our formations and take the first step toward your professional goals</p>
    <div class="cta-buttons">
        <a href="index.php?page=formations" class="btn btn-primary">View All Formations</a>
        <a href="index.php?page=inscription" class="btn btn-secondary">Register Now</a>
    </div>
</section>

<?php require 'views/partials/footer.php'; ?>
