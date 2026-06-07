<?php

require_once PATH_MODEL . 'BaseModel.php';

class UserModel extends BaseModel
{
    public function findByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = ?";

        return $this->query($sql, [$email])->fetch();
    }

    public function create($fullname, $email, $password)
    {
        $sql = "
            INSERT INTO users(
                fullname,
                email,
                password
            )
            VALUES(?,?,?)
        ";

        return $this->query($sql, [
            $fullname,
            $email,
            password_hash($password, PASSWORD_DEFAULT)
        ]);
    }

    public function updateToken($userId, $token)
    {
        $sql = "
            UPDATE users
            SET remember_token = ?
            WHERE id = ?
        ";

        return $this->query($sql, [$token, $userId]);
    }

    public function getUserByToken($token)
    {
        $sql = "
            SELECT *
            FROM users
            WHERE remember_token = ?
        ";

        return $this->query($sql, [$token])->fetch();
    }

    public function clearToken($token)
    {
        $sql = "
            UPDATE users
            SET remember_token = NULL
            WHERE remember_token = ?
        ";

        return $this->query($sql, [$token]);
    }
    // admin quản ly user 
    public function getAllUsers()
{
    return $this->query(
        "SELECT * FROM users ORDER BY id DESC"
    )->fetchAll();
}

public function deleteUser($id)
{
    return $this->query(
        "DELETE FROM users WHERE id=?",
        [$id]
    );
}
//
public function updateAvatar(
    $id,
    $avatar
)
{
    return $this->query(
        "UPDATE users
         SET avatar = ?
         WHERE id = ?",
        [$avatar, $id]
    );
}//
public function updatePassword(
    $id,
    $password
)
{
    return $this->query(
        "UPDATE users
         SET password = ?
         WHERE id = ?",
        [$password, $id]
    );
}
//
public function findById($id)
{
    return $this->query(
        "SELECT * FROM users WHERE id=?",
        [$id]
    )->fetch();
}
}