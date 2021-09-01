<!DOCTYPE html>
<html lang="en">
  <head><?php include_once ("head.php"); ?>	
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.9.2/i18n/jquery.ui.datepicker-zh-TW.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
 
  </head>
  <title>訂貨表</title>
 
 

   
		<script>
	 	
		 $( function() {
					$( ".date" ).datepicker({
					changeMonth:true,
					changeYear:true,
					dateFormat:"yy/mm/dd"	
					});
				} );
	 
	</script>	
	 
   
</head>
<style>
@media (min-width: 0px) and (max-width: 1024px) { 
	.form-group{
		background: rgb(255,255,255);
	} 
}
@media (min-width: 1025px) and (max-width: 4000px) { 
	.form-group{
		background: rgb(172,240,203);
		background: linear-gradient(90deg, rgba(172,240,203,0) 15%, rgba(255,255,255,1) 15%, rgba(255,255,255,1) 55%, rgba(255,255,255,1) 85%, rgba(0,228,146,0.1) 85%, rgba(172,240,203,0) 87%);
 	} 
}
  
  .form-control{
	 border-color:#00E492;
	 border-width:1px;
 }
 .btn{
	 background-color: #fff; 
	 color:black;
	 margin-bottom:20px;
	 border-color:#00E492;
 }
 .btn:hover{
	 background-color: #00E492; 
	 color:black;
	 margin-bottom:20px;
	 border-color:#00E492;
 }
</style>
<body style="background: rgba(172, 240, 203, 0.2);"> 
	 
	<?php	//include_once ("navbar2.php"); 
	
	?>
<div class="container">
	


	<?php
	 require 'line.php';
 		$name = $_SESSION['acc'];
	
		if(isset($_POST['submit'])){
			$book_date=date('Y/m/d');
			$company = $_POST['company'];
			$place=$_POST['place'];
			$work_case=$_POST['work_case'];
			$strength=$_POST['strength'];
			$quantity=$_POST['quantity'];
			$work_type=$_POST['work_type'];
			$delivery_time=$_POST['delivery_time'];
			$delivery_time2=$_POST['delivery_time2'];
			 $type=$_POST['type'];
			$code="";
			$qc=$_POST['qc'];
			$qc_time="";//$_POST['qc_time'];
			$qc_time2=$_POST['qc_time2'];
			$user=$_POST['user'];
			$tel=$_POST['tel'];
			$delivery=$_POST['date'];
			$sale=$_POST['sale'];
			$note=$_POST['note'];
			
			require 'db_login.php';	
			$sql = "INSERT INTO `saleform`(`book_date`, `company`, `place`, `work_case`, `strength`, `type`,`quantity`, `work_type`, `code`, `qc`, `qc_time`, `qc_time2`, `user`, `tel`, `delivery`, `delivery_time`, `delivery_time2`, `sale`, `note`, `status`, `filled_in`) VALUES 
			('$book_date', '$company', '$place', '$work_case', '$strength', '$type', '$quantity', '$work_type', '$code','$qc','$qc_time','$qc_time2', '$user', '$tel', '$delivery', '$delivery_time', '$delivery_time2', '$sale', '$note','N','$name')";
			if (mysqli_query($db, $sql)) {	
			 
  			  line_call("新增訂單",$book_date,$company,$place,$work_case,$strength,$type."/".$quantity,$work_type,$code,$qc." ".$qc_time2,$user,$tel,$delivery.$delivery_time." ".$delivery_time2,$sale,$note);
		
			echo '<div class="alert alert-info alert-dismissible">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<i class="far fa-check-circle fa-lg pr-3" style="color:red;"></i><strong>新增成功</strong><br>
					  </div>';
		}				
			  

		}
 	 
?>				
		 
	<br> 
  <form  id="myform" name="myform" action="new.php" method="post" enctype="multipart/form-data">
  
	 <!-- ?status_title=2-->
	  <div class="container" > 
 
	   

  
	  <div class="row mt-3 mb-3">	
			<div class=" col-xs-2 col-sm-2 col-md-3 col-lg-4"></div>
			<div class="col-12 col-xs-10 col-sm-8 col-md-8 col-lg-6">
			<a href="new.php" class="btn btn-primary btn-lg">新增</a>
                 <a href="test.php" class="btn btn-primary btn-lg">修改</a>
                  <a href="delete.php" class="btn btn-primary btn-lg">取消</a>
               <a href="show.php"  class="btn btn-primary btn-lg">查詢</a>
               <br> 
			</div>
			 
		</div>
		<center><h3>全興訂貨表</h3></center>
   <!---->   
