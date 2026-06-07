<?php

require_once PATH_MODEL . 'CategoryModel.php';

class AdminCategoryController
{
    private $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        $categories =
            $this->categoryModel->getAll();

        require PATH_VIEW .
            'admin/categories/index.php';
    }

    public function create()
    {
        require PATH_VIEW .
            'admin/categories/create.php';
    }

    public function store()
    {
        $this->categoryModel->create(
            $_POST['name']
        );

        header(
            'Location:?action=admin-categories'
        );
    }

    public function edit()
    {
        $category =
            $this->categoryModel->findById(
                $_GET['id']
            );

        require PATH_VIEW .
            'admin/categories/edit.php';
    }

    public function update()
    {
        $this->categoryModel->update(
            $_GET['id'],
            $_POST['name']
        );

        header(
            'Location:?action=admin-categories'
        );
    }

    public function delete()
    {
        $this->categoryModel->delete(
            $_GET['id']
        );

        header(
            'Location:?action=admin-categories'
        );
    }
}