<!DOCTYPE html>
<html lang="en">
  <head>
  <?php 
	  include_once ("head.php"); 
	  include_once("navbar2.php");
	?>
    <link rel="stylesheet" href="css/n_record.css"> 	 
  </head>
   
  <title>訂單輸入表</title>
  
   
</head>
 
<body > 
 
<?php
	  require 'db_login.php';
	 $name = $_SESSION['acc'];
	
	 if(isset($_POST['submit'])){
		 $book_num=$_POST['book_num'];
		 $company = $_POST['company'];
		 $work_case=$_POST['work_case'];
		
		 if (strpos($company, '-')== false) {
		 
		}
		else{
			$tmp_company = explode("-", $company);
			$company=$tmp_company[1];
			$sql="select c_id from customer where c_id='$tmp_company[0]'";
			$result = mysqli_query($db, $sql);
			if(mysqli_num_rows ( $result )==0){
				$sql_in="insert into customer (`c_id`,`company`) values ('$tmp_company[0]','$tmp_company[1]')";
				mysqli_query($db,$sql_in);
			}
		}
		 $date=date('Y/m/d');
		
	 $sql = "INSERT INTO `erp_form`(`book_num`,`date`, `company`, `work_case`,`status`) VALUES 
			('$book_num','$date','$company', '$work_case','N')";
			 
		 if (mysqli_query($db, $sql)) {
              echo '<div class="alert alert-info alert-dismissible">
					 <button type="button" class="close" data-dismiss="alert">&times;</button>
					 <i class="far fa-check-circle fa-lg pr-3" style="color:blue;"></i><strong>新增成功</strong><br>
				   </div>';
         }
     }	
		
	?>
	 
<div class="container">
	
<form  id="myform" name="myform" action="new_record.php" method="post" enctype="multipart/form-data">
  
  <!-- ?status_title=2-->
   <div class="container" > <br>
   
<div class="form-group row"  style="margin-top:48px;" >	
<?php  
require 'db_login.php';	// where delivery='$date' and status in('N','RN')
 
?> 
	 <!--line 1-->
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff; " > </div> 
	 
		 <div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4 mt-5 "  >
		   <label>訂單編號:</label> 
		   <input class="form-control" name="book_num" id="book_num" value=""  >
				 
	 </div>	
	 <div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4 mt-5 "  >
		   <label>客戶：</label> 
		   <input list="company" name="company" class="form-control"></label>
		   <datalist  name="company" id="company">
    	   <?php
					$sql_search2 = "select company,c_id from `customer`";
						$result_n = mysqli_query($db, $sql_search2);
						
						while ($row = mysqli_fetch_array($result_n)) {
				?>
						<option value="<?=$row['c_id']."-".$row['company'];?>">
				<?php
						}
				?>
 
			</datalist>

	 </div>
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div>
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
	  
	 

	 <!--line 2-->
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div> 
	 
	 <div class="col-12 col-xs-12 col-sm-8 col-md-8 col-lg-8 mt-2 mb-2">
	 <label>工程名稱:</label>
	   <input type="text" class="form-control" name="work_case" id="work_case" value="">
	 </div>
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div>
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
	    
	 <!--here-->
 

	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"   > </div>
	<div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff; border-radius:10px;" > </div>

		 <div class="col-12 col-xs-12 col-sm-8 col-md-8 col-lg-8 mt-2 mb-2"  ><center>
		 <button type="submit" name="submit" class="btn " style="margin-bottom:48px;" onmousedown="this.style.background='#009761';" >新增訂單</button>
</center>
	 </div>	
	 
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff; border-radius:10px;" > </div>
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div>
	
 
</div>
  
</body>
</html>
