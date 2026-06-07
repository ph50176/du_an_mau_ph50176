<?php

require_once PATH_MODEL . 'ProductModel.php';

class ProductController
{
    public function detail()
    {
        $id = $_GET['id'] ?? 0;

        $productModel = new ProductModel();

        $product = $productModel->findById($id);

        if (!$product) {
            die('Sản phẩm không tồn tại');
        }

        // Lấy sản phẩm liên quan
        $relatedProducts = $productModel->relatedProducts(
            $product['category_id'],
            $product['id']
        );

        require PATH_VIEW . 'product-detail.php';
    }
    //
    public function search()
{
    $keyword = $_GET['keyword'] ?? '';

    $productModel = new ProductModel();

    $products =
        $productModel->searchByName(
            $keyword
        );

    require PATH_VIEW . 'search.php';
}
// danh muc
public function category()
{
    $categoryId = $_GET['id'] ?? 0;

    $productModel = new ProductModel();

    $products = $productModel->getByCategory(
        $categoryId
    );

    require PATH_VIEW . 'category.php';
}
}