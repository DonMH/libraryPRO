<?php
session_start();
require_once 'db/conn.php';
$results = $crud->getUsers();
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
    <title>صفحتي </title>
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
div.scrollbar{
	overflow:"auto";
	}

.bigfont{
	font-size: 20px;
}

body{
    background: #fff;
}
.emp-profile{
  padding: 3%;
    margin-top: 0%;
    margin-bottom: 3%;
    margin-left: 8%;
    border-radius: 0.5rem;
    background-image: url(./images/bg.svg);
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 250px;
    height: 250px;
	border-radius: 50%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}

.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: black;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: black;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: black;
    font-weight: 600;
    font-size: 20px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
	
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
    
	<div style="background-color: #f1f1f1;">
	<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="./images/imgprof.svg" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                    <?php if (empty($_SESSION['name'])) { ?>
                                              <p>Admin</p>
                                              <?php } else { ?>
                                    <?php echo $_SESSION['name'] ?>
                                    <?php } ?>
                                    </h5>
                                    <h6>
                                      <?php if(($_SESSION['userid'])>1){ ?>
                                        قارئ و ليس مسؤول
                                        <?php } else { ?>
                                          مسؤول
                                          <?php }?>
                                    </h6>
                                   
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">معلومات</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="col-md-2">
                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="تعديل الحساب"/>
                    </div> -->
                </div>
                <div class="row">
                 
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
						<div >
                            <div class="" id="home" role="tabpanel" aria-labelledby="home-tab">
							
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>الايميل</label>
                                            </div>
                                            <div class="col-md-6">
                                            <?php if (empty($_SESSION['email'])) { ?>
                                              <p>فارغ</p>
                                              <?php } else { ?>
                                                <p> <?php echo $_SESSION['email'] ?></p>
                                                <?php }?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>تاريخ الميلاد</label>
                                            </div>
                                            <div class="col-md-6">
                                            <?php if (empty($_SESSION['dob'])) { ?>
                                              <p>فارغ</p>
                                              <?php } else { ?>
                                                <p><?php echo $_SESSION['dob'] ?>/<?php echo $_SESSION['mob'] ?>/<?php echo $_SESSION['yob'] ?></p>
												                       <?php }?>
											                    </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label> النوع</label>
                                            </div>
                                            <div class="col-md-6">
											
                                                <p>
                                                <?php if (empty($_SESSION['email'])) { ?>
                                              <p>فارغ</p>
                                              <?php } else { ?>
                                                <?php if(($_SESSION['gender'])=='Male'){ ?>
                                                  ذكر
                                                  <?php } else { ?>
                                                    أنثي
                                                    <?php }?> 
                                                    <?php }?>                                       
                                              </p>
												
											                    </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>الفئة</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php if(($_SESSION['userid'])>1){ ?>
                                        قارئ   
                                        <?php } else { ?>
                                          مسؤول
                                          <?php }?></p>
                                            </div>
                                        </div>
                            </div>
</div>                           
                                       

                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
	
	</body>
</html>