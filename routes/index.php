<?php

require_once __DIR__ . '/../configs/env.php';
require_once PATH_CONTROLLER . 'HomeController.php';
require_once PATH_MODEL . 'ProductModel.php';
require_once PATH_CONTROLLER . 'CartController.php';
require_once PATH_CONTROLLER . 'ProductController.php';
require_once PATH_CONTROLLER . 'AdminCategoryController.php';
require_once PATH_CONTROLLER . 'UserController.php';
require_once PATH_CONTROLLER .
'CategoryController.php';
require_once PATH_MODEL . 'OrderItemModel.php';

$action = $_GET['action'] ?? '/';

match ($action) {

    '/' => (new HomeController)->index(),
'search' =>
    (new ProductController())->search(),
    'products' => (new ProductController)->index(),
 'category' =>
    (new CategoryController())->show(),
    'product-detail' => (new ProductController)->detail(),
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
    $_SERVER['REQUEST_METHOD'] == 'POST'
        ? (new OrderController())->checkout()
        : die(),

'checkout-store' =>
    $_SERVER['REQUEST_METHOD'] == 'POST'
        ? (new OrderController())->store()
        : die(),
// admin
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
//
'admin-categories' =>
    (new AdminCategoryController())->index(),

'admin-category-create' =>
    $_SERVER['REQUEST_METHOD']=='POST'
        ? (new AdminCategoryController())->store()
        : (new AdminCategoryController())->create(),

'admin-category-edit' =>
    $_SERVER['REQUEST_METHOD']=='POST'
        ? (new AdminCategoryController())->update()
        : (new AdminCategoryController())->edit(),

'admin-category-delete' =>
    (new AdminCategoryController())->delete(),
//
'admin-users' =>
    (new AdminUserController())->index(),

'admin-user-delete' =>
    (new AdminUserController())->delete(),
    //
    'admin-orders' =>
    (new AdminOrderController())->index(),

'admin-order-status' =>
    (new AdminOrderController())->updateStatus(),
    'admin-order-detail' =>
    (new AdminOrderController())->detail(),
    
    
    
    default => die('404 Not Found'),
};