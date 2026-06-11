<?php require PATH_VIEW.'layouts/header.php'; ?>


<style>


.checkout-page-custom{


    min-height:80vh;

    background:#f5f5f5;

    padding:40px 20px;


    display:flex;

    justify-content:center;


}



.checkout-box-custom{


    width:550px;


    background:white;


    padding:35px;


    border-radius:20px;


    box-shadow:0 10px 30px rgba(0,0,0,.12);


}





.checkout-title-custom{


    text-align:center;


    font-size:30px;


    font-weight:700;


    margin-bottom:30px;


    color:#222;


}




.checkout-group-custom{


    margin-bottom:20px;


}




.checkout-group-custom label{


    display:block;


    font-weight:600;


    margin-bottom:8px;


    color:#333;


}




.checkout-input-custom,


.checkout-textarea-custom{


    width:100%;


    border:1px solid #ddd;


    border-radius:12px;


    padding:14px 16px;


    font-size:15px;


    outline:none;


    transition:.3s;


}




.checkout-input-custom{


    height:50px;


}



.checkout-textarea-custom{


    height:120px;


    resize:none;


}





.checkout-input-custom:focus,


.checkout-textarea-custom:focus{


    border-color:#198754;


    box-shadow:0 0 8px rgba(25,135,84,.25);


}







.checkout-button-custom{


    width:100%;


    height:52px;


    border:none;


    border-radius:12px;


    background:linear-gradient(135deg,#198754,#20c997);


    color:white;


    font-size:17px;


    font-weight:bold;


    cursor:pointer;


    transition:.3s;


}






.checkout-button-custom:hover{


    transform:translateY(-2px);


    box-shadow:0 10px 20px rgba(25,135,84,.3);


}





</style>





<div class="checkout-page-custom">



<div class="checkout-box-custom">





<h2 class="checkout-title-custom">

Thanh toán

</h2>







<form method="POST" action="?action=checkout-store">





<input

type="hidden"

name="cart_ids"

value="<?= implode(',', $_POST['cart_ids']) ?>">




<div class="checkout-group-custom">


<label>

Họ tên

</label>


<input

type="text"

name="fullname"

class="checkout-input-custom"

placeholder="Nhập họ tên"

required>


</div>







<div class="checkout-group-custom">


<label>

Số điện thoại

</label>



<input

type="text"

name="phone"

class="checkout-input-custom"

placeholder="Nhập số điện thoại"

required>


</div>








<div class="checkout-group-custom">


<label>

Địa chỉ nhận hàng

</label>



<textarea

name="address"

class="checkout-textarea-custom"

placeholder="Nhập địa chỉ nhận hàng"

required></textarea>


</div>








<button

class="checkout-button-custom">


🛒 Đặt hàng


</button>






</form>




</div>



</div>





<?php require PATH_VIEW.'layouts/footer.php'; ?>