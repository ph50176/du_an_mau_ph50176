<?php

require_once PATH_MODEL . 'CartModel.php';

class CartController
{
    private CartModel $cartModel;

    public function __construct()
    {
        $this->cartModel = new CartModel();
    }

    public function add()
    {
        $user = auth();

        if (!$user) {
            header('Location:?action=login');
            exit;
        }

        $productId = $_GET['id'];

        $this->cartModel->add(
            $user['id'],
            $productId
        );

        header('Location:?action=cart');
        exit;
    }

    public function index()
    {
        $user = auth();

        if (!$user) {
            header('Location:?action=login');
            exit;
        }

        $carts = $this->cartModel->getCart(
            $user['id']
        );

        require PATH_VIEW . 'cart.php';
    }

    public function increase()
    {
        $this->cartModel->increase($_GET['id']);

        header('Location:?action=cart');
    }

    public function decrease()
    {
        $this->cartModel->decrease($_GET['id']);

        header('Location:?action=cart');
    }

    public function delete()
    {
        $this->cartModel->delete($_GET['id']);

        header('Location:?action=cart');
    }
}