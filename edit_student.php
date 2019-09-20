<?php
session_start();
include "./connect.php";
  if(isset($_SESSION['username'])){
      $sql="select * from employee where emp_id='".$_SESSION['username']."' and role='stu_Admin'";
	  $res=mysql_query($sql);
	  if(mysql_num_rows($res) > 0){


	      }else{
		    header("location:index.php");
		       }
       }else{
	    header("location:index.php");
	        }

if(isset($_POST['edit_register'])){
  $error="";
	$n=$_POST['stu_name'];
	$ln=$_POST['stu_lname'];
	$de=$_POST['stu_department'];
	$a=$_POST['stu_age'];
	$s=$_POST['stu_status'];
	$y=$_POST['stu_year'];
	$se=$_POST['stu_sex'];
	$sid=$_POST['code'];
	if( $n && $ln && $de && $a && $s && $y && $se){
		$sql1="update student set student_name='".$n."',last_name='".$ln."',department='".$de."',age='".$a."',status='".$s."',year='".$y."',sex='".$se."' where student_id='".$sid."'";
		$result=mysql_query($sql1);
	 if($result){
		header('location:manage_student.php');
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
            <li><a class="active" href="stu_Admin.php">Register Student</a></li>
            <li><a href="manage_student.php">Manage Student</a></li>
            <li><a href="update_profile_stu.php">Update Profile</a></li>
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
                <form action="edit_student.php"method="post">
<i><font color="red"size="2px" style="margin-left:100px"><?php if(isset($_POST['edit_register'])) echo "".$error.""; ?></font></i>
			<?php
			$code=$_GET['value'];
			$sql3="select * from student where student_id='".$code."'";
			$result3=mysql_query($sql3);

		if($result3){
                  $sign=1;
                  $rows=mysql_fetch_assoc($result3);
                 }else{
                  $sign=0;
                 }

			if($sign == 1){
                        $c0=$rows['student_id'];
                           $c1=$rows['student_name'];
                          
                           $c4=$rows['last_name'];
                           $c5=$rows['department']; 
                           $c6=$rows['age']; 
                           $c7=$rows['status']; 
                            $c8=$rows['year']; 
                             $c9=$rows['sex']; 
                                         }
			?>
id:<?php echo "".$c0 ?>
<input type="hidden" value="<?php echo "".$c0 ?>"name="code" />
<div class="gab"></div>
Student Name: &nbsp &nbsp <input value="<?php echo "".$c1 ?>" name="stu_name" type="text"/>
<div class="gab"></div>
Last Name: &nbsp &nbsp &nbsp &nbsp <input value="<?php echo "".$c4 ?>" name="stu_lname" type="text"/>
<div class="gab"></div>
Department: &nbsp &nbsp &nbsp &nbsp <input value="<?php echo "".$c5 ?>" name="stu_department" type="text"/>
<div class="gab"></div>
age: &nbsp  &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp <input value="<?php echo "".$c6 ?>" name="stu_age" type="number" style="width:230px;"/>
<div class="gab"></div>
status: &nbsp   &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp <input value="<?php echo "".$c7 ?>" name="stu_status" type="text"/>
<div class="gab"></div>
year: &nbsp &nbsp   &nbsp &nbsp &nbsp &nbsp  &nbsp   &nbsp &nbsp &nbsp<input value="<?php echo "".$c8 ?>" name="stu_year" style="width:230px;" type="number" />
<div class="gab"></div>
sex: &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp   &nbsp &nbsp<input value="<?php echo "".$c9 ?>" name="stu_sex" type="text"/>
<div class="gab"></div>
<input type="submit" class="edit_register" name="edit_register" id="submit" value="Edit Student" style="margin-left:100px;" />
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
