<?php

require_once PATH_MODEL . 'BaseModel.php';

class CategoryModel extends BaseModel
{
    public function getAll()
    {
        return $this->query(
            "SELECT * FROM categories ORDER BY id DESC"
        )->fetchAll();
    }
 

    public function create($name)
    {
        return $this->query(
            "INSERT INTO categories(name) VALUES(?)",
            [$name]
        );
    }

    public function update($id,$name)
    {
        return $this->query(
            "UPDATE categories SET name=? WHERE id=?",
            [$name,$id]
        );
    }

    public function delete($id)
    {
        return $this->query(
            "DELETE FROM categories WHERE id=?",
            [$id]
        );
    }
    public function findById($id)
{
    $sql = "SELECT * FROM categories WHERE id = ?";

    return $this->query(
        $sql,
        [$id]
    )->fetch();
}
}