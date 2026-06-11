<?php require PATH_VIEW . 'layouts/header.php'; ?>


<style>


.product-detail-page{


    background:#f6f6f6;

    padding:40px;


}





.product-detail-box{


    background:white;

    border-radius:20px;

    padding:35px;

    box-shadow:0 10px 30px rgba(0,0,0,.1);


}






.product-main-img{


    width:100%;

    height:450px;

    object-fit:contain;

    border-radius:15px;

    background:#fafafa;


}





.product-name-custom{


    font-size:32px;

    font-weight:700;

    color:#222;


}




.product-category-custom{


    color:#777;

    margin:15px 0;


}





.product-price-custom{


    color:#e53935;

    font-size:30px;

    font-weight:bold;

    margin:20px 0;


}





.product-stock-custom{


    font-weight:600;

}





.buy-button-custom{


    display:inline-flex;

    align-items:center;

    justify-content:center;


    background:#e53935;

    color:white;


    padding:14px 35px;


    border-radius:12px;


    text-decoration:none;


    font-weight:bold;


    transition:.3s;


}




.buy-button-custom:hover{


    background:#b71c1c;

    color:white;


}





.login-buy-custom{


    background:#ffc107;

    color:#222;

}




/* comment */


.comment-box-custom{


    background:white;

    border-radius:15px;

    padding:25px;

    margin-top:30px;


}




.comment-item-custom{


    background:#fafafa;

    padding:20px;

    border-radius:15px;

    margin-bottom:15px;


}





.comment-avatar-custom{


    width:45px;

    height:45px;


    border-radius:50%;


    object-fit:cover;


}





.comment-btn-custom{


    background:#0d6efd;

    color:white;


    border:none;


    padding:12px 25px;


    border-radius:10px;


}





/* related */


.related-card-custom{


    background:white;


    border-radius:15px;


    overflow:hidden;


    transition:.3s;


    box-shadow:0 5px 15px rgba(0,0,0,.08);


}



.related-card-custom:hover{


    transform:translateY(-8px);


}





.related-img-custom{


    width:100%;

    height:220px;

    object-fit:contain;


}






</style>






<div class="product-detail-page">



<div class="product-detail-box">





<div class="row">






<div class="col-md-5">



<img

src="<?= $product['thumbnail'] ?>"

class="product-main-img">



</div>






<div class="col-md-7">





<h1 class="product-name-custom">


<?= $product['name'] ?>


</h1>





<p class="product-category-custom">


Danh mục:

<?= $product['category_name'] ?>


</p>






<div class="product-price-custom">


<?= number_format($product['price']) ?> đ


</div>







<p class="product-stock-custom">


Tồn kho:

<?= $product['stock'] ?>


</p>






<hr>





<h5>

Mô tả sản phẩm

</h5>




<p>

<?= nl2br($product['description']) ?>

</p>







<div class="mt-4">


<?php if(auth()): ?>


<a

href="?action=add-cart&id=<?= $product['id'] ?>"

class="buy-button-custom">


🛒 Thêm vào giỏ hàng


</a>



<?php else: ?>



<a

href="?action=login"

class="buy-button-custom login-buy-custom">


Đăng nhập để mua hàng


</a>



<?php endif; ?>


</div>





</div>


</div>






<!-- COMMENT -->


<div class="comment-box-custom">



<h3>

Bình luận sản phẩm

</h3>



<?php if($canComment): ?>



<form

method="POST"

action="?action=comment-store">



<input

type="hidden"

name="product_id"

value="<?= $product['id'] ?>">





<textarea

name="content"

class="form-control mb-3"

placeholder="Nhập bình luận..."

required></textarea>





<button

class="comment-btn-custom">


Gửi bình luận


</button>




</form>



<hr>


<?php endif; ?>






<h5>

Danh sách bình luận

</h5>






<?php if(empty($comments)): ?>



<div class="alert alert-light">


Chưa có bình luận nào


</div>





<?php else: ?>



<?php foreach($comments as $comment): ?>



<div class="comment-item-custom">





<div class="d-flex align-items-center">



<img

src="<?= !empty($comment['avatar'])
? $comment['avatar']
: BASE_URL.'assets/images/default-user.png' ?>"

class="comment-avatar-custom">





<div class="ms-3">


<strong>

<?= $comment['fullname'] ?>

</strong>



<br>



<small class="text-muted">


<?= $comment['created_at'] ?>


</small>


</div>



</div>





<hr>



<p>


<?= nl2br(htmlspecialchars($comment['content'])) ?>


</p>






</div>



<?php endforeach; ?>



<?php endif; ?>




</div>







<!-- SẢN PHẨM LIÊN QUAN -->



<h3 class="mt-5 mb-4">


Sản phẩm liên quan


</h3>






<div class="row">



<?php foreach($relatedProducts as $item): ?>



<div class="col-md-3 mb-4">



<div class="related-card-custom">





<a

href="?action=product-detail&id=<?= $item['id'] ?>">



<img

src="<?= $item['thumbnail'] ?>"

class="related-img-custom">



</a>





<div class="p-3">



<h6>


<?= $item['name'] ?>


</h6>



<p class="text-danger fw-bold">


<?= number_format($item['price']) ?> đ


</p>



</div>




</div>


</div>




<?php endforeach; ?>



</div>







</div>


</div>






<?php require PATH_VIEW . 'layouts/footer.php'; ?>