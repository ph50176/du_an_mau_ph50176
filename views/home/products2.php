<!DOCTYPE html>
<html lang="vi">

<head>

<meta charset="UTF-8">

<title>PH50176</title>


<style>


*{
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
    margin-top:1110;
}


body{

    background:#fff;

    padding:30px;

}




/* GRID 3 SẢN PHẨM */

.product-show-list{


    display:grid;

    grid-template-columns:repeat(3,1fr);

    gap:35px;

}





/* CARD */


.product-show-card{


    position:relative;

    height:390px;

    overflow:hidden;

    border-radius:15px;

    background:#fff;

    cursor:pointer;

    box-shadow:0 5px 15px rgba(0,0,0,.08);

    transition:.4s;


}



.product-show-card:hover{


    transform:translateY(-8px);

    box-shadow:0 15px 30px rgba(0,0,0,.18);


}





/* ẢNH */


.product-show-img{


    width:100%;

    height:100%;

    object-fit:contain;

    background:#fff;

    transition:.5s;


}



.product-show-card:hover 
.product-show-img{


    transform:scale(1.08);


}







/* LỚP HOVER */


.product-overlay{


    position:absolute;

    left:0;

    bottom:0;

    width:100%;

    height:45%;


    background:linear-gradient(
        transparent,
        rgba(0,0,0,.75)
    );


    display:flex;

    flex-direction:column;

    justify-content:flex-end;

    align-items:center;


    padding:25px;


    opacity:0;

    transition:.4s;


}




.product-show-card:hover 
.product-overlay{


    opacity:1;


}





/* TÊN */


.product-show-name{


    color:white;

    font-size:22px;

    font-weight:600;


    margin-bottom:18px;

    text-align:center;


}







/* BUTTON */


.product-detail-btn{


    padding:12px 35px;


    background:white;

    color:#111;


    border-radius:25px;


    text-decoration:none;


    font-weight:bold;


    transition:.3s;


}




.product-detail-btn:hover{


    background:#e53935;

    color:white;


}


/* tiêu đề sản phẩm */

.favorite-title-custom{

    text-align:center;

    font-size:32px;

    font-weight:700;

    color:#222;

    margin-bottom:35px;

    position:relative;

}


.favorite-title-custom::after{

    content:"";

    display:block;

    width:80px;

    height:4px;

    background:#e53935;

    margin:12px auto 0;

    border-radius:10px;

}


.favorite-subtitle-custom{

    text-align:center;

    color:#777;

    font-size:15px;

    margin-top:-20px;

    margin-bottom:35px;

}




/* MOBILE */


@media(max-width:900px){


.product-show-list{

grid-template-columns:repeat(2,1fr);

}


}




@media(max-width:600px){


.product-show-list{

grid-template-columns:1fr;

}


}





</style>


</head>



<body>


<h2 class="favorite-title-custom">

    Sản phẩm yêu thích hôm nay

</h2>


<p class="favorite-subtitle-custom">

    Những sản phẩm nổi bật được nhiều khách hàng lựa chọn

</p>
<div class="product-show-list">



<?php foreach(array_slice($products,0,3) as $item): ?>


<div class="product-show-card">



<a href="?action=product-detail&id=<?= $item['id'] ?>">



<img

src="<?= $item['thumbnail'] ?>"

class="product-show-img">



</a>





<div class="product-overlay">



<div class="product-show-name">


<?= $item['name'] ?>


</div>





<a

href="?action=product-detail&id=<?= $item['id'] ?>"

class="product-detail-btn">


Xem chi tiết


</a>



</div>



</div>




<?php endforeach; ?>



</div>



</body>

</html>