<?php
require_once 'db/conn.php';
session_start();
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl"><head>
<meta charset="utf-8">
<title>إنشاء حساب</title>
<meta content="تسجيل الدخول" name="description">
<meta content="كتب الكترونية، كتب pdf، كتب فى جميع المجالات، كتب سياسة، كتب دينية، كتب اشعار وروايات، كتب مترجمة،قراءة كتب، تحميل كتب" name="keywords">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="theme-color" content="#45b09e">
<meta name="application-name" content="Noor Book">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<link rel="stylesheet" href="https://www.noor-book.com/publice/css/all/all_rtl_desk.min.css?v=2281">
<link rel="manifest" href="/publice/js/manifest.json">

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
<p class="text-center m-b-30 slog"><strong class="sign_up_title">إنشاء حساب</strong><br>مكتبة غير محدودة من الكتب العربية</p>
<div class="row">
<form method="post" action="success.php">
<div class="col-md-12">
<div class="form-group">
<label class="floating-label" for="email">الاسم</label>
<input type="text" name="name" id="name" class="form-control input-lg" required placeholder="الاسم">
</div>
</div>
<div class="email_block">
<div class="col-md-12">
<div class="form-group">
<label class="floating-label" for="email">البريد الإلكتروني</label>
<input type="email" name="email" id="email" class="form-control input-lg" placeholder="البريد الإلكتروني">
</div>
</div>
</div>
<div class="col-md-12" style="position: relative;">
<div class="row">
<div class="col-xs-4">
<div class="form-group ">

<select name="dob" id="dob" class="form-control input-lg" required>
<option value="">يوم الميلاد</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
</div>
</div>
<div class="col-xs-3" style="padding: 0px;">
<div class="form-group ">

<select name="mob" id="mob" class="form-control input-lg" required>
<option value="">شهر الميلاد</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>
</div>
</div>
<div class="col-xs-5">
<div class="form-group ">

<select name="yob" id="yob" class="form-control input-lg" required>
<option value="">سنة الميلاد</option>
<option value="2022">2022</option>
<option value="2021">2021</option>
<option value="2020">2020</option>
<option value="2019">2019</option>
<option value="2018">2018</option>
<option value="2017">2017</option>
<option value="2016">2016</option>
<option value="2015">2015</option>
<option value="2014">2014</option>
<option value="2013">2013</option>
<option value="2012">2012</option>
<option value="2011">2011</option>
<option value="2010">2010</option>
<option value="2009">2009</option>
<option value="2008">2008</option>
<option value="2007">2007</option>
<option value="2006">2006</option>
<option value="2005">2005</option>
<option value="2004">2004</option>
<option value="2003">2003</option>
<option value="2002">2002</option>
<option value="2001">2001</option>
<option value="2000">2000</option>
<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>
<option value="1989">1989</option>
<option value="1988">1988</option>
<option value="1987">1987</option>
<option value="1986">1986</option>
<option value="1985">1985</option>
<option value="1984">1984</option>
<option value="1983">1983</option>
<option value="1982">1982</option>
<option value="1981">1981</option>
<option value="1980">1980</option>
<option value="1979">1979</option>
<option value="1978">1978</option>
<option value="1977">1977</option>
<option value="1976">1976</option>
<option value="1975">1975</option>
<option value="1974">1974</option>
<option value="1973">1973</option>
<option value="1972">1972</option>
<option value="1971">1971</option>
<option value="1970">1970</option>
<option value="1969">1969</option>
<option value="1968">1968</option>
<option value="1967">1967</option>
<option value="1966">1966</option>
<option value="1965">1965</option>
<option value="1964">1964</option>
<option value="1963">1963</option>
<option value="1962">1962</option>
<option value="1961">1961</option>
<option value="1960">1960</option>
<option value="1959">1959</option>
<option value="1958">1958</option>
<option value="1957">1957</option>
<option value="1956">1956</option>
<option value="1955">1955</option>
<option value="1954">1954</option>
<option value="1953">1953</option>
<option value="1952">1952</option>
<option value="1951">1951</option>
<option value="1950">1950</option>
<option value="1949">1949</option>
<option value="1948">1948</option>
<option value="1947">1947</option>
<option value="1946">1946</option>
<option value="1945">1945</option>
<option value="1944">1944</option>
<option value="1943">1943</option>
<option value="1942">1942</option>
<option value="1941">1941</option>
<option value="1940">1940</option>
<option value="1939">1939</option>
<option value="1938">1938</option>
<option value="1937">1937</option>
<option value="1936">1936</option>
<option value="1935">1935</option>
<option value="1934">1934</option>
<option value="1933">1933</option>
<option value="1932">1932</option>
<option value="1931">1931</option>
<option value="1930">1930</option>
<option value="1929">1929</option>
<option value="1928">1928</option>
<option value="1927">1927</option>
<option value="1926">1926</option>
<option value="1925">1925</option>
<option value="1924">1924</option>
<option value="1923">1923</option>
<option value="1922">1922</option>
<option value="1921">1921</option>
<option value="1920">1920</option>
</select>
</div>
</div>
</div>
</div>
<div class="col-md-12">
<div class="form-group ">
<select type="text" name="gender" id="gender" class="form-control input-lg" required>
<option value="">أختر النوع</option>
<option value="Male">ذكر</option>
<option value="Female">أنثى</option>
</select>
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<p class="show_pass">إظهار</p>
<label class="floating-label">كلمة المرور</label>
<input type="password" name="password" id="password" class="form-control input-lg" required autocomplete="" placeholder="كلمة المرور">
</div>
</div>
<div class="col-sm-12">
<div class="alert alert-danger m-b-15" style="display: none;"></div>
<button type="submit" name="submit" class="btn btn-default noor-btn-b  btn-block submit-register m-b-30"><i class="fa fa-user"></i> إنشاء حساب</button>
<div class="hr m-b-30 m-t-30"><span>أو</span></div>
<p class="text-center">لديك حساب بالفعل؟ <strong><a href="login.php" class="login_click">تسجيل الدخول</a></strong></p>
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

    <script>
        $( function() {
            $( "#dob" ).datepicker( {
                changeMonth: true,
                changeYear: true,
                yearRange: "-100:+0",
                dateFormat: "yy-mm-dd"
            });
        } );
    </script>
</body>
</html>
