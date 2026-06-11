<?php

require_once PATH_MODEL.'BaseModel.php';

class OrderModel extends BaseModel
{
    public function create($data)
    {
        $sql = "
        INSERT INTO orders(
            user_id,
            fullname,
            phone,
            address,
            total_amount
        )
        VALUES(?,?,?,?,?)
        ";

         $this->query(
    $sql,
    [
        $data['user_id'],
        $data['fullname'],
        $data['phone'],
        $data['address'],
        $data['total_amount']
    ]
);

return $this->query(
    "SELECT LAST_INSERT_ID() AS id"
)->fetch()['id'];
    }

    public function getByUserId($userId)
    {
        return $this->query(
            "SELECT * FROM orders
             WHERE user_id = ?
             ORDER BY id DESC",
            [$userId]
        )->fetchAll();
    }
    public function findById($id)
{
    return $this->query(
        "SELECT *
        FROM orders
        WHERE id = ?",
        [$id]
    )->fetch();
}
public function getAll()
{
    return $this->query(
        "SELECT *
         FROM orders
         ORDER BY id DESC"
    )->fetchAll();
}
public function updateStatus($id, $status)
{
    return $this->query(
        "UPDATE orders
         SET status = ?
         WHERE id = ?",
        [
            $status,
            $id
        ]
    );
}

}