<?php
session_start();
require 'config.php';

// Ambil ID Token dari session
$idToken = $_SESSION['id_token'] ?? null;

// Hancurkan session lokal
session_destroy();

// Bangun URL logout Keycloak
$params = [];

if ($idToken) {
    $params['id_token_hint'] = $idToken;
}

// Redirect balik ke app setelah logout
$params['post_logout_redirect_uri'] = 'http://localhost:8000';

$logoutUrl = LOGOUT_ENDPOINT . '?' . http_build_query($params);

// Arahkan ke logout Keycloak
header('Location: ' . $logoutUrl);
exit;
