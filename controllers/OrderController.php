<?php

require_once PATH_MODEL.'CartModel.php';
require_once PATH_MODEL.'OrderModel.php';
require_once PATH_MODEL.'OrderItemModel.php';

class OrderController
{
    public function checkout()
    {
        $user = auth();

        $cartModel = new CartModel();

         $cartIds =
    $_POST['cart_ids'] ?? [];

if(empty($cartIds))
{
    die(
        'Vui lòng chọn sản phẩm'
    );
}

$carts =
    $cartModel->getSelectedItems(
        $cartIds,
        $user['id']
    );
        require PATH_VIEW.'checkout.php';
    }

     public function store()
{
    $user = auth();

    $cartModel = new CartModel();

    $cartIds =
        explode(
            ',',
            $_POST['cart_ids']
        );

    $carts =
        $cartModel->getSelectedItems(
            $cartIds,
            $user['id']
        );

    $total = 0;

    foreach($carts as $item)
    {
        $total +=
            $item['price']
            * $item['quantity'];
    }

    $orderModel =
        new OrderModel();

    $orderId =
        $orderModel->create([

            'user_id' =>
                $user['id'],

            'fullname' =>
                $_POST['fullname'],

            'phone' =>
                $_POST['phone'],

            'address' =>
                $_POST['address'],

            'total_amount' =>
                $total,

            'status' =>
                'pending'
        ]);

    $orderItemModel =
        new OrderItemModel();

    foreach($carts as $item)
    {
        $orderItemModel->create([

            'order_id' =>
                $orderId,

            'product_id' =>
                $item['product_id'],

            'product_name' =>
                $item['name'],

            'price' =>
                $item['price'],

            'quantity' =>
                $item['quantity'],

            'subtotal' =>
                $item['price']
                * $item['quantity']
        ]);
    }

    foreach($cartIds as $cartId)
    {
        $cartModel->delete(
            $cartId
        );
    }

    header(
        'Location:?action=profile'
    );
}
public function detail()
{
    $id = $_GET['id'];

    $orderModel = new OrderModel();
    $orderItemModel = new OrderItemModel();

    $order = $orderModel->findById($id);

    $items = $orderItemModel->getByOrder($id);

    require PATH_VIEW . 'orders/detail.php';
}
public function buyNow()
{
    $user = auth();

    if(!$user)
    {
        header('Location:?action=login');
        exit;
    }

    $productId = $_GET['id'];

    $productModel = new ProductModel();

    $product = $productModel->findById(
        $productId
    );

    $carts = [[

        'product_id' => $product['id'],
        'name'       => $product['name'],
        'price'      => $product['price'],
        'quantity'   => 1,
        'thumbnail'  => $product['thumbnail']

    ]];

    require PATH_VIEW . 'checkout.php';
}
public function cancel()
{
    $user = auth();

    $id = $_GET['id'];

    $orderModel = new OrderModel();

    $order = $orderModel->findById($id);

    if(
        !$order
        || $order['user_id'] != $user['id']
    ){
        die('Không tìm thấy đơn hàng');
    }

    if(
        !in_array(
            $order['status'],
            ['pending','processing']
        )
    ){
        die('Đơn hàng này không thể hủy');
    }

    $orderModel->updateStatus(
        $id,
        'cancelled'
    );

    header('Location:?action=profile');
}
}