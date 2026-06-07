<?php

require_once PATH_MODEL . 'UserModel.php';

class AdminUserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $users =
            $this->userModel->getAllUsers();

        require PATH_VIEW .
            'admin/users/index.php';
    }

    public function delete()
    {
        $this->userModel->deleteUser(
            $_GET['id']
        );

        header(
            'Location:?action=admin-users'
        );
    }
}