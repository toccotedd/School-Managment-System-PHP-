<?php
   session_start();
   include "./connect.php";
   $code=$_GET['value'];
   if( $code){
      
	                  $sql="delete from dorm where dorm_no='".$code."'";
					  $result=mysql_query($sql);
	                  header("location:manage_dorm.php");

                       }
     
?>
