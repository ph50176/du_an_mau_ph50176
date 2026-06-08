<?php

require_once PATH_MODEL . 'BaseModel.php';

class ReturnModel extends BaseModel
{
    public function create($data)
    {
        $sql = "
        INSERT INTO order_returns(
            order_id,
            user_id,
            reason
        )
        VALUES(?,?,?)
        ";

        return $this->query(
            $sql,
            [
                $data['order_id'],
                $data['user_id'],
                $data['reason']
            ]
        );
    }

    public function getAll()
    {
        $sql = "
        SELECT
            r.*,
            o.id as order_code,
            u.fullname

        FROM order_returns r

        JOIN orders o
            ON o.id = r.order_id

        JOIN users u
            ON u.id = r.user_id

        ORDER BY r.id DESC
        ";

        return $this->query($sql)
            ->fetchAll();
    }

    public function findByOrder($orderId)
    {
        return $this->query(
            "
            SELECT *
            FROM order_returns
            WHERE order_id = ?
            ",
            [$orderId]
        )->fetch();
    }

    public function updateStatus(
        $id,
        $status
    )
    {
        return $this->query(
            "
            UPDATE order_returns
            SET status=?
            WHERE id=?
            ",
            [$status,$id]
        );
    }
    public function findById($id)
{
    $sql = "
        SELECT *
        FROM order_returns
        WHERE id = ?
    ";

    return $this->query(
        $sql,
        [$id]
    )->fetch();
}
 

public function getByUser($userId)
{
    return $this->query(
        "
        SELECT
            r.*,
            o.total_amount
        FROM order_returns r
        JOIN orders o
            ON r.order_id = o.id
        WHERE r.user_id = ?
        ORDER BY r.id DESC
        ",
        [$userId]
    )->fetchAll();
}

 
}