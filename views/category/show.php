<?php require PATH_VIEW.'layouts/header.php'; ?>


<style>


.category-page-custom{


    background:#f6f6f6;

    padding:40px;


}





.category-title-custom{


    background:white;


    padding:25px;


    border-radius:18px;


    box-shadow:0 8px 25px rgba(0,0,0,.08);


    margin-bottom:35px;


}




.category-title-custom h3{


    margin:0;


    font-size:30px;


    font-weight:700;


    color:#222;


}






.category-product-list-custom{


    display:grid;


    grid-template-columns:repeat(4,1fr);


    gap:25px;


}






.category-product-card-custom{


    background:white;


    border-radius:18px;


    overflow:hidden;


    box-shadow:0 5px 18px rgba(0,0,0,.08);


    transition:.3s;


}




.category-product-card-custom:hover{


    transform:translateY(-8px);


    box-shadow:0 15px 30px rgba(0,0,0,.15);


}





.category-product-img-custom{


    width:100%;


    height:260px;


    object-fit:contain;


    background:#fafafa;


    transition:.4s;


}





.category-product-card-custom:hover 
.category-product-img-custom{


    transform:scale(1.05);


}







.category-product-content-custom{


    padding:20px;


}





.category-product-name-custom{


    font-size:16px;


    font-weight:600;


    height:45px;


    overflow:hidden;


    margin-bottom:15px;


}





.category-product-price-custom{


    color:#e53935;


    font-size:22px;


    font-weight:bold;


}








@media(max-width:1000px){


.category-product-list-custom{


grid-template-columns:repeat(3,1fr);


}


}




@media(max-width:700px){


.category-product-list-custom{


grid-template-columns:repeat(2,1fr);


}


}





@media(max-width:450px){


.category-product-list-custom{


grid-template-columns:1fr;


}


}



</style>






<div class="category-page-custom">






<div class="category-title-custom">


<h3>


Danh mục:

<?= htmlspecialchars($category['name']) ?>


</h3>


</div>







<div class="category-product-list-custom">



<?php foreach($products as $item): ?>





<div class="category-product-card-custom">





<a href="?action=product-detail&id=<?= $item['id'] ?>">



<img

src="<?= $item['thumbnail'] ?>"

class="category-product-img-custom">



</a>







<div class="category-product-content-custom">





<h6 class="category-product-name-custom">


<?= $item['name'] ?>


</h6>





<div class="category-product-price-custom">


<?= number_format($item['price']) ?> đ


</div>






</div>





</div>







<?php endforeach; ?>





</div>







</div>





<?php require PATH_VIEW.'layouts/footer.php'; ?>