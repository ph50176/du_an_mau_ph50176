<?php require PATH_VIEW . 'admin/layouts/header.php'; ?>


<style>


.admin-category-page{


    padding:40px;


    background:#f5f6fa;


    min-height:80vh;


}




.admin-category-box{


    max-width:600px;


    background:white;


    padding:35px;


    border-radius:18px;


    box-shadow:0 10px 30px rgba(0,0,0,.1);


}




.admin-category-title{


    font-size:28px;


    font-weight:700;


    margin-bottom:30px;


    color:#222;


}





.admin-category-label{


    font-weight:600;


    margin-bottom:10px;


    display:block;


}





.admin-category-input{


    width:100%;


    height:50px;


    border:1px solid #ddd;


    border-radius:12px;


    padding:0 18px;


    font-size:15px;


    outline:none;


    transition:.3s;


    margin-bottom:25px;


}





.admin-category-input:focus{


    border-color:#198754;


    box-shadow:0 0 8px rgba(25,135,84,.25);


}





.admin-save-btn{


    width:150px;


    height:45px;


    border:none;


    border-radius:10px;


    background:linear-gradient(135deg,#198754,#20c997);


    color:white;


    font-weight:bold;


    font-size:16px;


    cursor:pointer;


    transition:.3s;


}





.admin-save-btn:hover{


    transform:translateY(-2px);


    box-shadow:0 8px 18px rgba(25,135,84,.3);


}



</style>






<div class="admin-category-page">



<div class="admin-category-box">



<h2 class="admin-category-title">

➕ Thêm danh mục

</h2>





<form method="POST">





<label class="admin-category-label">

Tên danh mục

</label>




<input

type="text"

name="name"

class="admin-category-input"

placeholder="Nhập tên danh mục"

required>







<button

class="admin-save-btn">


Lưu danh mục


</button>





</form>






</div>


</div>






<?php require PATH_VIEW . 'admin/layouts/footer.php'; ?>