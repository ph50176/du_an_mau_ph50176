<?php

class HomeController
{
    public function index()
{
    $productModel = new ProductModel();

    $products = $productModel->getAll();

    require PATH_VIEW . 'home/index.php';
}
}