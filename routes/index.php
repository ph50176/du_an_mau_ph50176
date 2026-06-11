<?php

require_once __DIR__ . '/../configs/env.php';



require_once PATH_CONTROLLER . 'HomeController.php';
require_once PATH_CONTROLLER . 'AuthController.php';

require_once PATH_CONTROLLER . 'ProductController.php';
require_once PATH_CONTROLLER . 'CategoryController.php';

require_once PATH_CONTROLLER . 'CartController.php';
require_once PATH_CONTROLLER . 'OrderController.php';

require_once PATH_CONTROLLER . 'UserController.php';
require_once PATH_CONTROLLER . 'CommentController.php';

require_once PATH_CONTROLLER . 'ReturnController.php';
require_once PATH_CONTROLLER . 'AdminReturnController.php';

require_once PATH_CONTROLLER . 'AdminProductController.php';
require_once PATH_CONTROLLER . 'AdminCategoryController.php';
require_once PATH_CONTROLLER . 'AdminUserController.php';
require_once PATH_CONTROLLER . 'AdminOrderController.php';




$action = $_GET['action'] ?? '/';




$adminRoutes = [

    'admin',

    'admin-products',
    'admin-product-create',
    'admin-product-edit',
    'admin-product-delete',

    'admin-categories',
    'admin-category-create',
    'admin-category-edit',
    'admin-category-delete',

    'admin-users',
    'admin-user-delete',

    'admin-orders',
    'admin-order-detail',
    'admin-order-status',

    'admin-returns',
    'admin-return-approve',
    'admin-return-reject'
];

if (
    in_array($action, $adminRoutes)
    && (!auth() || !isAdmin())
) {
    die('403 - Không có quyền truy cập');
}




match ($action) {

    

    '/' => (new HomeController())->index(),


   

    'products' =>
        (new ProductController())->index(),

    'search' =>
        (new ProductController())->search(),

    'product-detail' =>
        (new ProductController())->detail(),

    'category' =>
        (new CategoryController())->show(),


   

    'login' =>
        $_SERVER['REQUEST_METHOD'] === 'POST'
            ? (new AuthController())->login()
            : (new AuthController())->showLogin(),

    'register' =>
        $_SERVER['REQUEST_METHOD'] === 'POST'
            ? (new AuthController())->register()
            : (new AuthController())->showRegister(),

    'logout' =>
        (new AuthController())->logout(),


   

    'profile' =>
        (new UserController())->profile(),

    'update-avatar' =>
        (new UserController())->updateAvatar(),

    'change-password' =>
        $_SERVER['REQUEST_METHOD'] === 'POST'
            ? (new UserController())->updatePassword()
            : (new UserController())->changePassword(),


   

    'cart' =>
        (new CartController())->index(),

    'add-cart' =>
        (new CartController())->add(),

    'increase-cart' =>
        (new CartController())->increase(),

    'decrease-cart' =>
        (new CartController())->decrease(),

    'delete-cart' =>
        (new CartController())->delete(),


   

    'checkout' =>
        $_SERVER['REQUEST_METHOD'] === 'POST'
            ? (new OrderController())->checkout()
            : die(),

    'checkout-store' =>
        $_SERVER['REQUEST_METHOD'] === 'POST'
            ? (new OrderController())->store()
            : die(),

    'order-detail' =>
        (new OrderController())->detail(),
    'buy-now' =>
        (new OrderController())->buyNow(),

  

    'comment-store' =>
        (new CommentController())->store(),


    

    'request-return' =>
        $_SERVER['REQUEST_METHOD'] === 'POST'
            ? (new ReturnController())->store()
            : (new ReturnController())->create(),


   

    'admin' =>
        (new AdminProductController())->index(),

    'admin-products' =>
        (new AdminProductController())->index(),

    'admin-product-create' =>
        $_SERVER['REQUEST_METHOD'] === 'POST'
            ? (new AdminProductController())->store()
            : (new AdminProductController())->create(),

    'admin-product-edit' =>
        $_SERVER['REQUEST_METHOD'] === 'POST'
            ? (new AdminProductController())->update()
            : (new AdminProductController())->edit(),

    'admin-product-delete' =>
        (new AdminProductController())->delete(),


  

    'admin-categories' =>
        (new AdminCategoryController())->index(),

    'admin-category-create' =>
        $_SERVER['REQUEST_METHOD'] === 'POST'
            ? (new AdminCategoryController())->store()
            : (new AdminCategoryController())->create(),

    'admin-category-edit' =>
        $_SERVER['REQUEST_METHOD'] === 'POST'
            ? (new AdminCategoryController())->update()
            : (new AdminCategoryController())->edit(),

    'admin-category-delete' =>
        (new AdminCategoryController())->delete(),


   

    'admin-users' =>
        (new AdminUserController())->index(),

    'admin-user-delete' =>
        (new AdminUserController())->delete(),


   

    'admin-orders' =>
        (new AdminOrderController())->index(),

    'admin-order-detail' =>
        (new AdminOrderController())->detail(),

    'admin-order-status' =>
        (new AdminOrderController())->updateStatus(),


    

    'admin-returns' =>
        (new AdminReturnController())->index(),

    'admin-return-approve' =>
        (new AdminReturnController())->approve(),

    'admin-return-reject' =>
        (new AdminReturnController())->reject(),


    default => die('404 Not Found')
};