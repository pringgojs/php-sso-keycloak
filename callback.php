<?php
session_start();
require 'config.php';

if ($_GET['state'] !== $_SESSION['oauth2state']) {
    exit('Invalid state');
}

$code = $_GET['code'] ?? null;

if (!$code) {
    exit('No code provided');
}

// Tukar code dengan token
$response = file_get_contents(TOKEN_ENDPOINT, false, stream_context_create([
    'http' => [
        'method' => 'POST',
        'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
        'content' => http_build_query([
            'grant_type' => 'authorization_code',
            'code' => $code,
            'redirect_uri' => REDIRECT_URI,
            'client_id' => KEYCLOAK_CLIENT_ID,
            'client_secret' => KEYCLOAK_CLIENT_SECRET,
        ])
    ]
]));

$data = json_decode($response, true);
$accessToken = $data['access_token'] ?? null;

if (!$accessToken) {
    exit('Failed to obtain access token');
}

// Ambil data user
$userinfo = file_get_contents(USERINFO_ENDPOINT, false, stream_context_create([
    'http' => [
        'header' => "Authorization: Bearer " . $accessToken
    ]
]));

$_SESSION['user'] = json_decode($userinfo, true);
$_SESSION['access_token'] = $data['access_token'];
$_SESSION['id_token'] = $data['id_token']; // tambahkan ini
header('Location: index.php');
