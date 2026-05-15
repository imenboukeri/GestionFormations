-- ═══════════════════════════════════════════════════════════════════════
-- Database: gestion_formations
-- Script de création de la base de données et des tables
-- ═══════════════════════════════════════════════════════════════════════

-- Drop database if it exists (optional, for fresh setup)
-- DROP DATABASE IF EXISTS gestion_formations;

-- Create database
CREATE DATABASE IF NOT EXISTS gestion_formations;
USE gestion_formations;

-- ─────────────────────────────────────────────────────────────────────
-- Table: formations
-- Description: Stores all available training programs
-- ─────────────────────────────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS formations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(255) NOT NULL UNIQUE,
    description TEXT NOT NULL,
    prix DECIMAL(10, 2) NOT NULL,
    duree VARCHAR(100) NOT NULL,
    niveau VARCHAR(100) NOT NULL,
    image VARCHAR(255),
    contenu LONGTEXT,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_titre (titre)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ─────────────────────────────────────────────────────────────────────
-- Table: inscriptions
-- Description: Stores student registrations
-- ─────────────────────────────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS inscriptions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    formation_id INT NOT NULL,
    statut_paiement ENUM('en_attente', 'paye', 'refusee') DEFAULT 'en_attente',
    date_inscription TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (formation_id) REFERENCES formations(id) ON DELETE CASCADE,
    INDEX idx_email (email),
    INDEX idx_formation_id (formation_id),
    UNIQUE KEY unique_inscription (email, formation_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ═══════════════════════════════════════════════════════════════════════
-- INSERT DATA
-- ═══════════════════════════════════════════════════════════════════════

-- Insert sample formations
INSERT INTO formations (titre, description, prix, duree, niveau, contenu) VALUES
(
    'Intelligence Artificielle',
    'Discover the fundamentals and advanced concepts of artificial intelligence. Learn machine learning, deep learning, and neural networks. This comprehensive course covers everything from basic AI principles to state-of-the-art techniques used in industry.',
    499.99,
    '12 weeks',
    'Advanced',
    'Chapter 1: Introduction to AI\nChapter 2: Machine Learning Fundamentals\nChapter 3: Deep Learning & Neural Networks\nChapter 4: Natural Language Processing\nChapter 5: Computer Vision\nChapter 6: AI Applications'
),
(
    'Data Science',
    'Master the art and science of extracting insights from data. Learn data collection, cleaning, analysis, visualization, and predictive modeling. This course transforms you into a data-driven decision maker with practical skills.',
    449.99,
    '10 weeks',
    'Intermediate',
    'Chapter 1: Data Collection & Preparation\nChapter 2: Exploratory Data Analysis\nChapter 3: Statistical Analysis\nChapter 4: Data Visualization\nChapter 5: Predictive Modeling\nChapter 6: Real-world Projects'
),
(
    'Web Development',
    'Learn to build modern, responsive web applications. From HTML and CSS basics to advanced JavaScript and backend development with PHP and databases. Create professional websites and web applications.',
    399.99,
    '8 weeks',
    'Beginner',
    'Chapter 1: HTML & CSS Fundamentals\nChapter 2: JavaScript Essentials\nChapter 3: Responsive Design\nChapter 4: Frontend Frameworks\nChapter 5: Backend with PHP\nChapter 6: Databases & SQL'
),
(
    'Cloud Computing',
    'Explore cloud technologies and architecture. Learn AWS, Azure, and Google Cloud services. Master cloud deployment, scaling, security, and DevOps practices for modern application development.',
    529.99,
    '14 weeks',
    'Advanced',
    'Chapter 1: Cloud Fundamentals\nChapter 2: AWS Services\nChapter 3: Cloud Architecture\nChapter 4: Cloud Security\nChapter 5: DevOps & CI/CD\nChapter 6: Serverless Computing'
);

-- ═══════════════════════════════════════════════════════════════════════
-- Verification Queries (for checking data)
-- ═══════════════════════════════════════════════════════════════════════

-- SELECT COUNT(*) as total_formations FROM formations;
-- SELECT * FROM formations;
-- SELECT * FROM inscriptions;
