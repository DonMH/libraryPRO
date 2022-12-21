<?php
require_once 'db/conn.php';
    session_start();
?>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = strtolower(trim($_POST['email']));
    $password = $_POST['password'];
    $new_password = md5($password);

    $result = $crud->getUser($email,$new_password);
    if(!$result){
        echo '<div class="alert alert-danger" style="text-align: center;">Username or Password is incorrect! Please try again. </div>';
    }else{
        $_SESSION['userid'] = $result['user_id'];
        $_SESSION['name'] = $result['name'];
        $_SESSION['email'] = $result['email'];
        $_SESSION['dob'] = $result['dob'];
        $_SESSION['mob'] = $result['mob'];
        $_SESSION['yob'] = $result['yob'];
        $_SESSION['gender'] = $result['gender'];
        header("Location: index.php");
    }

}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl"><head>
<meta charset="utf-8">
<title>تسجيل الدخول</title>
<meta content="تسجيل الدخول" name="description">
<meta content="كتب الكترونية، كتب pdf، كتب فى جميع المجالات، كتب سياسة، كتب دينية، كتب اشعار وروايات، كتب مترجمة،قراءة كتب، تحميل كتب" name="keywords">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="theme-color" content="#45b09e">
<meta name="application-name" content="Noor Book">
<meta name="msapplication-config" content="https://www.noor-book.com/publice/icons/browserconfig.xml">
<link rel="stylesheet" href="all_rtl_desk.min.css">

<body>
    <style>
        body{
            background: url(/publice/images/covers/4.svg);
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
        height: 46px;
        font-size: 16px;
        border-radius: 4px;
    }
    .sign_up select{
        padding: 10px 5px;
        font-family: 'Noto Kufi Arabic';        font-size: 14px;
    }
    .sign_up .form-group {
        margin-bottom: 15px;
    }
    .sign_up input,.sign_up select{
        border-radius: 4px;
        background: #fafafa;
    }
    .sign_up{
        max-width: 350px;
        margin: auto;
    }
    #sign_up .modal-dialog{
        margin: 70px auto;
    }
    .sign_up .modal-title{
        text-align: center;
        position: absolute;
        width: 100%;
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
<div class="container" style="max-width: 650px;margin: auto;">
<div style="margin-top: 50px;">
<div class="the-box m-b-10 b-0 b-r-20">
<div class="sign_up">
<div class="modal-header text-center p-b-0 p-t-0">
<a href="./index.php"><img alt="Noor Book" title="Noor Book" class="logo" src="./images/logo.svg" alt="logo" ></a>
</div>
<div class="modal-body ">
<p class="text-center m-b-30 slog"><strong class="sign_up_title">تسجيل الدخول</strong><br>مكتبة غير محدودة من الكتب العربية</p>
<div class="row">
<form id="login" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" >
<div class="email_block">
<div class="col-md-12">
<div class="form-group">
<label class="floating-label"  for="email">البريد الإلكتروني</label>
<input type="email" name="email" id="email" class="form-control input-lg" placeholder="البريد الإلكتروني" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['email']; ?>">
</div>
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<p class="show_pass">إظهار</p>
<label class="floating-label">كلمة المرور</label>
<input type="password" name="password" id="password" class="form-control input-lg" placeholder="كلمة المرور">
</div>
</div>
<div class="col-sm-12">
<div class="alert alert-danger m-b-15" style="display: none;"></div>
<button type="submit" class="btn btn-default noor-btn-b  btn-block submit-login m-b-30"><i class="fa fa-sign-in"></i> تسجيل الدخول</button>
<div class="hr m-b-30 m-t-30"><span>أو</span></div>
<p class="text-center">ليس لديك حساب؟ <strong><a href="signup.php" class="login_click">إنشاء حساب</a></strong></p>
</div>
</form>
</div>
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
</div>
<script async="" id="script" type="text/javascript" src="all.min.js"></script>
</body>
</html>
