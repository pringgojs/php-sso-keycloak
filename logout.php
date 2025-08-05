<?php
session_start();
require 'config.php';

$redirect = 'http://localhost:8000';
$logoutUrl = LOGOUT_ENDPOINT . '?' . http_build_query([
    'redirect_uri' => $redirect,
    'client_id' => KEYCLOAK_CLIENT_ID
]);

session_destroy();
header('Location: ' . $logoutUrl);
exit;
