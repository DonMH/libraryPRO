<?php
require_once 'db/conn.php';
session_start();
$results = $crud->getUsers();
if(!isset($_GET['id']))
{
    echo 'error';
}
else{
    $id = $_GET['id'];
    $user = $crud->getUserDetails($id);
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl"><head>
<meta charset="utf-8">
<title>تعديل حساب</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="theme-color" content="#45b09e">
<meta name="application-name" content="Noor Book">
 <!-- bootstrap -->
 <link
      rel="stylesheet"
      href="./bootstrap-5.2.3-dist/css/bootstrap.min.css"
    />
    <!-- bootstrap -->
    <!-- fontawesom -->
    <link
      rel="stylesheet"
      href="./fontawesome-free-6.2.1-web/css/all.min.css"
    />
    <script defer src="./fontawesome-free-6.2.1-web/js/all.min.js"></script>
    <!-- fontawesom -->
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Changa:wght@200;300;400;500;600;700;800&family=El+Messiri:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <!-- google fonts -->
    <link rel="stylesheet" href="./style.css" />
    <script defer src="./main.js"></script>
<body>
    <style>
        body{
            background-size: cover !important;
            background-position: center;
        }
        h1{
            color: #fff !important;
        }
        .b-0{
            border: 0px !important;
        }
        .b-r-20{
            border-radius: 20px;
        }
        .footer-signup a{
            color: #fff;
            font-family: 'Noto Naskh Arabic';
            font-size: 15px;
        }
        .sign_up .btn{
        padding: 15px 20px;
        font-size: 16px;
        text-align: center;
        border-radius: 4px;
    }
    .sign_up select{
        padding: 10px 12px;
        font-family:'Changa';        
        font-size: 17px;
    }
    .sign_up .form-group {
        margin-bottom: 20px;
    }
    .sign_up input,.sign_up select{
        border-radius: 4px;
        background: #fafafa;
    }
    .sign_up{
        max-width: 600px;
        margin: auto;
    }
    #sign_up .modal-dialog{
        margin: 70px auto;
    }
    .sign_up .modal-title{
        text-align: center;
        position: absolute;
        width: 400%;
        left: 0px;
        right: 0px;
        margin: auto;
        top: -35px;
        color: #fff;
    }
    .sign_up .modal-title:after{
        border-bottom:0px;
    }
    .sign_up .form-group{
        position: relative;
    }

    .sign_up label {
        position: absolute;
        pointer-events: none;
        right: 20px;        top: 10px;
        transition: 0.2s ease all;
        font-size: 15px;
        color: transparent;
        font-family: 'Noto Naskh Arabic';    }

    .sign_up .focused label,.sign_up input:focus ~ .floating-label,
    .sign_up input:not(:focus):valid ~ .floating-label{
        right: 10px;        top: -9px;
        font-size: 9px;
        background: #fafafa;
        padding-left: 10px;
        padding-right: 10px;
        border-radius: 50px;
        border-top: 1px solid #dadde1;
        border-left: 1px solid #dadde1;
        border-right: 1px solid #dadde1;
        display: block;
        color: #000;
        font-weight: bold;
    }
    .modal-header .logo{
        width: 70px;
        margin: auto;
        text-align: center;
    }
    .sign_up .terms_agree{
        text-align: center;
        color: #898989;
        font-size: 13px;
    }
    .sign_up .hr{
        height: 2px;
        background: #dadde1;
        position: relative;
        border-radius: 50px;
    }
    .sign_up .hr span{
        display: block;
        position: absolute;
        background: #fff;
        padding-left: 10px;
        padding-right: 10px;
        top: -15px;
        left: 0px;
        right: 0px;
        margin: auto;
        width: 45px;
        margin: auto;
        text-align: center;
    }
    .sign_up .btn-facebook{
        height: 35px;
        font-size: 13px;
        border: 0px;
        padding: 5px;
    }
    .sign_up .slog{
        color: #008a73;
    }
    .sign_up input{
        font-size: 16px;
    }
    .sign_up .show_pass,.sign_up .show_phone,.sign_up .show_email{
        position: absolute;
        left: 1px;        top: 11px;
        color: #45b09e;
        cursor: pointer;
        background: #fafafa;
        opacity: 0.8;
        padding-left: 2px;
        padding-right: 2px;
        border-radius: 5px;
        font-size: 14px;
    }
    .img_code{
        cursor: pointer;
    }
    .reset .media:hover{
        cursor: pointer;
    }
    .sign_up .alert-success{
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
    }
    .sign_up input:focus::placeholder {
        color: transparent;
    }
