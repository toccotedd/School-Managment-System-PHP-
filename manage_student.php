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

if(isset($_POST['register'])){
  $error="";
	$id=$_POST['stu_id'];
	$n=$_POST['stu_name'];
	$ln=$_POST['stu_lname'];
	$de=$_POST['stu_department'];
	$a=$_POST['stu_age'];
	$s=$_POST['stu_status'];
	$y=$_POST['stu_year'];
	$se=$_POST['stu_sex'];

	if($id && $n && $ln && $de && $a && $s && $y && $se){
		$sql1="insert into student values('".$id."','".$n."','".$ln."','".$de."','".$a."','".$s."','".$y."','".$se."')";
		$result=mysql_query($sql1);
	 if($result){
		$error="successfully Registered";
	}else{
		$error=mysql_error();
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
		<div class="non-login-page">
                     <table class="table">
			<tr>
			<th>Student Id</th>
			<th>Student Name</th>
			<th>Last Name</th>
			<th>Department</th>
			<th>Age</th>
			<th>Status</th>
			<th>Year</th>
			<th>Sex</th>
			<th>Edit</th>
			<th>Delete</th>
			</tr>
			    <?php
				  $sql2="select * from student";
				   $result2=mysql_query($sql2);
				   if( $result2){
				       while($row=mysql_fetch_assoc($result2)) {
				       	  echo "<tr>";
						echo "<td>".$row['student_id']."</td>";
						$no=$row['student_id'];
					echo "<td>".$row['student_name']."</td>";
					echo "<td>".$row['last_name']."</td>";
					echo "<td>".$row['department']."</td>";
					echo "<td>".$row['age']."</td>";
					echo "<td>".$row['status']."</td>";
					echo "<td>".$row['year']."</td>";
					echo "<td>".$row['sex']."</td>";
					echo "<td><a href=\"edit_student.php?value=$no\">Edit</a></td>";
					echo "<td><a href=\"delete_student.php?value=$no\">Delete</a></td>";
					    echo "</tr>";
				       }
						
				       }else{
					   $error="Error occured 404";
					        }
				
				?>
		    </table>
		
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
