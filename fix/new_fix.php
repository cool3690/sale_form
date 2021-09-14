<!DOCTYPE html>
<html lang="en">
  <head>
  <?php 
	  include_once ("head.php"); 
	  include_once("nav_fix.php");
	  require '../db_login.php';
	?>
   <link rel="stylesheet" href="css/n_fix.css"> 	 
  </head>
   
  <title>報修表單</title>
  
   
</head>
 
<body > 
 
<?php
	 
	 $name = $_SESSION['acc'];
	
	 if(isset($_POST['submit'])){
		 $date=$_POST['date'];//date('Y/m/d');
		 $depart=$_POST['depart'];
		 $myname=$_POST['myname'];
		 $fix_date=$_POST['fix_date'];
		 $company = $_POST['company'];
		 $equipment=$_POST['equipment'];
		 $item = $_POST['item'];
		 $quantity=$_POST['quantity'];
		 $unit=$_POST['unit'];
		 $fee=$_POST['fee'];
		 $note=$_POST['note'];
		  
		$sql_in="insert into fix_form (`date`,`depart`,`myname`,`fix_date`,`equipment`,`item`,`company`,`quantity`,`unit`,`fee`,`note`,`status`) values 
		('$date','$depart','$myname','$fix_date','$equipment','$item','$company','$quantity','$unit','$fee','$note','N')";
		 
		if (mysqli_query($db, $sql_in)) {
			echo '<div class="alert alert-info alert-dismissible">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<i class="far fa-check-circle fa-lg pr-3" style="color:blue;"></i><strong>新增成功</strong><br>
				</div>';
		}
		   
	
     }	
		
	?>
	 
<div class="container">
	
<form  id="myform" name="myform" action="new_fix.php" method="post" enctype="multipart/form-data">
  
  <!-- ?status_title=2-->
   <div class="container" > <br>
   
<div class="form-group row"  style="margin-top:48px;" >	
 
	 <!--line 1-->
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff; " > </div> 
	 
	 <div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-5 "  >
		   <label>填單日期:</label> 
		   <input class="form-control" name="date" id="date" value="<?=date("Y/m/d");?>" readonly="readonly" />
				 
	 </div>	
	 <div class="col-12 col-xs-12 col-sm-3 col-md-3 col-lg-3 mt-5 "  >
		   <label>部門:</label> 
		   <select class="form-control" name="depart" id="depart"   >
				   <option value='廠務課'>廠務課</option>
				 <option value='設備維護課'>設備維護課</option>
				 <option value='拌合控制課'>拌合控制課</option>
				 <option value='進料課'>進料課</option>
			</select>		 

	 </div>	
	 <div class="col-12 col-xs-12 col-sm-3 col-md-3 col-lg-3 mt-5">
		 <label>名字</label>
		 <select class="form-control" name="myname" id="myname">
			 <option value="錢璟璘">錢璟璘</option>
			 <option value="蕭為豪">蕭為豪</option>
			 <option value="辜膺陵">辜膺陵</option>
			 <option value="余宗欣">余宗欣</option>
			 <option value="吳振濱">吳振濱</option>
		 </select>
	 </div>

	  
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div>
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
	  
	 

	 <!--line 2-->
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div> 
	 <div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4 mt-3">
		 <label>維修日期</label>
		 <input type="date" class="form-control" name="fix_date" id="fix_date" required="required">
	</div>
	 <div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4 mt-3 "  >
		   <label>廠商：</label> 
		   <input list="company" name="company" class="form-control"></label>
		   <datalist  name="company" id="company">
		 <?php
		 $sql="select* from fix_company;";
		 $result=mysqli_query($db,$sql);
		 while($row=mysqli_fetch_array($result)){
			echo '<option value='.$row['company'].'>';
		 }
		 ?>
			</datalist>
	 </div>   
	 

	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div>
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
	    
	  <!--line 2-->
	  <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div> 
	 <div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4 mt-3">
		 
		 <label>設備：</label> 
		   <input list="equipment" name="equipment" class="form-control"></label>
		   <datalist  name="equipment" id="equipment">
				 <?php
				 	$sql="select* from fix_equipment;";
					$result=mysqli_query($db,$sql);
					while($row=mysqli_fetch_array($result)){
						echo '<option value='.$row['equipment'].'>';
					}
				 ?>

			</datalist>
	</div>
	 <div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4 mt-3 "  >
		   <label>維修項目：</label> 
		   <input list="item" name="item" class="form-control"></label>
		   <datalist  name="item" id="item">
		   <?php
				 	$sql="select* from fix_item;";
					$result=mysqli_query($db,$sql);
					while($row=mysqli_fetch_array($result)){
						echo '<option value='.$row['item'].'>';
					}
				 ?>

			</datalist>
	 </div>   
	 

	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div>
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
	    
	 
	  <!--line 3-->
	  <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div> 
	 
	 <div class="col-12 col-xs-12 col-sm-3 col-md-3 col-lg-3 mt-3 "  >
		   <label>數量：</label> 
		   <input type="number" name="quantity" id="quantity" class="form-control"> 
		    
	 </div>   
	 <div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-3 "  >
		   <label>單位：</label> 
		   <input list="unit" name="unit" class="form-control"></label>
		   <datalist  name="unit" id="unit">
    	   
			<option value="台">
			<option value="包">
			<option value="個">
			<option value="升">
			<option value="加侖">
			</datalist>

	 </div>   
	 <div class="col-12 col-xs-12 col-sm-3 col-md-3 col-lg-3 mt-3 "  >
		   <label>費用：</label> 
		   <input type="number" name="fee" id="fee" class="form-control"> 
		    
	 </div>

	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div>
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
	<!--line4-->
	<div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff; " > </div> 
	 
	 <div class="col-12 col-xs-12 col-sm-8 col-md-8 col-lg-8 mt-2 mb-2">
		   <label>備註：</label> 
		   <textarea class="form-control" name="note" id="note" value=""></textarea>
	 </div>	
	  
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div>
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
	  
	 
	 <!--here-->
 

	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"   > </div>
	<div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff; border-radius:10px;" > </div>

		 <div class="col-12 col-xs-12 col-sm-8 col-md-8 col-lg-8 mt-5 mb-2"  ><center>
		 <button type="submit" name="submit" class="btn " style="margin-bottom:48px;" onmousedown="this.style.background='#009761';" >報修新增</button>
</center>
	 </div>	
	 
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff; border-radius:10px;" > </div>
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div>
	
 
</div>
  
</body>
</html>