<div class="form-group row"   >	
<?php 
$date=date('Y-m-d');
require 'db_login.php';	// where delivery='$date' and status in('N','RN')
	
	 
 /*$sql="select quantity from selform";
 $result = mysqli_query($db,$sql);

	*/
	 $date=date('Y-m-d');
	$sql_search = "select sum(quantity) as quantity from `saleform` where status in('N','RN') and accept!='N' and type in('CLSM') and  delivery='$date' ";
	$result2 = mysqli_query($db, $sql_search);
	$CLSM=0;
	$i=0;
	while ($row = mysqli_fetch_array($result2)) {

		$CLSM+=$row['quantity'];
	}
	$sql_search2 = "select sum(quantity) as quantity from `saleform` where status in('N','RN')and accept!='N' and type in('一般料') and  delivery='$date' ";
	$result_n = mysqli_query($db, $sql_search2);
	$normal=0;
	$i=0;
	while ($row = mysqli_fetch_array($result_n)) {

		$normal+=$row['quantity'];
	}
 
	////
 
	if($CLSM>1000){
		echo '<script language="JavaScript"> alert("CLSM今日方數已達標");</script>';
	}
	if($normal>1000){
		echo '<script language="JavaScript"> alert("一般料今日方數已達標");</script>';
	}
?>
<div class="col-sm-2   col-md-2 col-lg-2"></div>
<div class="col-12 col-xs-12 col-sm-4  col-md-4 col-lg-4" >
			<div style="text-align:left;"><font color='red'>今日訂貨量: CLSM: <?=$CLSM." / 一般料: ".$normal;?>方</font></div>
			 
		</div>
		<div class="col-12 col-xs-12 col-sm-4  col-md-4 col-lg-4" >
		 
			<div style="text-align:right;">填表人工號: <?=$name;?></div>
		</div>
		<div class="col-sm-2   col-md-2 col-lg-2"></div>

		
	    
	

        <!--line 1-->
		<div class="col-12 col-xs-12 col-sm-2 "  > </div> 
			<div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4 mt-2 mb-2" >
			  <label>訂貨日期：</label> 
			  <input class="form-control" name="book_date" id="book_date" value="<?=date('Y/m/d');?>" disabled="disabled">
                    
		</div>	
		<div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4 mt-2 mb-2"  >
			  <label>廠商：</label> 
			  <input class="form-control" name="company" id="company" value="">            
		</div>
        <div class="col-12 col-xs-12 col-sm-2 "> </div>

        <!--line 2-->
		<div class="col-12 col-xs-12 col-sm-2 "></div>
		<div class="col-12 col-xs-12 col-sm-8 col-md-8 col-lg-8 mt-2 mb-2">
		  <label>工地位置：</label>
		  <input type="text" class="form-control" name="place" id="place" value="">
		</div>
        <div class="col-12 col-xs-12 col-sm-2 "></div>
		<!--line 2-->
		<div class="col-12 col-xs-12 col-sm-2 "></div>
			<div class="col-12 col-xs-12 col-sm-8 col-md-8 col-lg-8 mt-2 mb-2">
		  <label>工程名稱：</label>
		  <input type="text" class="form-control" name="work_case" id="work_case" value="">
		</div>
        <div class="col-12 col-xs-12 col-sm-2 "></div>
        <!--line 3-->
        <div class="col-12 col-xs-12 col-sm-2 "  > </div> 
			<div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2">
			  <label>強度：</label> 
			   <select class="form-control" name="strength" id="strength"  >
			  		<option value='大於20'>大於20</option>
					<option value='大於50'>大於50</option>
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
					 
				</select>	      
		</div>	
	 
			<div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2">
			  <label>料別：</label> 
			  <select class="form-control" name="type" id="type"  >
			  		<option value='CLSM'>CLSM</option>
					<option value='一般料'>一般料</option>
				 
				</select>	
                    
		</div>	
		<div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2" >
			  <label>數量：</label> 
			  <input class="form-control" name="quantity" id="quantity" value="">            
		</div>
		<!--
		<div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2">
			  <label>配比代號：</label> 
			  <input class="form-control" name="code" id="code" value="" >
                    
		</div>	
		-->
		<div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2">
		  <label>施工方式：</label>
		   
		  <select class="form-control" name="work_type" id="work_type"  >
		 			<option value='壓送車'>壓送車</option>
					<option value='直漏'>直漏</option>
					<option value='貓車'>貓車</option>
					<option value='怪手'>怪手</option>
				</select>	
		</div>
		

        <div class="col-12 col-xs-12 col-sm-2 "> </div>

        <!--line 4-->
        <div class="col-12 col-xs-12 col-sm-2 "></div>
		    

		<div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2">
			  <label>出貨日期：</label> 
			  <!--<input class="form-control content date" name="delivery" id="datepicker" value="" >-->
			  <input type="text" class="form-control content date" name="date" id="datepicker"  require>    
			  			  
		</div>
		<div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2">
			  <label>出貨時段：</label> 
			  <select class="form-control" name="delivery_time" id="delivery_time"  >
			  		<option value='早上'>早上</option>
					<option value='下午'>下午</option>
				 
				</select>			  
		</div>	
		<div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2">
			  <label>出貨時間：</label> 
			  <!--<input class="form-control content date" name="delivery" id="datepicker" value="" >-->
			  <input type="text" class="form-control" name="delivery_time2" id="delivery_time2" value=" ">			  
		</div>
		<div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2" >
			  <label>業務：</label> 
			  <select class="form-control" name="sale" id="sale"  >
			  		<option value='王南欽'>王南欽</option>
					<option value='王振宇'>王振宇</option>
					<option value='林商發'>林商發</option>
					<option value='林泰宏'>林泰宏</option>
				</select>	
			           
		</div>
        <div class="col-12 col-xs-12 col-sm-2 "></div>

		
        <!--line 5-->
        <div class="col-12 col-xs-12 col-sm-2 "  > </div> 
				
		<div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2" >
			  <label>品管：</label> 
			   
			  <select class="form-control" name="qc" id="qc"  >
			 		<option value='無'>無</option>
			  		<option value='有'>有</option>
					 
				</select>				  
		</div>
		<!--
		<div class="col-12 col-xs-12 col-sm-3 col-md-3 col-lg-3 mt-2 mb-2">
			  <label>品管時段:</label> 
			  <select class="form-control" name="qc_time" id="qc_time"  >
			  		<option value='早上'>早上</option>
					<option value='下午'>下午</option>
				 
				</select>			  
		</div>
		-->
		<div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2">
			  <label>品管時間:</label> 
			  <input class="form-control" name="qc_time2" id="qc_time2" value="" >
                    
		</div>
		<div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2">
			  <label>聯絡人：</label> 
			  <input class="form-control" name="user" id="user" value="" >
                    
		</div>	
		<div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2" >
			  <label>電話：</label> 
			  <input class="form-control" name="tel" id="tel" value="">            
		</div>
        <div class="col-12 col-xs-12 col-sm-2 "> </div>

        <!--line 6
        <div class="col-12 col-xs-12 col-sm-2 "  > </div> 
			<div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4 mt-2 mb-2">
			  <label>聯絡人：</label> 
			  <input class="form-control" name="user" id="user" value="" >
                    
		</div>	
		<div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4 mt-2 mb-2" >
			  <label>電話：</label> 
			  <input class="form-control" name="tel" id="tel" value="">            
		</div>
        <div class="col-12 col-xs-12 col-sm-2 "> </div>
