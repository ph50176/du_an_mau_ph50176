<?php

require_once PATH_MODEL . 'ProductModel.php';
require_once PATH_MODEL .
'CommentModel.php';
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


$commentModel =
    new CommentModel();

$comments =
    $commentModel->getByProduct(
        $id
    );

$canComment = false;

if(auth())
{
    $canComment =
        $commentModel->hasPurchased(
            auth()['id'],
            $id
        );
}
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

public function index(){
        $productModel = new ProductModel();

        $products = $productModel->getAll();


    require_once PATH_VIEW.'layouts/header.php';


    require_once PATH_VIEW.'products.php';


    require_once PATH_VIEW.'layouts/footer.php';

}
}