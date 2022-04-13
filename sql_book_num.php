<?php
require 'db_login.php';
//$q = isset($_GET["q"]) ? intval($_GET["q"]) : '';
 $company =  $_GET["company"] ; 
 $work_case = $_GET["work_case"] ;
if(empty($company) ||empty($work_case)) {
     
    exit;
}
  
 $sql="SELECT * FROM erp_form where status in('N','RN') and work_case='".$work_case."' and company='".$company."'";
$result = mysqli_query($db,$sql);
    $book_num="";
 while($row = mysqli_fetch_array($result))
{
    
	$book_num=$row['book_num']  ;
  $strength=$row['strength'] ;
  $user=$row['user'];
  $tel=$row['tel'];
}  
echo $book_num."/".$strength."/".$user."/".$tel ;
mysqli_close($db);
?>