<?php
// ============================================
// MAGHREB FC - Configuration
// ============================================

define('DB_HOST', 'localhost');
define('DB_USER', 'root');          // Modifier selon votre config
define('DB_PASS', '');              // Modifier selon votre config
define('DB_NAME', 'maghreb_fc');

define('SITE_NAME', 'Maghreb FC');
define('SITE_URL', 'http://localhost/maghreb-fc'); // Modifier selon votre hébergement
define('CONTACT_EMAIL', 'charif.elbakkali8@gmail.com');
define('ADMIN_EMAIL', 'charif.elbakkali8@gmail.com');

// Connexion PDO
function getDB() {
    static $pdo = null;
    if ($pdo === null) {
        try {
            $pdo = new PDO(
                'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4',
                DB_USER,
                DB_PASS,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false
                ]
            );
        } catch (PDOException $e) {
            die('Erreur connexion DB: ' . $e->getMessage());
        }
    }
    return $pdo;
}

// Session sécurisée
function startSecureSession() {
    if (session_status() === PHP_SESSION_NONE) {
        ini_set('session.cookie_httponly', 1);
        ini_set('session.use_strict_mode', 1);
        session_start();
    }
}

// Vérification admin
function isAdmin() {
    startSecureSession();
    return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
}

function requireAdmin() {
    if (!isAdmin()) {
        header('Location: ../admin/login.php');
        exit;
    }
}

// Sanitize input
function sanitize($input) {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

// CSRF Token
function generateCsrfToken() {
    startSecureSession();
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function verifyCsrfToken($token) {
    startSecureSession();
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}
?>