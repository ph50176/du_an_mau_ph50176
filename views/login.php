<!DOCTYPE html>
<html lang="vi">

<head>

<meta charset="UTF-8">

<title>Đăng nhập</title>


<style>


*{

    box-sizing:border-box;

    font-family:Arial, Helvetica, sans-serif;

}



body{


    margin:0;

    height:100vh;

    background:linear-gradient(135deg,#667eea,#764ba2);


    display:flex;

    justify-content:center;

    align-items:center;


}





.login-box-custom{


    width:400px;


    background:white;


    padding:40px;


    border-radius:20px;


    box-shadow:0 15px 40px rgba(0,0,0,.2);


}




.login-title-custom{


    text-align:center;

    font-size:30px;

    font-weight:700;

    margin-bottom:10px;

    color:#222;


}




.login-subtitle-custom{


    text-align:center;

    color:#777;

    margin-bottom:30px;

    font-size:14px;


}







.input-group-custom{


    margin-bottom:20px;


}





.input-group-custom input{


    width:100%;


    height:50px;


    border:1px solid #ddd;


    border-radius:12px;


    padding:0 18px;


    font-size:15px;


    outline:none;


    transition:.3s;


}





.input-group-custom input:focus{


    border-color:#667eea;


    box-shadow:0 0 8px rgba(102,126,234,.3);


}





.login-button-custom{


    width:100%;


    height:50px;


    border:none;


    border-radius:12px;


    background:linear-gradient(135deg,#667eea,#764ba2);


    color:white;


    font-size:17px;


    font-weight:bold;


    cursor:pointer;


    transition:.3s;


}





.login-button-custom:hover{


    transform:translateY(-2px);


    box-shadow:0 8px 20px rgba(102,126,234,.4);


}






.register-link-custom{


    display:block;


    text-align:center;


    margin-top:25px;


    text-decoration:none;


    color:#667eea;


    font-weight:600;


}





.register-link-custom:hover{


    color:#764ba2;


}





</style>


</head>


<body>




<div class="login-box-custom">



<h2 class="login-title-custom">

Đăng nhập

</h2>



<p class="login-subtitle-custom">

Chào mừng bạn quay trở lại

</p>





<form method="POST">





<div class="input-group-custom">


<input

type="email"

name="email"

placeholder="Nhập email"

required>


</div>





<div class="input-group-custom">


<input

type="password"

name="password"

placeholder="Nhập mật khẩu"

required>


</div>







<button

type="submit"

class="login-button-custom">


Đăng nhập


</button>




</form>







<a

href="?action=register"

class="register-link-custom">


Chưa có tài khoản? Đăng ký


</a>





</div>





</body>

</html>