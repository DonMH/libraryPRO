<?php
session_start();
require_once 'db/auth.php';
require_once 'db/conn.php';
$results = $crud->getUsers();
$resultsB = $book->getBooks();
$resultsA = $book->getAuthor();
$resultsC = $book->getCategory();
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
    </div>    <div class="container-lg" style="margin-right: 4rem;padding-top: 2rem;">
    
      <div class="col-md-3">
      <a  data-bs-toggle="collapse" href="#collapseUser" role="button" aria-expanded="false">
      <label style="font-size: 2rem;"><i class="fa fa-user"></i> ادارة المستخدم</label>
      </a>
      </div>
      <div class="container-lg collapse" id="collapseUser">
        <table class="table table-bordered table-striped table-hover text-center">
          <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">الاسم</th>
            <th scope="col">البريد الالكتروني</th>
            <th scope="col">تاريخ الميلاد</th>
            <th scope="col">النوع</th>
            <th scope="col">العملية</th>
          </tr>
        </thead>
        <tbody>
          <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
          <tr>
              <td><?php echo $r['user_id'] ?></th>
              <td><?php echo $r['name'] ?></td>
              <td><?php echo $r['email'] ?></td>
              <td><?php echo $r['dob'] ?>/<?php echo $r['mob'] ?>/<?php echo $r['yob'] ?></td>
              <td><?php echo $r['gender'] ?></td>
              <td>  
                  <a href="edit.php?id=<?php echo $r['user_id'] ?>" class="btn btn-warning">تعديل</a>
                  <a onclick="return confirm('Are you sure you want to delete this record?');" href="remove.php?id=<?php echo $r['user_id'] ?>" class="btn btn-danger">حذف</a>
              </td>
          </tr>
          <?php }?>
        </tbody>
      </table>
      </div>
    <br>
    <br>
      <div class="col-md-3">
      <a  data-bs-toggle="collapse" href="#collapseBook" role="button" aria-expanded="false">
      <label style="font-size: 2rem;"><i class="fa fa-book"></i> ادارة الكتب</label>
      </a>
      </div>
      <div class="container-lg collapse" id="collapseBook">
        <table class="table table-bordered table-striped table-hover text-center">
          <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">العنوان</th>
            <th scope="col">تاريخ النشر</th>
            <th scope="col">القسم</th>
            <th scope="col">اللغة</th>
            <th scope="col">المؤلف</th>
            <th scope="col">العملية</th>
          </tr>
        </thead>
        <tbody>
          <?php while($r = $resultsB->fetch(PDO::FETCH_ASSOC)) { ?>
          <tr>
              <td><?php echo $r['ISBN'] ?></th>
              <td><?php echo $r['Book_Title'] ?></td>
              <td><?php echo $r['Publication_year'] ?></td>
              <td><?php echo $r['category_name'] ?></td>
              <td><?php echo $r['language'] ?></td>
              <td><?php echo $r['author_name'] ?></td> 
              <td>  
                  <a href="editBook.php?isbn=<?php echo $r['ISBN'] ?>" class="btn btn-warning">تعديل</a>
                  <a onclick="return confirm('Are you sure you want to delete this record?');" href="removeBook.php?isbn=<?php echo $r['ISBN'] ?>" class="btn btn-danger">حذف</a>
              </td>
          </tr>
          <?php }?>
        </tbody>
      </table>
      </div>
      <br>
      <br>
      <div class="col-md-3">
      <a  data-bs-toggle="collapse" href="#collapseAdd" role="button" aria-expanded="false">
      <label style="font-size: 2rem;"><i class="fa fa-add"></i> اضافة كتاب</label>
      </a>
      </div>
      <div class="container-lg collapse" id="collapseAdd" style="padding: 2rem 7rem;">
        <form method="post" action="successBook.php" enctype="multipart/form-data">
          <div class="col-md-12">
            <div class="form-group">
              <label class="floating-label" for="title">العنوان</label>
              <input type="text" name="title" id="title" class="form-control input-lg" required>
            </div>
          </div>
          <br>
          <div class="col-md-12">
            <div class="form-group">
              <label class="floating-label" for="pubData">تاريخ النشر</label>
              <input type="text" name="pubData" id="pubData" class="form-control input-lg" required>
            </div>
          </div>

          <br>
          <div class="col-md-12">
            <div class="form-group">
              <label class="floating-label" for="lang">اللغة</label>
              <input type="text" name="lang" id="lang" class="form-control input-lg" required>
            </div>
          </div>
          <br>
          <div class="col-md-12">
            <div class="form-group">
            <label class="floating-label" for="author">المؤلف</label>
            <select  name="author" id="author" class="form-control input-lg" required>
                <?php while($r = $resultsA->fetch(PDO::FETCH_ASSOC)) {?>
                   <option value="<?php echo $r['author_id'] ?>"><?php echo $r['author_name']; ?></option>
                <?php }?>
            </select>
            </div>
          </div>
          <br>
          <div class="col-md-12">
            <div class="form-group">
            <label class="floating-label" for="cat">القسم</label>
            <select  name="cat" id="cat" class="form-control input-lg" required>
                <?php while($r = $resultsC->fetch(PDO::FETCH_ASSOC)) {?>
                   <option value="<?php echo $r['category_id'] ?>"><?php echo $r['category_name']; ?></option>
                <?php }?>
            </select>
            </div>
          </div>
          <br>
          <div class="col-md-12">
            <div class="form-group">
            <label class="floating-label" for="avatar">اضافة صورة</label>
            <input type="file" id="avatar" name="avatar" accept="image/*" class="form-control input-lg" >
            <small id="avatar" class="form-text text-danger">Optional.</small>
            </div>
          </div>
          <br>
            <div class="col-md-12">
            <div class="form-group">
              <button type="submit" name="submitB" class="btn btn-success col-md-12"><i class="fa fa-book"></i>  اضافة كتاب</button>
          </div>
        </form>
      </div>
     </div>
  </body>
</html>