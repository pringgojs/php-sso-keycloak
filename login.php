<?php
session_start();
require 'config.php';

$state = bin2hex(random_bytes(8));
$_SESSION['oauth2state'] = $state;

$params = [
    'client_id' => KEYCLOAK_CLIENT_ID,
    'response_type' => 'code',
    'scope' => 'openid profile email',
    'redirect_uri' => REDIRECT_URI,
    'state' => $state
];

header('Location: ' . AUTHORIZATION_ENDPOINT . '?' . http_build_query($params));
exit;
