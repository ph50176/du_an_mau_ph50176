<?php

require_once PATH_MODEL.'BaseModel.php';

class OrderItemModel extends BaseModel
{
    public function create($data)
    {
        return $this->query(
            "INSERT INTO order_items(
                order_id,
                product_id,
                product_name,
                price,
                quantity,
                subtotal
            )
            VALUES(?,?,?,?,?,?)",
            [
                $data['order_id'],
                $data['product_id'],
                $data['product_name'],
                $data['price'],
                $data['quantity'],
                $data['subtotal']
            ]
        );
    }
    public function getByOrder($orderId)
    {
        return $this->query(
            "SELECT *
            FROM order_items
            WHERE order_id = ?",
            [$orderId]
        )->fetchAll();
    }
}