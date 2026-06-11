<?php

require_once PATH_MODEL . 'UserModel.php';

class AuthController
{
    private UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function showRegister()
    {
        require PATH_VIEW . 'register.php';
    }

    public function register()
    {
        $fullname = trim($_POST['fullname']);
        $email = trim($_POST['email']);
        $password = $_POST['password'];

        $user = $this->userModel->findByEmail($email);

        if ($user) {
            die('Email đã tồn tại');
        }

        $this->userModel->create(
            $fullname,
            $email,
            $password
        );

        header('Location: ?action=login');
        exit;
    }

    public function showLogin()
    {
        require PATH_VIEW . 'login.php';
    }

    public function login()
    {
        $email = trim($_POST['email']);
        $password = $_POST['password'];

        $user = $this->userModel->findByEmail($email);

        if (
            !$user ||
            !password_verify($password, $user['password'])
        ) {
            die('Sai tài khoản hoặc mật khẩu');
        }

        $token = bin2hex(random_bytes(32));

        $this->userModel->updateToken(
            $user['id'],
            $token
        );

        setcookie(
            'auth_token',
            $token,
            time() + 86400 * 30,
            '/'
        );

        header('Location: ?action=/');
        exit;
    }

    public function logout()
    {
        if (!empty($_COOKIE['auth_token'])) {

            $this->userModel->clearToken(
                $_COOKIE['auth_token']
            );
        }

        setcookie(
            'auth_token',
            '',
            time() - 3600,
            '/'
        );

        header('Location: ?action=/');
        exit;
    }function requireLogin()
{
    $user = auth();

    if(!$user)
    {
        header('Location:?action=/');
        exit;
    }

    return $user;
}

}