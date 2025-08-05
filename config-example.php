<?php
define('KEYCLOAK_BASE_URL', 'YOUR KEYCLOAK BASE URL HERE');
define('KEYCLOAK_REALM', 'YOUR REALM HERE');
define('KEYCLOAK_CLIENT_ID', 'YOUR CLIENT ID HERE');
define('KEYCLOAK_CLIENT_SECRET', 'YOUR SECRET HERE');
define('REDIRECT_URI', 'http://localhost:8000/callback.php');

define('AUTHORIZATION_ENDPOINT', KEYCLOAK_BASE_URL . '/realms/' . KEYCLOAK_REALM . '/protocol/openid-connect/auth');
define('TOKEN_ENDPOINT', KEYCLOAK_BASE_URL . '/realms/' . KEYCLOAK_REALM . '/protocol/openid-connect/token');
define('USERINFO_ENDPOINT', KEYCLOAK_BASE_URL . '/realms/' . KEYCLOAK_REALM . '/protocol/openid-connect/userinfo');
define('LOGOUT_ENDPOINT', KEYCLOAK_BASE_URL . '/realms/' . KEYCLOAK_REALM . '/protocol/openid-connect/logout');
