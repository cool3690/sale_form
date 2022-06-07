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
		 $strength=$_POST['strength'];
		 $user=$_POST['user'];
		 $sale=$_POST['sale'];
		 $tel=$_POST['tel'];
		 $str="";
		 for($i=0;$i<count($strength);$i++){
			//echo $i." : ".$strength[$i]."  ";
			 $str.=$strength[$i].",";
		 }
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
		 $sql_count =  "SELECT `book_num` FROM `erp_form` where `book_num`='$book_num' ";
		 $result_c =mysqli_query($db,$sql_count);
		 if(mysqli_num_rows($result_c)!=0){
			echo '<div class="alert alert-info alert-dismissible">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<i class="fas fa-exclamation-circle fa-lg pr-3" style="color:red;"></i><strong>重複新增</strong><br>
		</div>';
		 } 
		 else{
				$sql = "INSERT INTO `erp_form`(`book_num`,`date`, `company`, `work_case`, `tel`, `user`, `sale`,`strength`,`status`) VALUES 
				('$book_num','$date','$company', '$work_case','$tel','$user' ,'$sale','$str','N')";
				
			if (mysqli_query($db, $sql)) {
				echo '<div class="alert alert-info alert-dismissible">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<i class="far fa-check-circle fa-lg pr-3" style="color:blue;"></i><strong>新增成功</strong><br>
					</div>';
			}
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
	 <!--line 2-->
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div> 
	 
	 <div class="col-12 col-xs-12 col-sm-3 col-md-3 col-lg-3 mt-2 mb-2">
	 <label>電話:</label>
	   <input type="text" class="form-control" name="tel" id="tel" value="">
	 </div>
	 <div class="col-12 col-xs-12 col-sm-3 col-md-3 col-lg-3 mt-2 mb-2">
	 <label>聯絡人:</label>
	   <input type="text" class="form-control" name="user" id="user" value="">
	 </div>
	 <div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2">
	 <label>業務:</label>
	 <select class="form-control" name="sale" id="sale" >
	 				<option value=''>請選擇</option>
					<option value='王南欽'>王南欽</option>
					<option value='王振宇'>王振宇</option>
					<option value='林商發'>林商發</option>
					<option value='林泰宏'>林泰宏</option>
					<option value='林宗達'>林宗達</option>
				</select>	
	 </div>
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div>
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
	     <!--line 3-->
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div> 
	 
	 <div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2">
	 <label>強度1:</label>
	  <input list="strength" name="strength[]" class="form-control"></label>
		   <datalist  name="strength" id="strength">
	    
					<option value='大於20'>大於20</option>
					<option value='大於40'>大於40</option>
					<option value='大於50'>大於50</option>
					<option value='小於80'>小於80</option>
					<option value='小於90'>小於90</option>
					<option value='20-90'>20-90</option>
					<option value='20-70'>20-70</option>
					<option value='30-80'>30-80</option>
					<option value='35-90'>35-90</option>
					<option value='40-80'>40-80</option>
					<option value='50-90'>50-90</option>
					<option value='30-60'>30-60</option>
					<option value='20-50'>20-50</option>
					<option value='140'>140</option>
					<option value='175'>175</option>
					<option value='210'>210</option>
					<option value='245'>245</option>
					<option value='280'>280</option>
					<option value='315'>315</option>
					<option value='350'>350</option>
					<option value='420'>420</option>
		</datalist>
	 </div>
	 <div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2">
	 <label>強度2:</label>
	  <input list="strength" name="strength[]" class="form-control"></label>
		   <datalist  name="strength" id="strength">
	    
					<option value='大於20'>大於20</option>
					<option value='大於40'>大於40</option>
					<option value='大於50'>大於50</option>
					<option value='小於80'>小於80</option>
					<option value='小於90'>小於90</option>
					<option value='20-90'>20-90</option>
					<option value='20-70'>20-70</option>
					<option value='30-80'>30-80</option>
					<option value='35-90'>35-90</option>
					<option value='40-80'>40-80</option>
					<option value='50-90'>50-90</option>
					<option value='30-60'>30-60</option>
					<option value='20-50'>20-50</option>
					<option value='140'>140</option>
					<option value='175'>175</option>
					<option value='210'>210</option>
					<option value='245'>245</option>
					<option value='280'>280</option>
					<option value='315'>315</option>
					<option value='350'>350</option>
					<option value='420'>420</option>
		</datalist>
	 </div>
	 <div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2">
	 <label>強度3:</label>
	  <input list="strength" name="strength[]" class="form-control"></label>
		   <datalist  name="strength" id="strength">
	    <option value='大於20'>大於20</option>
					<option value='大於40'>大於40</option>
					<option value='大於50'>大於50</option>
					<option value='小於80'>小於80</option>
					<option value='小於90'>小於90</option>
					<option value='20-90'>20-90</option>
					<option value='20-70'>20-70</option>
					<option value='30-80'>30-80</option>
					<option value='35-90'>35-90</option>
					<option value='40-80'>40-80</option>
					<option value='50-90'>50-90</option>
					<option value='30-60'>30-60</option>
					<option value='20-50'>20-50</option>
					<option value='140'>140</option>
					<option value='175'>175</option>
					<option value='210'>210</option>
					<option value='245'>245</option>
					<option value='280'>280</option>
					<option value='315'>315</option>
					<option value='350'>350</option>
					<option value='420'>420</option>
		</datalist>
	 </div>
	 <div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2">
	 <label>強度4:</label>
	  <input list="strength" name="strength[]" class="form-control"></label>
		   <datalist  name="strength" id="strength">
	    <option value='大於20'>大於20</option>
					<option value='大於40'>大於40</option>
					<option value='大於50'>大於50</option>
					<option value='小於80'>小於80</option>
					<option value='小於90'>小於90</option>
					<option value='20-90'>20-90</option>
					<option value='20-70'>20-70</option>
					<option value='30-80'>30-80</option>
					<option value='35-90'>35-90</option>
					<option value='40-80'>40-80</option>
					<option value='50-90'>50-90</option>
					<option value='30-60'>30-60</option>
					<option value='20-50'>20-50</option>
					<option value='140'>140</option>
					<option value='175'>175</option>
					<option value='210'>210</option>
					<option value='245'>245</option>
					<option value='280'>280</option>
					<option value='315'>315</option>
					<option value='350'>350</option>
					<option value='420'>420</option>
		</datalist>
	 </div>
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div>
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div>
 <!--line 3-->
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div> 
	 
	 <div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2">
	 <label>強度5:</label>
	  <input list="strength" name="strength[]" class="form-control"></label>
		   <datalist  name="strength" id="strength">
	    <option value='大於20'>大於20</option>
					<option value='大於40'>大於40</option>
					<option value='大於50'>大於50</option>
					<option value='小於80'>小於80</option>
					<option value='小於90'>小於90</option>
					<option value='20-90'>20-90</option>
					<option value='20-70'>20-70</option>
					<option value='30-80'>30-80</option>
					<option value='35-90'>35-90</option>
					<option value='40-80'>40-80</option>
					<option value='50-90'>50-90</option>
					<option value='30-60'>30-60</option>
					<option value='20-50'>20-50</option>
					<option value='140'>140</option>
					<option value='175'>175</option>
					<option value='210'>210</option>
					<option value='245'>245</option>
					<option value='280'>280</option>
					<option value='315'>315</option>
					<option value='350'>350</option>
					<option value='420'>420</option>
		</datalist>
	 </div>
	 <div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2">
	 <label>強度6:</label>
	  <input list="strength" name="strength[]" class="form-control"></label>
		   <datalist  name="strength" id="strength">
	    <option value='大於20'>大於20</option>
					<option value='大於40'>大於40</option>
					<option value='大於50'>大於50</option>
					<option value='小於80'>小於80</option>
					<option value='小於90'>小於90</option>
					<option value='20-90'>20-90</option>
					<option value='20-70'>20-70</option>
					<option value='30-80'>30-80</option>
					<option value='35-90'>35-90</option>
					<option value='40-80'>40-80</option>
					<option value='50-90'>50-90</option>
					<option value='30-60'>30-60</option>
					<option value='20-50'>20-50</option>
					<option value='140'>140</option>
					<option value='175'>175</option>
					<option value='210'>210</option>
					<option value='245'>245</option>
					<option value='280'>280</option>
					<option value='315'>315</option>
					<option value='350'>350</option>
					<option value='420'>420</option>
		</datalist>
	 </div>
	 <div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2">
	 <label>強度7:</label>
	  <input list="strength" name="strength[]" class="form-control"></label>
		   <datalist  name="strength" id="strength">
	    <option value='大於20'>大於20</option>
					<option value='大於40'>大於40</option>
					<option value='大於50'>大於50</option>
					<option value='小於80'>小於80</option>
					<option value='小於90'>小於90</option>
					<option value='20-90'>20-90</option>
					<option value='20-70'>20-70</option>
					<option value='30-80'>30-80</option>
					<option value='35-90'>35-90</option>
					<option value='40-80'>40-80</option>
					<option value='50-90'>50-90</option>
					<option value='30-60'>30-60</option>
					<option value='20-50'>20-50</option>
					<option value='140'>140</option>
					<option value='175'>175</option>
					<option value='210'>210</option>
					<option value='245'>245</option>
					<option value='280'>280</option>
					<option value='315'>315</option>
					<option value='350'>350</option>
					<option value='420'>420</option>
		</datalist>
	 </div>
	 <div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2">
	 <label>強度8:</label>
	  <input list="strength" name="strength[]" class="form-control"></label>
		   <datalist  name="strength" id="strength">
	    <option value='大於20'>大於20</option>
					<option value='大於40'>大於40</option>
					<option value='大於50'>大於50</option>
					<option value='小於80'>小於80</option>
					<option value='小於90'>小於90</option>
					<option value='20-90'>20-90</option>
					<option value='20-70'>20-70</option>
					<option value='30-80'>30-80</option>
					<option value='35-90'>35-90</option>
					<option value='40-80'>40-80</option>
					<option value='50-90'>50-90</option>
					<option value='30-60'>30-60</option>
					<option value='20-50'>20-50</option>
					<option value='140'>140</option>
					<option value='175'>175</option>
					<option value='210'>210</option>
					<option value='245'>245</option>
					<option value='280'>280</option>
					<option value='315'>315</option>
					<option value='350'>350</option>
					<option value='420'>420</option>
		</datalist>
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
