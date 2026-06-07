<?php

require_once PATH_MODEL . 'BaseModel.php';

class CartModel extends BaseModel
{
    public function findCartItem($userId, $productId)
    {
        $sql = "
            SELECT *
            FROM carts
            WHERE user_id = ?
            AND product_id = ?
        ";

        return $this->query($sql, [
            $userId,
            $productId
        ])->fetch();
    }

    public function add($userId, $productId)
    {
        $cartItem = $this->findCartItem(
            $userId,
            $productId
        );

        if ($cartItem) {

            $sql = "
                UPDATE carts
                SET quantity = quantity + 1
                WHERE id = ?
            ";

            return $this->query($sql, [
                $cartItem['id']
            ]);
        }

        $sql = "
            INSERT INTO carts(
                user_id,
                product_id,
                quantity
            )
            VALUES(
                ?,
                ?,
                1
            )
        ";

        return $this->query($sql, [
            $userId,
            $productId
        ]);
    }

    public function getCart($userId)
    {
        $sql = "
            SELECT
                c.id,
                c.quantity,
                p.id as product_id,
                p.name,
                p.thumbnail,
                p.price
            FROM carts c
            INNER JOIN products p
                ON c.product_id = p.id
            WHERE c.user_id = ?
        ";

        return $this->query($sql, [
            $userId
        ])->fetchAll();
    }

    public function increase($id)
    {
        return $this->query(
            "UPDATE carts SET quantity = quantity + 1 WHERE id = ?",
            [$id]
        );
    }

    public function decrease($id)
    {
        return $this->query(
            "UPDATE carts SET quantity = quantity - 1 WHERE id = ? AND quantity > 1",
            [$id]
        );
    }

    public function delete($id)
    {
        return $this->query(
            "DELETE FROM carts WHERE id = ?",
            [$id]
        );
    }
    //Hiển thị số lượng giỏ hàng trên Header
    public function countCart($userId)
{
    $sql = "
        SELECT SUM(quantity) total
        FROM carts
        WHERE user_id = ?
    ";

    return $this->query($sql, [
        $userId
    ])->fetch();
}
}