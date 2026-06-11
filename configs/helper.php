<?php

function auth()
{
    if (empty($_COOKIE['auth_token'])) {
        return null;
    }

    require_once PATH_MODEL . 'UserModel.php';

    $userModel = new UserModel();

    return $userModel->getUserByToken(
        $_COOKIE['auth_token']
    );
}
function isAdmin()
{
    $user = auth();

    if (!$user) {
        return false;
    }

    return isset($user['role'])
        && $user['role'] === 'admin';
}