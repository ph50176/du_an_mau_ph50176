<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>PH50176</title>


    <style>

.product-card{
    border:none;
    border-radius:16px;
    overflow:hidden;
    background:#fff;
    transition:all .3s ease;
    box-shadow:0 2px 12px rgba(0,0,0,.08);
}

.product-card:hover{
    transform:translateY(-6px);
    box-shadow:0 10px 25px rgba(0,0,0,.15);
}

/* Ảnh */

.product-img{
    width:100%;
    height:250px;
    object-fit:cover;
    background:#f8f9fa;
    transition:.3s;
}

.product-card:hover .product-img{
    transform:scale(1.03);
}

/* Nội dung */

.product-name{
    font-size:15px;
    font-weight:600;
    line-height:1.5;
    height:48px;
    overflow:hidden;
    margin-bottom:12px;
}

.product-price{
    color:#dc3545;
    font-size:22px;
    font-weight:700;
}

/* Button */

.product-actions{
    display:flex;
    gap:10px;
    margin-top:15px;
}

.btn-cart{
    width:48px;
    height:48px;
    border-radius:10px;
    border:1px solid #ddd;
    display:flex;
    align-items:center;
    justify-content:center;
    text-decoration:none;
    color:#333;
    transition:.3s;
}

.btn-cart:hover{
    background:#f1f1f1;
    color:#000;
    border-color:#bbb;
}

.btn-buy{
    flex:1;
    height:48px;
    display:flex;
    align-items:center;
    justify-content:center;
    background:#212529;
    color:#fff;
    text-decoration:none;
    border-radius:10px;
    font-weight:600;
    transition:.3s;
}

.btn-buy:hover{
    background:#000;
    color:#fff;
}

/* Badge giảm giá */

.discount-badge{
    position:absolute;
    top:10px;
    left:10px;
    background:#dc3545;
    color:#fff;
    padding:4px 10px;
    border-radius:20px;
    font-size:12px;
    font-weight:bold;
}

/* Mobile */

@media(max-width:768px){

    .product-img{
        height:180px;
    }

    .product-price{
        font-size:18px;
    }

    .btn-buy{
        font-size:14px;
    }
}

</style>

</head>
<body>

   <div class="row">

<?php foreach($products as $item): ?>

<div class="col-lg-3 col-md-4 col-6 mb-4">

    <div class="card product-card h-100">

        <div class="position-relative">

            <a href="?action=product-detail&id=<?= $item['id'] ?>">

                <img
                    src="<?= $item['thumbnail'] ?>"
                    class="product-img">

            </a>

        </div>

        <div class="card-body d-flex flex-column">

            <h6 class="product-name">

                <?= $item['name'] ?>

            </h6>

            <div class="product-price mb-3">

                <?= number_format($item['price']) ?> đ

            </div>

            <div class="mt-auto product-actions">

                <a
                    href="?action=add-cart&id=<?= $item['id'] ?>"
                    class="btn-cart">

                    <i class="fa-solid fa-cart-shopping"></i>

                </a>

                <a
                    href="?action=product-detail&id=<?= $item['id'] ?>"
                    class="btn-buy">

                    Mua ngay

                </a>

            </div>

        </div>

    </div>

</div>

<?php endforeach; ?>

</div>
    </body>