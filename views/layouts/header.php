<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>PH50176</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>

        body{
            background:#f5f5f5;
        }

        .top-header{
            background:#d70018;
            color:white;
            padding:12px 0;
        }

        .logo img{
    max-height:45px;
}

        .search-box{
            width:100%;
        }

        .search-box input{
            border-radius:20px;
        }

        .menu-icon{
            color:white;
            text-decoration:none;
            margin-left:20px;
        }

        .category-bar{
            background:white;
            border-bottom:1px solid #ddd;
        }

        .category-bar a{
            text-decoration:none;
            color:#333;
            padding:15px;
            display:inline-block;
        }

        .category-bar a:hover{
            color:#d70018;
        }

    </style>

</head>
<?php

$user = auth();

$countCart = 0;

if ($user) {

    require_once PATH_MODEL . 'CartModel.php';

    $cartModel = new CartModel();

    $countCart =
        $cartModel->countCart($user['id'])['total'] ?? 0;
}
require_once PATH_MODEL . 'CategoryModel.php';

$categoryModel = new CategoryModel();

$categories = $categoryModel->getAll();
?>
<body>

<header>

    <div class="top-header">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-md-2">

                    <a href="?action=/" class="logo">
    <img
        src="<?= BASE_URL ?>assets/uploads/logo.png"
        alt="Logo"
        height="45">
</a>

                </div>

                <div class="col-md-5">

                    <form
    class="search-box"
    method="GET">

    <input
        type="hidden"
        name="action"
        value="search">

    <input
        class="form-control"
        name="keyword"
        placeholder="Tìm điện thoại, laptop...">

</form>

                </div>

                <div class="col-md-5 text-end">

                    <?php if(auth()): ?>

                        <div class="dropdown d-inline-block">

    <a
        class="text-white text-decoration-none"
        data-bs-toggle="dropdown">

        <img
            src="<?= auth()['avatar'] ?: BASE_URL . 'assets/images/default-user.png' ?>"
            width="40"
            height="40"
            style="
                border-radius:50%;
                object-fit:cover;
            ">

    </a>

    <ul class="dropdown-menu">

        <li>

            <a
                class="dropdown-item"
                href="?action=profile">

                Hồ sơ cá nhân

            </a>

        </li>

        <li>

            <a
                class="dropdown-item"
                href="?action=change-password">

                Đổi mật khẩu

            </a>

        </li>

        <li>

            <a
                class="dropdown-item"
                href="?action=logout">

                Đăng xuất

            </a>

        </li>

    </ul>

</div>

                         

                    <?php else: ?>

                        <a
                            class="menu-icon"
                            href="?action=login">

                            Đăng nhập
                        </a>

                        <a
                            class="menu-icon"
                            href="?action=register">

                            Đăng ký
                        </a>

                    <?php endif; ?>

                    <a class="menu-icon" href="?action=cart">

    <i class="fa-solid fa-cart-shopping"></i>

    Giỏ hàng

    (<?= $countCart ?>)

</a>

                </div>

            </div>

        </div>

    </div>

    <div class="category-bar">

        <div class="container">

            <?php foreach($categories as $cat): ?>

<a href="?action=category&id=<?= $cat['id'] ?>">
    <?= $cat['name'] ?>
</a>

<?php endforeach; ?>

        </div>

    </div>

</header>

<div class="container mt-4">