<?php

require_once PATH_MODEL . 'ProductModel.php';
require_once PATH_MODEL . 'CategoryModel.php';

class AdminProductController
{
    private ProductModel $productModel;
    private CategoryModel $categoryModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        $products = $this->productModel->getAll();

        require PATH_VIEW . 'admin/products/index.php';
    }

    public function create()
    {
        $categories = $this->categoryModel->getAll();

        require PATH_VIEW . 'admin/products/create.php';
    }

    public function store()
    {
        $thumbnail = '';

        if (!empty($_FILES['thumbnail_file']['name'])) {

            $fileName =
                time() . '_' .
                basename($_FILES['thumbnail_file']['name']);

            move_uploaded_file(
                $_FILES['thumbnail_file']['tmp_name'],
                PATH_ROOT . 'assets/uploads/' . $fileName
            );

            $thumbnail =
                BASE_URL .
                'assets/uploads/' .
                $fileName;
        }

        $data = [
            'name'        => $_POST['name'],
            'price'       => $_POST['price'],
            'stock'       => $_POST['stock'],
            'description' => $_POST['description'],
            'category_id' => $_POST['category_id'],
            'status'      => $_POST['status'],
            'thumbnail'   => $thumbnail
        ];

        $this->productModel->create($data);

        header('Location:?action=admin-products');
        exit;
    }

    public function edit()
    {
        $id = $_GET['id'];

        $product = $this->productModel->findById($id);

        $categories = $this->categoryModel->getAll();

        require PATH_VIEW . 'admin/products/edit.php';
    }

    public function update()
    {
        $id = $_GET['id'];

        $product =
            $this->productModel->findById($id);

        $thumbnail =
            $product['thumbnail'];

        if (!empty($_FILES['thumbnail_file']['name'])) {

            $fileName =
                time() . '_' .
                basename($_FILES['thumbnail_file']['name']);

            move_uploaded_file(
                $_FILES['thumbnail_file']['tmp_name'],
                PATH_ROOT . 'assets/uploads/' . $fileName
            );

            $thumbnail =
                BASE_URL .
                'assets/uploads/' .
                $fileName;
        }

        $data = [
            'name'        => $_POST['name'],
            'price'       => $_POST['price'],
            'stock'       => $_POST['stock'],
            'description' => $_POST['description'],
            'category_id' => $_POST['category_id'],
            'status'      => $_POST['status'],
            'thumbnail'   => $thumbnail
        ];

        $this->productModel->update(
            $id,
            $data
        );

        header('Location:?action=admin-products');
        exit;
    }

    public function delete()
    {
        $this->productModel->delete(
            $_GET['id']
        );

        header(
            'Location:?action=admin-products'
        );
        exit;
    }
    
}