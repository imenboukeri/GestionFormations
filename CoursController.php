<?php
/**
 * controllers/CoursController.php
 * Role: Prepare course data for enrolled students
 * (This page is protected by session check in index.php)
 */

require_once dirname(__DIR__) . '/models/Formation.php';

// Get the formation ID from session
$formation_id = isset($_SESSION['formation_id']) ? (int)$_SESSION['formation_id'] : null;

// Define courses with chapters
$formations_detail = [
    1 => [
        'titre' => 'Intelligence Artificielle',
        'chapitres' => [
            ['titre' => 'Introduction to AI', 'description' => 'Basics of artificial intelligence and machine learning'],
            ['titre' => 'Machine Learning Algorithms', 'description' => 'Supervised and unsupervised learning techniques'],
            ['titre' => 'Deep Learning & Neural Networks', 'description' => 'Advanced neural network architectures'],
            ['titre' => 'Natural Language Processing', 'description' => 'Understanding and processing human language'],
            ['titre' => 'AI Applications', 'description' => 'Real-world applications of AI technologies'],
        ]
    ],
    2 => [
        'titre' => 'Data Science',
        'chapitres' => [
            ['titre' => 'Data Collection & Preparation', 'description' => 'Gathering and cleaning data'],
            ['titre' => 'Exploratory Data Analysis', 'description' => 'Understanding data patterns'],
            ['titre' => 'Statistical Analysis', 'description' => 'Statistical methods for data analysis'],
            ['titre' => 'Data Visualization', 'description' => 'Creating meaningful visualizations'],
            ['titre' => 'Predictive Modeling', 'description' => 'Building and evaluating models'],
        ]
    ],
    3 => [
        'titre' => 'Web Development',
        'chapitres' => [
            ['titre' => 'HTML & CSS Fundamentals', 'description' => 'Structure and styling of web pages'],
            ['titre' => 'JavaScript Essentials', 'description' => 'Client-side interactivity'],
            ['titre' => 'Responsive Design', 'description' => 'Mobile-first web design'],
            ['titre' => 'Backend with PHP', 'description' => 'Server-side programming'],
            ['titre' => 'Databases & SQL', 'description' => 'Data storage and retrieval'],
        ]
    ],
    4 => [
        'titre' => 'Cloud Computing',
        'chapitres' => [
            ['titre' => 'Cloud Fundamentals', 'description' => 'Introduction to cloud services'],
            ['titre' => 'AWS Services', 'description' => 'Amazon Web Services overview'],
            ['titre' => 'Cloud Architecture', 'description' => 'Designing scalable systems'],
            ['titre' => 'Cloud Security', 'description' => 'Securing cloud applications'],
            ['titre' => 'DevOps & CI/CD', 'description' => 'Continuous integration and deployment'],
        ]
    ],
];

// Get the current formation details
$formation_courante = isset($formations_detail[$formation_id]) 
    ? $formations_detail[$formation_id] 
    : ['titre' => $_SESSION['formation_titre'] ?? 'Formation', 'chapitres' => []];

// Load the view
require dirname(__DIR__) . '/views/cours.php';
?>
