<?php
   session_start();
   include "./connect.php";
 
   $code=$_GET['value'];
   if( $code){
      
	                  $sql="delete from student where student_id='".$code."'";
					  $result=mysql_query($sql);
	                  header("location:manage_student.php");

                       }
     
?>
