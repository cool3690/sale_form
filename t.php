<!DOCTYPE html>
<html lang="en">
  <head>
   	  
  </head>
    
	  
</head>
 
<body> 
<div class="container">
 
  <?php 
 require 'db_login.php';
 //	$db->count_records("saleform", "select*form saleform");
	 $result_n =$db->count_records("saleform", "select*form saleform");
 
 while ($row = mysqli_fetch_array($result_n)) {

	 
 }
  ?>
</div>
 
</body>
</html>
