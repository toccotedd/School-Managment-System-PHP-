<?php
session_start();
include "./connect.php";
  if(isset($_SESSION['username'])){
      $sql="select * from employee where emp_id='".$_SESSION['username']."' and role='dorm_manager'";
	  $res=mysql_query($sql);
	  if(mysql_num_rows($res) > 0){
	      }else{
		    header("location:index.php");
		       }
       }else{
	    header("location:index.php");
	        }

if(isset($_POST['dorm_register'])){
        $error="";
	$id=$_POST['dorm_no'];
	$n=$_POST['black_no'];
	$ln=$_POST['forwhich'];
	if($id && $n && ln){
	$sql1="insert into dorm values('".$id."','".$n."','".$ln."')";
	$result=mysql_query($sql1);
	if($result){
		$error="successfully Registered";
	}else{
		$error="sth wrong";
	}
	}else{
		$error="plz fill all fields";
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
	
	<script language="javascript"type="text/javascript">
function letteronly(){
  var charCode=event.keyCode;
  if((charCode > 64 && charCode<91 )|| (charCode > 96 && charCode <123)|| charCode==32)
    return true;
  else
    return false;
}
</script>
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
            <li><a class="active" href="dorm_manager.php">Register Dorm</a></li>
	    <li><a href="manage_dorm.php">Manage Dorm</a></li>
            <li><a href="Assign_dorm.php">Assign Dorm</a></li>
            <li><a href="update_profile_dorm.php">Update Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
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
			<div class="non-login-form">
<font color="red"size="5px" style="margin-left:110px;"><?php if(isset($_POST['dorm_register'])) echo "".$error.""?></font>
                 <fieldset>
					 <form action="Assign_dorm.php" method="POST">
					Dorm No: &nbsp &nbsp &nbsp &nbsp <select name="forwhich" style="width:247px;height:30px;margin-top:5px;">
		<?php
$sqldorm="select * from dorm";
$result=mysql_query($sqldorm);
if($result){
while($row=mysql_fetch_assoc($result)){
	echo "<option>".$row['dorm_no']."</option>";
}
}

?>

</select>
					<div class="gab"></div>
					Student: &nbsp &nbsp &nbsp &nbsp <input style="width:230px;" name="black_no" type="number" onKeyPress="return letteronly(event)" />
					<div class="gab"></div>
			
					<div class="gab"></div>
					<input name="dorm_register" type="submit" value="Register Dorm" id="login_center" />
					</form>
					 
				</fieldset>
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
