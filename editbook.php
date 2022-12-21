<?php
require_once 'db/conn.php';
session_start();
$results = $book->getBooks();
$resultsA = $book->getAuthor();
$resultsC = $book->getCategory();
if(!isset($_GET['isbn']))
{
    echo 'error';
}
else{
    $isbn = $_GET['isbn'];
    $book2 = $book->getBookDetails($isbn);
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


      <p style="text-align: center;">تعديل كتاب</p>
      <div class="container-lg" style="padding: 2rem 7rem;">
        <form method="post" action="editBookSucc.php">
        <input type="hidden" name="isbn" value="<?php echo $book2['ISBN'] ?>">
          <div class="col-md-12">
            <div class="form-group">
              <label class="floating-label" for="title">العنوان</label>
              <input type="text" name="title" id="title" value="<?php echo $book2['Book_Title'] ?>" class="form-control input-lg" required>
            </div>
          </div>
          <br>
          <div class="col-md-12">
            <div class="form-group">
              <label class="floating-label" for="pubData">تاريخ النشر</label>
              <input type="text" name="pubData" id="pubData" value="<?php echo $book2['Publication_year'] ?>"  class="form-control input-lg" required>
            </div>
          </div>

          <br>
          <div class="col-md-12">
            <div class="form-group">
              <label class="floating-label" for="lang">اللغة</label>
              <input type="text" name="lang" id="lang" value="<?php echo $book2['language'] ?>" class="form-control input-lg" required>
            </div>
          </div>
          <br>
          <div class="col-md-12">
            <div class="form-group">
            <label class="floating-label" for="author">المؤلف</label>
            <select name="author" id="author" class="form-control input-lg" required>
                <?php while($r = $resultsA->fetch(PDO::FETCH_ASSOC)) {?>
                   <option value="<?php echo $r['author_id'] ?>" <?php if($r['author_id'] == $book2['author_id']) echo 'selected' ?>>
                        <?php echo $r['author_name']; ?>
                   </option>
                <?php }?>
            </select>
            </div>
          </div>
          <br>
          <div class="col-md-12">
            <div class="form-group">
            <label class="floating-label" for="cat">القسم</label>
            <select name="cat" id="cat" class="form-control input-lg" required>
                <?php while($r = $resultsC->fetch(PDO::FETCH_ASSOC)) {?>
                   <option value="<?php echo $r['category_id'] ?>" <?php if($r['category_id'] == $book2['category_id']) echo 'selected' ?>>
                        <?php echo $r['category_name']; ?>
                   </option>
                <?php }?>
            </select>
            </div>
          </div>
          <br>
            <div class="col-md-12">
            <div class="form-group">
              <button type="submit" name="submitC" class="btn btn-success col-md-12"><i class="fa fa-save"></i>  حفظ التعديلات</button>
          </div>
            </div>
        </form>
      </div>
<?php }
?>
    
</body>
</html>
