<?php

require_once PATH_MODEL .
'ReturnModel.php';

class ReturnController
{
    public function create()
    {
        require PATH_VIEW .
        'orders/return.php';
    }

    public function store()
    {
        $model =
            new ReturnModel();

        $model->create([

            'order_id' =>
                $_GET['id'],

            'user_id' =>
                auth()['id'],

            'reason' =>
                $_POST['reason']
        ]);

        header(
            'Location:?action=profile'
        );
    }
}