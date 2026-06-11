<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>PH50176</title>


<style>


*{
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
}


body{

    background:#f6f6f6;
    padding:30px;

}



/* danh sách sản phẩm */

.product-list-custom{

    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:25px;

}



.product-item-custom{

    width:100%;

}



/* card */

.product-box-custom{

    background:#fff;
    border-radius:18px;
    overflow:hidden;

    border:1px solid #eee;

    transition:.3s;

    height:100%;

}


.product-box-custom:hover{

    transform:translateY(-10px);

    box-shadow:0 15px 35px rgba(0,0,0,.15);

}



/* ảnh */


.product-image-custom{

    width:100%;
    height:260px;

    object-fit:cover;

    display:block;

    transition:.3s;

}



.product-box-custom:hover 
.product-image-custom{

    transform:scale(1.05);

}





/* nội dung */


.product-content-custom{

    padding:20px;

    display:flex;

    flex-direction:column;

}



/* tên */

.product-title-custom{

    font-size:17px;

    font-weight:600;

    line-height:1.5;

    height:50px;

    overflow:hidden;

    margin-bottom:10px;

}





/* sao đánh giá */

.product-rating-custom{

    margin-bottom:12px;

    color:#ffc107;

    font-size:18px;

    letter-spacing:2px;

}


.product-rating-custom span{

    color:#777;

    font-size:13px;

    margin-left:5px;

    letter-spacing:0;

}




/* giá */


.product-price-custom{


    color:#e53935;

    font-size:22px;

    font-weight:bold;

    text-align:center;

    margin:10px 0 18px;


}





/* nút */


.product-button-group-custom{


    display:flex;

    gap:12px;

    margin-top:auto;


}




.cart-button-custom{


    width:45px;

    height:42px;


    display:flex;

    justify-content:center;

    align-items:center;


    background:#111;

    color:white;


    border-radius:10px;


    text-decoration:none;


    font-size:20px;


    transition:.3s;


}



.cart-button-custom:hover{


    background:#e53935;

}






.buy-button-custom{


    flex:1;


    height:42px;


    display:flex;

    justify-content:center;

    align-items:center;


    background:#e53935;

    color:white;


    border-radius:10px;


    text-decoration:none;


    font-weight:bold;


    transition:.3s;


}



.buy-button-custom:hover{


    background:#b71c1c;


}





/* responsive */


@media(max-width:1000px){

.product-list-custom{

grid-template-columns:repeat(3,1fr);

}

}



@media(max-width:700px){

.product-list-custom{

grid-template-columns:repeat(2,1fr);

}

}




@media(max-width:450px){

.product-list-custom{

grid-template-columns:1fr;

}

}



</style>



</head>



<body>



<div class="product-list-custom">



<?php foreach($products as $item): ?>



<div class="product-item-custom">



<div class="product-box-custom">



<a href="?action=product-detail&id=<?= $item['id'] ?>">


<img

src="<?= $item['thumbnail'] ?>"

class="product-image-custom">


</a>





<div class="product-content-custom">



<h6 class="product-title-custom">


<?= $item['name'] ?>


</h6>





<!-- đánh giá sao -->

<div class="product-rating-custom">


★★★★★


<span>(120 đánh giá)</span>


</div>






<!-- giá -->


<div class="product-price-custom">


<?= number_format($item['price']) ?> đ


</div>





<div class="product-button-group-custom">





<a

href="?action=add-cart&id=<?= $item['id'] ?>"

class="cart-button-custom">


🛒


</a>






<a

href="?action=product-detail&id=<?= $item['id'] ?>"

class="buy-button-custom">


Mua ngay


</a>





</div>





</div>




</div>



</div>



<?php endforeach; ?>



</div>



</body>
</html>