</style>
 <!-- nav -->
 <nav>
      <div class="container d-flex justify-content-start position-relative">
        <!-- <a href="./index.php" ><img class="logo p-30" src="./images/logo.svg" alt="logo" ></a> -->


      <a href="./index.php"><img alt="Noor Book" title="Noor Book" class="logo" src="./images/logo.svg" alt="logo"></a>
      <div class="navbar-nav ml-auto">
          <?php 
              if(!isset($_SESSION['userid'])){
          ?>
            <a href="./login.php" class="login"  class="fa-solid fa-right-to-bracket">تسجيل الدخول</a>
          <?php } else { ?>
            <a href="logout.php" class="login"  class="fa-solid fa-right-to-bracket">تسجيل الخروج</a>
          <?php } ?>
        </div>
      
      </div>
    </nav>
    <!-- nav -->
    <!-- navbar sticky -->
    <div class="border-top-1 border-bottom-1 sticky-nav bg-white">
      <div class="container d-flex justify-content-start h-100">
        <div
          class="logo-40 d-flex justify-content-center align-items-center flex-wrap"
        >
          <img src="./images/nooricon.svg" alt="noor logo" class="logo-noor" />
        </div>
        <div
          class="d-flex justify-content-between gap-2 cursor-pointer px-3 align-items-center"
        >
          <i class="nav-icon fa-solid fa-house"></i>
          <a href="./index.php" class="p-0 m-0 nav-icon text-decoration-none">الرئيسية</a>
        </div>
        <div
          class="d-flex justify-content-between gap-2 cursor-pointer px-3 align-items-center"
        >
          <i class="nav-icon fa-solid fa-folder-tree"></i>
          <a href="./sect.php" class="p-0 m-0 nav-icon  text-decoration-none">أقسام الكتب</a>
        </div>
        <div
          class="d-flex justify-content-between gap-2 cursor-pointer px-3 align-items-center"
        >
          <i class="nav-icon fa-solid fa-users"></i>
          <a href="./authors.php" class="p-0 m-0 nav-icon text-decoration-none">مؤلفو الكتب</a>
        </div>
        <div
          class="d-flex justify-content-between gap-2 cursor-pointer px-3 align-items-center"
        >
          <i class="nav-icon fa-solid fa-users"></i>
          <a href="./books.php" class="p-0 m-0 nav-icon text-decoration-none"> الكتب</a>
        </div>
        <div
          class="d-flex justify-content-between gap-2 cursor-pointer px-3 align-items-center">
          <i class="nav-icon fa-solid fa-lock " ></i>
          
          
          <?php 
              if(isset($_SESSION['userid']) && $_SESSION['userid']==1){
          ?>
            <a class="nav-link dropdown-toggle dropdown-toggle p-0 m-0 nav-icon text-decoration-none" href="./admin.php">الادارة </a>
          <?php } else { ?>
            <a class="nav-link dropdown-toggle dropdown-toggle p-0 m-0 nav-icon text-decoration-none" href="./adminaAuth.php">الادارة </a>
          <?php } ?>
        
        
          </div>
        <?php 
              if(isset($_SESSION['userid'])){
          ?>
		<div class="dropdown">
	
  <button onclick="myFunction()" class="dropbtn"><img src= "./images/imgavatar.svg" alt="Avatar" class="avatar"> حسابي</button>
 
  <div id="myDropdown" class="dropdown-content">
    <a href="./acc.php"><i class="fa fa-user"></i> صفحتي</a>
    <a href="./logout.php"><i class= "fa fa-sign-out"></i> تسجيل الخروج</a>
	<a href="#about"><i class="fa-solid fa-xmark"></i> إغلاق</a>
  </div>
</div>
<?php }?>
<body>
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
      </div>
    </div>    
