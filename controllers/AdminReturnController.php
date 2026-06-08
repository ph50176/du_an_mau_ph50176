<?php

require_once PATH_MODEL . 'ReturnModel.php';
require_once PATH_MODEL . 'OrderModel.php';

class AdminReturnController
{
    private $returnModel;

    public function __construct()
    {
        $this->returnModel =
            new ReturnModel();
    }

    public function index()
    {
        $returns =
            $this->returnModel->getAll();

        require PATH_VIEW .
            'admin/returns/index.php';
    }

    public function approve()
    {
        $id = $_GET['id'];

        $return =
            $this->returnModel->findById($id);

        $this->returnModel->updateStatus(
            $id,
            'approved'
        );

        $orderModel = new OrderModel();

        $orderModel->updateStatus(
            $return['order_id'],
            'returned'
        );

        header(
            'Location:?action=admin-returns'
        );
    }

   public function reject()
{
    $id = $_GET['id'];

    $this->returnModel->updateStatus(
        $id,
        'rejected'
    );

    header(
        'Location:?action=admin-returns'
    );
}
}