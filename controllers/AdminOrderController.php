<?php

require_once PATH_MODEL . 'OrderModel.php';
require_once PATH_MODEL . 'OrderItemModel.php';

class AdminOrderController
{
    private $orderModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
    }

    public function index()
    {
        $orders = $this->orderModel->getAll();

        require PATH_VIEW .
            'admin/orders/index.php';
    }

    public function detail()
    {
        $order =
            $this->orderModel->findById(
                $_GET['id']
            );

        $orderItemModel =
            new OrderItemModel();

        $items =
            $orderItemModel->getByOrder(
                $_GET['id']
            );

        require PATH_VIEW .
            'admin/orders/detail.php';
    }

    public function updateStatus()
    {
        $id = $_GET['id'];
        $newStatus = $_GET['status'];

        $order =
            $this->orderModel->findById(
                $id
            );

        if (!$order) {

            die('Đơn hàng không tồn tại');
        }

        $allowed = [

            'pending' => [
                'processing',
                'cancelled'
            ],

            'processing' => [
                'shipping',
                'cancelled'
            ],

            'shipping' => [
                'completed'
            ],

            'completed' => [],

            'cancelled' => []

        ];

        if (
            !in_array(
                $newStatus,
                $allowed[$order['status']]
            )
        ) {

            die(
                'Trạng thái không hợp lệ'
            );
        }

        $this->orderModel->updateStatus(
            $id,
            $newStatus
        );

        header(
            'Location:?action=admin-orders'
        );
        exit;
    }
}