<div class="container-lg" >
<div style="margin-top: 70px;">
<div class="sign_up">
<div class="modal-body ">
<form method="post" action="successEdit.php">
<input type="hidden" name="id" value="<?php echo $user['user_id'] ?>">
<div class="col-lg-12">
<div class="form-group">
<label class="floating-label" for="email">الاسم</label>
<input type="text" name="name" id="name" value="<?php echo $user['name'] ?>" class="form-control input-lg" required placeholder="الاسم">
</div>
</div>
<div class="email_block">
<div class="col-md-12">
<div class="form-group">
<label class="floating-label" for="email">البريد الإلكتروني</label>
<input type="email" name="email" id="email" value="<?php echo $user['email'] ?>" class="form-control input-lg" required placeholder="البريد الإلكتروني">
</div>
</div>
</div>
<div class="col-md-12" style="position: relative;">

<div class="col-xs-4">
<div class="form-group ">
<label class="floating-label" for="dob">يوم الميلاد</label>
<input name="dob" id="dob" value="<?php echo $user['dob'] ?>" class="form-control input-lg" required placeholder="يوم الميلاد">
</div>
</div>
<div class="col-xs-4">
<div class="form-group ">
<label class="floating-label" for="mob">شهر الميلاد</label>
<input name="mob" id="mob" value="<?php echo $user['mob'] ?>" class="form-control input-lg" required placeholder="شهر الميلاد">
</div>
</div>
<div class="col-xs-4">
<div class="form-group ">
<label class="floating-label" for="yob">سنة الميلاد</label>
<input name="yob" id="yob" value="<?php echo $user['yob'] ?>" class="form-control input-lg" required placeholder="سنة الميلاد">
</div>
</div>
</div>
<div class="col-md-12">
<div class="form-group ">
<label class="floating-label" for="gender"> النوع</label>
<input  type="text" name="gender" id="gender" value="<?php echo $user['gender'] ?>" class="form-control input-lg" required placeholder=" النوع">
</div>
</div>


<button type="submit" name="submit" class="btn btn-success col-md-12"><i class="fa fa-user"></i> حفظ التغييرات</button>

</form>

</div>
</div>
<script>
window.addEventListener('load', function () {$("form .img_code").click(function (e) {
        e.preventDefault();
        
    });
    var input_pass_type = 'pass';
    var hide_txt = 'إخفاء';
    var show_txt = 'إظهار';
    $('.sign_up .show_pass').click(function () {
        if (input_pass_type == 'pass') {
            $('input[name=password]').attr('type', 'text');
            $('.sign_up .show_pass').text(hide_txt);
            input_pass_type = 'txt';
        } else if (input_pass_type == 'txt') {
            $('input[name=password]').attr('type', 'password');
            $('.sign_up .show_pass').text(show_txt);
            input_pass_type = 'pass';
        }
    });
    $(document).on('focus', '.sign_up input', function (e) {
        $(this).parents('.form-group').addClass('focused');
        $('form .alert').hide();
    });
    $(document).on('blur', '.sign_up input', function (e) {
        var inputValue = $(this).val();
        if (inputValue == "") {
            $(this).parents('.form-group').removeClass('focused');
        } else {
            $(this).addClass('filled');
        }
    });
    $('.sign_up input').each(function () {
        var inputValue = $(this).val();
        if (inputValue == "") {
            $(this).parents('.form-group').removeClass('focused');
        } else {
            $(this).addClass('filled');
        }
        $(this).trigger('blur');
    })
});</script>

</div>
</div>
<script async="" id="script" type="text/javascript" src="all.min.js"></script>
<?php }
?>
</body>
</html>
