<!DOCTYPE html>
<html lang="vi">

<head>

<meta charset="UTF-8">

<title>Đăng ký</title>


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







.register-box-custom{


    width:420px;


    background:#fff;


    padding:40px;


    border-radius:20px;


    box-shadow:0 15px 40px rgba(0,0,0,.2);


}







.register-title-custom{


    text-align:center;


    font-size:30px;


    font-weight:700;


    color:#222;


    margin-bottom:10px;


}







.register-subtitle-custom{


    text-align:center;


    color:#777;


    font-size:14px;


    margin-bottom:30px;


}







.register-input-custom{


    width:100%;


    height:50px;


    border:1px solid #ddd;


    border-radius:12px;


    padding:0 18px;


    margin-bottom:18px;


    font-size:15px;


    outline:none;


    transition:.3s;


}







.register-input-custom:focus{


    border-color:#667eea;


    box-shadow:0 0 8px rgba(102,126,234,.3);


}








.register-button-custom{


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






.register-button-custom:hover{


    transform:translateY(-2px);


    box-shadow:0 10px 20px rgba(102,126,234,.35);


}






.login-link-custom{


    display:block;


    text-align:center;


    margin-top:25px;


    text-decoration:none;


    color:#667eea;


    font-weight:600;


}





.login-link-custom:hover{


    color:#764ba2;


}



</style>



</head>



<body>




<div class="register-box-custom">





<h2 class="register-title-custom">

Đăng ký

</h2>



<p class="register-subtitle-custom">

Tạo tài khoản mới của bạn

</p>






<form method="POST">






<input

type="text"

name="fullname"

placeholder="Họ tên"

class="register-input-custom"

required>







<input

type="email"

name="email"

placeholder="Email"

class="register-input-custom"

required>








<input

type="password"

name="password"

placeholder="Mật khẩu"

class="register-input-custom"

required>








<button

type="submit"

class="register-button-custom">


Đăng ký


</button>





</form>







<a

href="?action=login"

class="login-link-custom">


Đã có tài khoản? Đăng nhập


</a>






</div>





</body>

</html>