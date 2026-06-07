<?php

require_once PATH_MODEL . 'BaseModel.php';

class ProductModel extends BaseModel
{
    public function getAll()
    {
        $sql = "
            SELECT
                p.*,
                c.name as category_name
            FROM products p
            LEFT JOIN categories c
                ON p.category_id = c.id
            ORDER BY p.id DESC
        ";

        return $this->query($sql)->fetchAll();
    }
    // lấy sản phẩm theo id
    public function findById($id)
{
    $sql = "
        SELECT
            p.*,
            c.name AS category_name
        FROM products p
        LEFT JOIN categories c
            ON p.category_id = c.id
        WHERE p.id = ?
    ";

    return $this->query($sql, [$id])->fetch();
}
//Sản phẩm liên quan
public function relatedProducts($categoryId, $currentId)
{
    $sql = "
        SELECT *
        FROM products
        WHERE category_id = ?
        AND id != ?
        LIMIT 4
    ";

    return $this->query($sql, [
        $categoryId,
        $currentId
    ])->fetchAll();
}
//
public function create($data)
{
    $sql = "
        INSERT INTO products(
            category_id,
            name,
            description,
            thumbnail,
            price,
            stock
        )
        VALUES(
            ?,?,?,?,?,?
        )
    ";

    return $this->query($sql,[
        $data['category_id'],
        $data['name'],
        $data['description'],
        $data['thumbnail'],
        $data['price'],
        $data['stock']
    ]);
}
//
public function update($id,$data)
{
    $sql = "
        UPDATE products
        SET
            category_id=?,
            name=?,
            description=?,
            thumbnail=?,
            price=?,
            stock=?
        WHERE id=?
    ";

    return $this->query($sql,[
        $data['category_id'],
        $data['name'],
        $data['description'],
        $data['thumbnail'],
        $data['price'],
        $data['stock'],
        $id
    ]);
}
//
public function delete($id)
{
    return $this->query(
        "DELETE FROM products WHERE id=?",
        [$id]
    );
}
//
public function searchByName($keyword)
{
    $sql = "
        SELECT *
        FROM products
        WHERE name LIKE ?
    ";

    return $this->query(
        $sql,
        ['%' . $keyword . '%']
    )->fetchAll();
}
 
public function getByCategory($categoryId)
{
    $sql = "
        SELECT *
        FROM products
        WHERE category_id = ?
        AND status = 1
        ORDER BY id DESC
    ";

    return $this->query(
        $sql,
        [$categoryId]
    )->fetchAll();
}
}