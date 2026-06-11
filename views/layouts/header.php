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
    background:#f3f4f6;
    font-family:Arial, sans-serif;
    color:#333;
    
}

/* HEADER */
.top-header{
    background:#fff;
    padding:15px 0;
    box-shadow:0 2px 10px rgba(0,0,0,0.08);
}

/* LOGO */
.logo img{
    max-height:50px;
}

/* SEARCH + MENU */
.search-menu{
    display:flex;
    align-items:center;
    width:800px;
    gap:30px;
}

.search-box{
    width:300px;
}

.main-menu{
    flex:1;
    display:flex;
    justify-content:space-evenly;
    align-items:center;
}

.main-menu a{
    display:flex;
    align-items:center;
    gap:8px;

    text-decoration:none;
    color:#333;
    font-weight:600;

    padding:10px 15px;
    white-space:nowrap;
}

.main-menu a:hover{
    color:#000;
}

.main-menu a.active{
    background:#333;
    color:#fff;
}

/* USER MENU */
.menu-icon{
    color:#444;
    text-decoration:none;
    margin-left:15px;
    font-weight:500;
    transition:0.3s;
}

.menu-icon:hover{
    color:#000;
}

/* GIỎ HÀNG */
.menu-icon[href*="cart"]{
    background:#333;
    color:#fff;
    padding:10px 18px;
    border-radius:25px;
    font-weight:bold;
}

.menu-icon[href*="cart"]:hover{
    background:#000;
    color:#fff;
}

/* CATEGORY */
.category-bar{
    background:#fff;
    border-top:1px solid #eee;
    border-bottom:1px solid #eee;
}

.category-bar .container{
    display:flex;
    flex-wrap:wrap;
    gap:10px;
    padding:5px 0;
    justify-content:center;
}

.category-bar a{
    text-decoration:none;
    color:#555;
    padding:10px 15px;
    border-radius:8px;
    transition:0.3s;
}

.category-bar a:hover{
    background:#f1f1f1;
    color:#000;
}

/* AVATAR */
.dropdown img{
    border:2px solid #e5e5e5;
}

/* CONTENT */
.container.mt-4{
    background:#fff;
    padding:25px;
    border-radius:12px;
    box-shadow:0 2px 8px rgba(0,0,0,0.05);
}

/* MOBILE */
@media(max-width:991px){

    .search-menu{
        flex-direction:column;
        align-items:stretch;
    }

    .main-menu{
        justify-content:center;
        flex-wrap:wrap;
    }

    .col-md-5.text-end{
        text-align:center !important;
        margin-top:15px;
    }
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

    <div class="search-menu">

        <form class="search-box" method="GET">

            <input
                type="hidden"
                name="action"
                value="search">

            <input
                class="form-control"
                name="keyword"
                placeholder="Tìm điện thoại, laptop...">

        </form>

      <nav class="main-menu">

    <a href="?action=/">
        <i class="fa-solid fa-house"></i>
        Trang chủ
    </a>

    <a href="?action=products">
        <i class="fa-solid fa-box"></i>
        Sản phẩm
    </a>

    <a href="?action=support">
        <i class="fa-solid fa-headset"></i>
        Hỗ trợ
    </a>

    <?php if(!auth()): ?>
    <a href="?action=login">
        <i class="fa-solid fa-user"></i>
        Đăng nhập
    </a>
    <?php endif; ?>

</nav>

    </div>

</div>
                 <div class="col-md-5 text-end">

    <?php if(auth()): ?>

        <div class="dropdown d-inline-block">

            <a
                class="text-decoration-none"
                data-bs-toggle="dropdown">

                <img
                    src="<?= auth()['avatar'] ?: BASE_URL . 'assets/images/default-user.png' ?>"
                    width="40"
                    height="40"
                    style="border-radius:50%; object-fit:cover;">
            </a>

            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item" href="?action=profile">
                        Hồ sơ cá nhân
                    </a>
                </li>

                <li>
                    <a class="dropdown-item" href="?action=change-password">
                        Đổi mật khẩu
                    </a>
                </li>

                <li>
                    <a class="dropdown-item" href="?action=logout">
                        Đăng xuất
                    </a>
                </li>
            </ul>

        </div>

    <?php endif; ?>

    <a class="menu-icon cart-btn" href="?action=cart">
        <i class="fa-solid fa-cart-shopping"></i>
        Giỏ hàng (<?= $countCart ?>)
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>