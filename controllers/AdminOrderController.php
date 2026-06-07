<?php

require_once PATH_MODEL . 'OrderModel.php';

class AdminOrderController
{
    private $orderModel;

    public function __construct()
    {
        $this->orderModel =
            new OrderModel();
    }

    public function index()
    {
        $orders =
            $this->orderModel->getAll();

        require PATH_VIEW .
            'admin/orders/index.php';
    }

    public function updateStatus()
    {
        $this->orderModel->updateStatus(
            $_GET['id'],
            $_GET['status']
        );

        header(
            'Location:?action=admin-orders'
        );
    }
}