<?php

add_action('wp_login', 'set_cookie_jwt', 10, 2);

function set_cookie_jwt($user_login, $user) {
    $user_id = $user->ID;
    $jwt = generate_jwt($user_id, $user_login);
    setcookie('wp_id', $jwt, time() + 3600, '/');
}

function base64url_encode($data) {
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

function generate_jwt($user_id, $user_login) {
    $header = [
        'alg' => 'HS256',
        'typ' => 'JWT'
    ];

    $payload = [
        'user_id' => $user_id,
				'user_login' => [$user_login],
        'iat' => time(),
        'exp' => time() + 3600
    ];

    $secret = "SECRET_JWT";

    $encoded_header = base64url_encode(json_encode($header));
    $encoded_payload = base64url_encode(json_encode($payload));

    $signature = hash_hmac('sha256', "$encoded_header.$encoded_payload", $secret, true);
    $encoded_signature = base64url_encode($signature);

    return "$encoded_header.$encoded_payload.$encoded_signature";
}


add_action('wp_logout', 'delete_jwt_cookie');
function delete_jwt_cookie() {
    setcookie('wp_id', '', time() - 3600, '/');
}
