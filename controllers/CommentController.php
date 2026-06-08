<?php

require_once PATH_MODEL . 'CommentModel.php';

class CommentController
{
    public function store()
    {
        if(!auth())
        {
            header(
                'Location:?action=login'
            );
            exit;
        }

        $user = auth();

        $productId =
            $_POST['product_id'];

        $commentModel =
            new CommentModel();

        $check =
            $commentModel->hasPurchased(
                $user['id'],
                $productId
            );

        if(!$check)
        {
            die(
                'Bạn phải mua sản phẩm và đơn hàng hoàn thành mới được bình luận'
            );
        }

        $commentModel->create([

            'user_id' =>
                $user['id'],

            'product_id' =>
                $productId,

            'content' =>
                trim($_POST['content'])
        ]);

        header(
            'Location:?action=product-detail&id='
            . $productId
        );
    }
}