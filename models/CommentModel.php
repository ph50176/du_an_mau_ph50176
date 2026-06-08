<?php

require_once PATH_MODEL . 'BaseModel.php';

class CommentModel extends BaseModel
{
    public function create($data)
    {
        $sql = "
        INSERT INTO comments(
            user_id,
            product_id,
            content
        )
        VALUES(?,?,?)
        ";

        return $this->query(
            $sql,
            [
                $data['user_id'],
                $data['product_id'],
                $data['content']
            ]
        );
    }

    public function getByProduct($productId)
    {
        $sql = "
        SELECT
            c.*,
            u.fullname,
            u.avatar
        FROM comments c
        JOIN users u
            ON u.id = c.user_id
        WHERE c.product_id = ?
        ORDER BY c.id DESC
        ";

        return $this->query(
            $sql,
            [$productId]
        )->fetchAll();
    }

    public function hasPurchased(
        $userId,
        $productId
    )
    {
        $sql = "
        SELECT oi.id

        FROM order_items oi

        JOIN orders o
            ON o.id = oi.order_id

        WHERE o.user_id = ?
        AND oi.product_id = ?
        AND o.status = 'completed'

        LIMIT 1
        ";

        return $this->query(
            $sql,
            [
                $userId,
                $productId
            ]
        )->fetch();
    }
}