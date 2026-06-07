<?php

require_once PATH_MODEL . 'BaseModel.php';

class OrderModel extends BaseModel
{
    public function getByUserId($userId)
    {
        $sql = "
            SELECT *
            FROM orders
            WHERE user_id = ?
            ORDER BY id DESC
        ";

        return $this->query(
            $sql,
            [$userId]
        )->fetchAll();
    }
}