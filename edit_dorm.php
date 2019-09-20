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

if(isset($_POST['edit_dorm'])){
  	$error="";
	$n=$_POST['block_no'];
	$ln=$_POST['for_which'];
	
	$sid=$_POST['code'];
	if( $n && $ln ){
		$sql1="update dorm set block_no='".$n."',for_which='".$ln."' where dorm_no='".$sid."'";
		$result=mysql_query($sql1);
	 if($result){
		header('location:manage_dorm.php');
	}else{
		$error="sth wrong";
		}
	}else{
		$error="pls fill all fields";	
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
                <form action="edit_dorm.php"method="post">
<i><font color="red"size="2px" style="margin-left:100px"><?php if(isset($_POST['edit_dorm'])) echo "".$error.""; ?></font></i>
			<?php
			$code=$_GET['value'];
			$sql3="select * from dorm where dorm_no='".$code."'";
			$result3=mysql_query($sql3);

		if($result3){
                  $sign=1;
                  $rows=mysql_fetch_assoc($result3);
                 }else{
                  $sign=0;
                 }

			if($sign == 1){
                           $c0=$rows['dorm_no'];
                           $c1=$rows['block_no'];
                           $c4=$rows['for_which']; 
                                         }
			?>
<input type="hidden" value="<?php echo "".$c0 ?>"name="code" />
<div class="gab"></div>
Block_no: &nbsp &nbsp &nbsp &nbsp<input value="<?php echo "".$c1 ?>" name="block_no" type="text"/>
<div class="gab"></div>
For which: &nbsp &nbsp &nbsp &nbsp<input value="<?php echo "".$c4 ?>" name="for_which" type="text"/>
<div class="gab"></div>
<div class="gab"></div>
<input type="submit" class="edit_register" name="edit_dorm" id="submit" value="Edit Dorm" style="margin-left:100px;" />
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
