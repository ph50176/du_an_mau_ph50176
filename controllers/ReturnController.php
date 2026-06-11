<?php

require_once PATH_MODEL . 'ReturnModel.php';
require_once PATH_MODEL . 'OrderModel.php';

class ReturnController
{
    public function create()
    {
        $orderId = $_GET['id'];

        $returnModel = new ReturnModel();

        $exists = $returnModel->findByOrder($orderId);

        if($exists)
        {
            die('Đơn hàng này đã gửi yêu cầu hoàn hàng');
        }

        require PATH_VIEW . 'orders/return.php';
    }

    public function store()
    {
        $orderId = $_GET['id'];

        $returnModel = new ReturnModel();

        $exists = $returnModel->findByOrder($orderId);

        if($exists)
        {
            die('Đơn hàng này đã được yêu cầu hoàn hàng');
        }

        $returnModel->create([
            'order_id' => $orderId,
            'user_id'  => auth()['id'],
            'reason'   => $_POST['reason']
        ]);

        header('Location:?action=profile');
        exit;
    }
}