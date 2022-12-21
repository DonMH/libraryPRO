<?php
require_once 'db/conn.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- bootstrap -->
    <link
      rel="stylesheet"
      href="./bootstrap-5.2.3-dist/css/bootstrap.min.css"
    />
    <script
      defer
      src="./bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js"
    ></script>
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
    <title>مكتبة العلم</title>
	<style>
	.avatar {
  vertical-align: middle;
  width: 35px;
  height: 35px;
  border-radius: 50%;
   pointer-events: none;
}
.dropbtn {
  border-radius: 6px;
    background-color: #45b09e;
    color: black;
    padding: 8px;
    font-size: 16px;
    border: none;
    cursor: pointer;
    position: absolute;
    top: 50%;
    width: 120px;
    transform: translateY(-50%);
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
}

.dropdown {
  right: 23% ;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  top: 61px;
  border-radius: 10px;

}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
	
	
	</style>
  </head>
  <body>
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
    <!-- navbar sticky -->
    <!-- landing -->
    <header class="landing">
      <div class="container">
        <h1 class="text-white">مكتبة العلم</h1>
        <h2 class="p-0 m-0 text-white">محرك بحث الكتب بالذكاء الإصطناعي</h2>
        <div class="search gap-3">
          <button class="btn">بحث</button>
          <input type="text" placeholder="ابحث عن كتاب أو مؤلف كتاب" />
          <i dir="ltr" class="icon fa-solid fa-magnifying-glass"></i>
        </div>
      </div>
    </header>
    <!-- landing -->
    <!-- features -->
    <section class="features">
      <div class="container py-5">
        <div class="row">
          <div class="col-12 col-md-6 col-lg-3 box">
            <img
              class="img-100"
              src="./images/online-education.svg"
              alt="online-education"
            />
            <h3>8,000,000 زائر شهرياً</h3>
            <p>
              يزور موقع مكتبة العلم اكثر من 8 مليون زائر مهتم بالكتب العربية
              شهرياً حول العالم
            </p>
          </div>
          <div class="col-12 col-md-6 col-lg-3 box">
            <img
              class="img-100"
              src="./images/online-education.svg"
              alt="online-education"
            />
            <h3>100,000 عملية بحث يومياً</h3>
            <p>
              أكثر من 100 ألف عملية بحث عن كتاب عربي تحدث يومياً على مكتبة العلم
            </p>
          </div>
          <div class="col-12 col-md-6 col-lg-3 box">
            <img
              class="img-100"
              src="./images/online-education.svg"
              alt="online-education"
            />
            <h3>870,341 كتاب</h3>
            <p>
              آلاف الكتب المنشورة على مكتبة العلم منها ما نشره المؤلف بنفسه أو
              فريق المكتبة
            </p>
          </div>
          <div class="col-12 col-md-6 col-lg-3 box">
            <img
              class="img-100"
              src="./images/online-education.svg"
              alt="online-education"
            />
            <h3>285,053 مؤلف</h3>
            <p>
              تهدف مكتبة العلم إلى إنشاء أكبر قاعدة بيانات لمؤلفين الكتب العربية
              عبر التاريخ
            </p>
          </div>
        </div>
        <h5 class="pt-5 text-center text-main">
          قريباً تمكين المؤلفين ودور النشر والمكتبات من بيع الكتب الإلكترونية
          والورقية من خلال منصة مكتبة العلم
        </h5>
      </div>
    </section>
    <!-- features -->
    <!-- books -->
      <!-- books -->
  </body>
</html>


