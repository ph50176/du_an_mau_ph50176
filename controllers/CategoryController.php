<?php

require_once PATH_MODEL . 'CategoryModel.php';
require_once PATH_MODEL . 'ProductModel.php';

class CategoryController
{
    public function show()
{
    $id = $_GET['id'];

    $categoryModel = new CategoryModel();
    $productModel = new ProductModel();

    $category = $categoryModel->findById($id);

    $products = $productModel->getByCategory($id);

    require PATH_VIEW . 'category/show.php';
}
}