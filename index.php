<?php
session_start();
include "./connect.php";
  if(isset($_POST['login'])){
  $error="";
    $username=$_POST['name'];
    $password=$_POST['password'];
    $type=$_POST['type'];
    if($username && $password && $type){
      $sql="select * from employee where emp_id='".$username."' and password='".$password."' and role='".$type."' ";
      $result=mysql_query($sql);
      if(mysql_num_rows($result)>0){
        $row=mysql_fetch_assoc($result);
        $_SESSION['username']=$row['emp_id'];
        if($type=="stu_Admin"){ header("location:stu_Admin.php"); }
        if($type=="sys_Admin"){ header("location:sys_Admin.php"); }
        if($type=="accountant"){ header("location:accountant.php"); }
        if($type=="dorm_manager"){ header("location:dorm_manager.php"); }
        if($type=="cafe_manager"){ header("location:cafe_manager.php"); }
        if($type=="nurse"){ header("location:nurse.php"); }
      }else{
        $error="invalid username or password";
      }
    }else{
    $error="pls fill all field";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>SSMS</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen">
<script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="js/cufon-yui.js" type="text/javascript"></script>
<script src="js/cufon-replace.js" type="text/javascript"></script>
<script src="js/Dynalight_400.font.js" type="text/javascript"></script>
<script src="js/FF-cash.js" type="text/javascript"></script>
<script src="js/tms-0.3.js" type="text/javascript"></script>
<script src="js/tms_presets.js" type="text/javascript"></script>
<script src="js/jquery.easing.1.3.js" type="text/javascript"></script>
<script src="js/jquery.equalheights.js" type="text/javascript"></script>
<!--[if lt IE 9]><script type="text/javascript" src="js/html5.js"></script><![endif]-->
</head>
<body id="page1">
<!--==============================header=================================-->
<header>
  <div class="row-top">
    <div class="main">
      <div class="wrapper">
        <h1><a href="index.html">S.S.M.S.</a></h1>
        <nav>
          <ul class="menu">
            <li><a class="active" href="index.html">Home</a></li>
            <li><a href="menu.html">Menu</a></li>
            <li><a href="catalogue.html">Catalogue </a></li>
            <li><a href="shipping.html">Shipping</a></li>
            <li><a href="faq.html">FAQ </a></li>
            <li><a href="contact.html">Contact</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
  
</header>
<!--==============================content================================-->
<section id="content">
  <div class="main">
    
    <div class="wrapper">
        <div class="maxheight indent-bot">
			<div class="login">
        <center><font color="red"size="5px"><?php if(isset($_POST['login'])) echo "".$error.""?></font></center>
					<div class="gab"></div>
        
				<form action="index.php"method="post">
					UserName: &nbsp &nbsp &nbsp<input  name="name" type="text" />
					<div class="gab"></div>
					
					Password:&nbsp &nbsp &nbsp &nbsp<input name="password" type="password" />
					<div class="gab"></div>
					UserType: &nbsp &nbsp &nbsp &nbsp<select name="type" style="width:247px;height:30px;margin-top:5px;">
						<option value="stu_Admin">Student Admin</option>
						<option value="sys_Admin">System Admin</option>
						<option value="accountant">Accountant</option>
						<option value="dorm_manager">Dorm manager</option>
						<option value="cafe_manager">Cafe manager</option>
						<option value="nurse">Nurse</option>
					</select>
					<div class="gab"></div>
					<div class="gab"></div>
					<input name="login" type="submit" value="Login" id="login_center" />
					</form>
				
			</div>
         
		</div>
         
    </div>
  </div>
</section>
<!--==============================footer=================================-->
<footer>
  <div class="main">
    <div class="aligncenter"> <span>Copyright &copy; <a href="#">Adigrat University Student</a> All Rights Reserved</span>  </div>
  </div>
</footer>
<script type="text/javascript">Cufon.now();</script>
<script type="text/javascript">
$(window).load(function () {
    $('.slider')._TMS({
        duration: 1000,
        easing: 'easeOutQuint',
        preset: 'slideDown',
        slideshow: 7000,
        banners: false,
        pauseOnHover: true,
        pagination: true,
        pagNums: false
    });
});
</script>
</body>
</html>
