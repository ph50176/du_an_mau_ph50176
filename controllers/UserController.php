<?php

class UserController
{
    public function profile()
{
    $user = auth();

    require_once PATH_MODEL . 'OrderModel.php';

    $orderModel = new OrderModel();

    $orders = $orderModel->getByUserId(
        $user['id']
    );

    require PATH_VIEW . 'profile.php';
}
//
public function updateAvatar()
{
    $user = auth();

    if (!empty($_FILES['avatar']['name']))
    {
        $fileName =
            time().'_'.
            $_FILES['avatar']['name'];

        move_uploaded_file(
            $_FILES['avatar']['tmp_name'],
            PATH_ROOT .
            'assets/uploads/' .
            $fileName
        );

        $avatar =
            BASE_URL .
            'assets/uploads/' .
            $fileName;

        $userModel = new UserModel();

        $userModel->updateAvatar(
            $user['id'],
            $avatar
        );
    }

    header(
        'Location:?action=profile'
    );
}
//
public function changePassword()
{
    require PATH_VIEW . 'change-password.php';
}//
public function updatePassword()
{
    $user = auth();

    $oldPassword = $_POST['old_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($newPassword != $confirmPassword)
    {
        die('Mật khẩu xác nhận không đúng');
    }

    $userModel = new UserModel();

    $currentUser =
        $userModel->findById($user['id']);

    if (
        !password_verify(
            $oldPassword,
            $currentUser['password']
        )
    ) {
        die('Mật khẩu cũ không đúng');
    }

    $userModel->updatePassword(
        $user['id'],
        password_hash(
            $newPassword,
            PASSWORD_DEFAULT
        )
    );

    header('Location:?action=profile');
}
}