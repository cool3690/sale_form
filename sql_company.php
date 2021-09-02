<?php
require 'db_login.php';
//$q = isset($_GET["q"]) ? intval($_GET["q"]) : '';
 $q =  $_GET["q"] ;
if(empty($q)) {
    echo 'choose';
    exit;
}
  
 $sql="SELECT * FROM erp_form where status in('N','RN') and company='".$q."'";
$result = mysqli_query($db,$sql);
    $work_case="";
 while($row = mysqli_fetch_array($result))
{
    
	$work_case.=$row['work_case']."\n" ;
  
}  
echo $work_case;
mysqli_close($db);
?>