-->
         <!--line 7
         <div class="col-12 col-xs-12 col-sm-2 "  > </div> 
			<div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4 mt-2 mb-2">
			  <label>出貨時間：</label> 
			 
			  <input type="text" class="form-control content date" name="date" id="datepicker"  require>      
		</div>	
		<div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4 mt-2 mb-2" >
			  <label>業務：</label> 
			  <select class="form-control" name="sale" id="sale"  >
			  		<option value='王南欽'>王南欽</option>
					<option value='王振宇'>王振宇</option>
					<option value='林商發'>林商發</option>
				</select>	
			           
		</div>
        <div class="col-12 col-xs-12 col-sm-2 "> </div>
		-->
<!--line 8-->
<div class="col-12 col-xs-12 col-sm-2 "  > </div> 
			<div class="col-12 col-xs-12 col-sm-8 col-md-8 col-lg-8 mt-2 mb-2">
			  <label>備註：</label> 
			  <textarea class="form-control" name="note" id="note" value="">
			  </textarea>    
		</div>	
		
        <div class="col-12 col-xs-12 col-sm-2 "> </div>

		<!--here-->
<div class="col-sm-4 col-md-4 col-lg-4"   style="background-color:#666;"></div> 
	 
	<div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center mt-5">
      <button type="submit" name="submit" class="btn "   >新增訂單</button>
    </div>		
		<div class="col-sm-2   col-md-2 col-lg-2"  ></div> 
	 <!---->
  </form>
  </div>
  
</body>
</html>
