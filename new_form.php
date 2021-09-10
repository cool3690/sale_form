<!DOCTYPE html>
<html lang="en">
  <head>
  <?php 
	  include_once ("head.php"); 
	  
	?>	 
    
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
<script src="signformchange.js"></script>
	 
  <link rel="stylesheet" href="sign.css"> 
   
  </head>
  <?php 
	  
	  include_once ("navbar2.php"); 
	?>	
  <title>訂貨表</title>
  
<script type="text/javascript">
	 	
		 $( function() {
					$( ".date" ).datepicker({
					changeMonth:true,
					changeYear:true,
					dateFormat:"yy/mm/dd"	
					});
				} );
  
 
	department=new Array();
	department[0]=["大於20", "大於50", "小於90", "20-90", "20-70","30-80","35-90","40-80","50-90","30-60","20-50"];	// 資訊系
	department[1]=["140", "175", "210", "245", "280", "315", "350", "420"];	// 電機系
	
	function renew(index){
		for(var i=0;i<department[index].length;i++)
			document.myform.strength.options[i]=new Option(department[index][i], department[index][i]);	// 設定新選項
		document.myform.strength.length=department[index].length;	// 刪除多餘的選項
	}
	
	function show_case(a)
	{    
		var result=document.getElementById('company').value;
		 
		  var words="";
		if (window.XMLHttpRequest)
			{// IE7+, Firefox, Chrome, Opera, Safari  
				xmlhttp=new XMLHttpRequest();
			}
		 
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{    words =xmlhttp.responseText.split("\n");
				var datalist = document.getElementById('case-list');
				  
				 while (datalist.firstChild) {
					 datalist.removeChild(datalist.firstChild);
				 }
				 for(var i=0;i<words.length-1;i++)
					  {	 
						  var option1 = document.createElement("option");
						  option1.value = words[i];
						  
						  datalist.appendChild(option1);
					  } 
			}
		} 
		xmlhttp.open("GET","sql_company.php?q="+result,true);
		xmlhttp.send();
	}
	function show_book_num(a){
		var company=document.getElementById('company').value;//work_case
		var work_case=document.getElementById('work_case').value;
		 
		if (window.XMLHttpRequest)
			{// IE7+, Firefox, Chrome, Opera, Safari  
				xmlhttp=new XMLHttpRequest();
			}
			xmlhttp.onreadystatechange=function(){
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{  var words =xmlhttp.responseText;
						 
					 document.forms['myform']['book_num'].value=words;
					}
			}
		xmlhttp.open("GET","sql_book_num.php?company="+company+"&work_case="+work_case,true);
		xmlhttp.send();
	} 
	</script>	
	<script src="lib/alertify.min.js"></script>
	<script>
		function reset () {
			$("#toggleCSS").attr("href", "themes/alertify.default.css");
			alertify.set({
				labels : {
					ok     : "OK",
					cancel : "Cancel"
				},
				delay : 2000,
				buttonReverse : false,
				buttonFocus   : "ok",
				 
			});
		}
		function t() {
			reset();
			//alertify.alert("您是清除端帳號，將自動幫您導到清除端畫面");
			//setTimeout('alertify.alert("您是清除端帳號，已自動幫您轉跳清除端畫面 ")', 500 );
		 
			return false;
		}
	 

		 
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
		//box-shadow:  0px 4px 4px rgba(0, 228, 146, 0.2);
	 	 //background: rgb(172,240,203);
		 background: linear-gradient(90deg, rgba(172,240,203,0) 15%, rgba(255,255,255,1) 15%, rgba(255,255,255,1) 55%, rgba(255,255,255,1) 85%, rgba(0,228,146,0.2) 90%, rgba(172,240,203,0) 93%);
 	} 
}
 
  .form-control{
	 border-color:#00E492;
	 border-width:1px;
 }
 .btn{
	 background-color: #fff; 
	 
	 margin-bottom:20px;
	 border-color:#00E492;
 }
 .btn:hover{
	 background-color: #00E492; 
	 color:black;
	 margin-bottom:20px;
	 border-color:#00E492;
 }
 .btn:focus{
	border: none;
	background-color: #009761;
	outline:0;
	box-shadow: 0 0 3px #009761;
 }
 .form-control:focus {
     
    border:1px solid #00E492;
    box-shadow: 0 0 3px #00E492;
  }
 .mask{
    position:fixed;
    top     : 0;
    left    : 0;
    bottom  : 0;
    right   : 0;
    background:rgba(0,0,0,.5); 
	z-index: 10;
    /*background:hsla(0,100%,80%,0.5)*/
    /*background:#000; opacity:0.5; */
}
.boxbtn{
	border: 2px solid #00E492;
	box-sizing: border-box;
	border-radius: 5px;
}
.boxbtn:hover{
	background-color: #00E492; 
	 
}
.boxbtn:focus{
	border: none;
	background-color: #009761;
	outline:0;
	 
}
</style>
<body style="background: rgba(172, 240, 203, 0.2);"> 
 
	 
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
		  $work_select="";//$_POST['work_select'];
		  $book_num=$_POST['book_num'];
		 $code="";
		 $qc=$_POST['qc'];
		 $qc_time="";//$_POST['qc_time'];
		 $qc_time2=$_POST['qc_time2'];
		 $user=$_POST['user'];
		 $tel=$_POST['tel'];
		 $delivery=$_POST['date'];
		 $sale=$_POST['sale'];
		 $note=$_POST['note'];
		 $weekarray=array("日","一","二","三","四","五","六");
         $code="(".$weekarray[date("w",strtotime($delivery))].")" ;
 
		 require 'db_login.php';
		 $company=str_replace("有限公司","",$company); 
		 $company=str_replace("水泥製品股份有限公司","",$company);
		 $company=str_replace("股份","",$company);
		 $company=str_replace("公司","",$company);
		 $company=str_replace("工程行","",$company);  
		 $company=str_replace("土木包工業","",$company);
		 $company=str_replace("工程有限公司","",$company); 
		 $company=str_replace("企業行","",$company);
		 $sql = "INSERT INTO `saleform`(`book_date`, `book_num`,`company`, `place`, `work_case`, `strength`, `type`,`quantity`, `work_type`, `code`, `qc`, `qc_time`, `qc_time2`, `user`, `tel`, `delivery`, `delivery_time`, `delivery_time2`, `sale`, `note`, `status`, `filled_in`) VALUES 
			('$book_date','$book_num', '$company', '$place', '$work_case', '$strength', '$type', '$quantity', '$work_type', '$code','$qc','$qc_time','$qc_time2', '$user', '$tel', '$delivery', '$delivery_time', '$delivery_time2', '$sale', '$note','N','$name')";
			 
		 if (mysqli_query($db, $sql)) {	
		   
		 	//  line_call("新增訂單",$book_date,$company,$place,$work_case,$strength,$type."/".$quantity,$work_type,$code,$qc." ".$qc_time2,$user,$tel,$delivery.$delivery_time." ".$delivery_time2,$sale,$note);
	 /*
		 echo '<div class="alert alert-info alert-dismissible">
					 <button type="button" class="close" data-dismiss="alert">&times;</button>
					 <i class="far fa-check-circle fa-lg pr-3" style="color:red;"></i><strong>新增成功</strong><br>
				   </div>';
		*/
	?>
		<div class="mask" id="mask">
			<div class="signform " id="signform"   style=" border-radius: 30px;">
				 
				 <br>
				 <img src="images/check.png"/><br><br>
				 <b style="font-size: 22pt;">成功新增訂單</b>
				 
				 <div class="signcloses " style="top:3px;"><br> 
				 <button type="submit" class=" boxbtn" id="send" name="send" onclick="signclose()"   >&nbsp;繼續新增&nbsp;</button>
				 <button type="submit" class=" boxbtn" id="send" name="send" onclick="window.location.href='check.php'" style="  margin-left: 20px;">&nbsp;訂單紀錄&nbsp;</button>
				  </div>
				 
			 </div> 
		  </div> 
<?php
	  }				
		
		

	 }
 	 
?>				
		 
	<br> 
	<form  id="myform" name="myform" action="new_form.php" method="post" enctype="multipart/form-data">
  
  <!-- ?status_title=2-->
   <div class="container" > 
  
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
  
<!--clsm-->
<div class="col-sm-1   col-md-1 col-lg-1" ></div>
<div class="col-sm-1   col-md-1 col-lg-1" style="background-color:#fff;border-radius:10px;" ></div>
<div class="col-12 col-xs-12 col-sm-4  col-md-4 col-lg-4" style="margin-top:48px;" >
		 <div style="text-align:left;"><font color='red'>今日訂貨量: CLSM: <?=$CLSM." / 一般料: ".$normal;?>方</font></div>
		  
	 </div>
	 <div class="col-12 col-xs-12 col-sm-4  col-md-4 col-lg-4" style="margin-top:48px;"  >
	  
		 <div style="text-align:right;">填表人工號: <?=$name;?></div>
	 </div>
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;border-radius:10px;" > </div>
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 

	 
	 
 
	 

	 <!--line 1-->
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div> 
	 
		 <div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4 mt-2 mb-2" >
		   <label>訂貨日期：</label> 
		   <input class="form-control" name="book_date" id="book_date" value="<?=date('Y/m/d');?>" disabled="disabled">
				 
	 </div>	
	 <div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4 mt-2 mb-2"  >
		   <label>客戶：</label> 
		   <input list="company-list" id="company"  name="company" class="form-control" onchange="show_case(this.id)"> 
		   <datalist  id="company-list"  name="company" >
    	   <?php
					$sql_search2 = "select company from `customer`";
						$result_n = mysqli_query($db, $sql_search2);
						
						while ($row = mysqli_fetch_array($result_n)) {
				?>
						<option value="<?=$row['company'];?>">
				<?php
						}
				?>
 
			</datalist>

	 </div>
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div>
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
	  
	  <!--line 3-->
	  <?php
	  		$sql="select8 from erp_form where status in('N','RN') and company=";
	  ?>
	  <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div> 
	 <div class="col-12 col-xs-12 col-sm-8 col-md-8 col-lg-8 mt-2 mb-2">
	   <label>工程名稱：</label>
	   <input list="case-list" id="work_case" name="work_case"class="form-control" onchange="show_book_num(this.id)" > 
		   <datalist  id="case-list"  name="work_case" >
		    
			</datalist>
	 <!--  <input type="text" class="form-control" name="work_case" id="work_case" value="">-->
	  
	 </div>
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div>
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div>

	 <!--line 2-->
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div> 
	 <div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2">
		<label>訂單單號：</label>
		<input type="text" class="form-control" name="book_num" id="book_num" value="">
	 </div>
	 <div class="col-12 col-xs-12 col-sm-6 col-md-6 col-lg-6 mt-2 mb-2">
		<label>工地位置：</label>
		<input type="text" class="form-control" name="place" id="place" value="">
	 </div>
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div>
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
	
 
		 
	 <!--line 3-->
	  
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div>
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div>
	 <div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2">
		   <label>料別：</label> 
		   <select class="form-control" name="type" id="type" onChange="renew(this.selectedIndex);" >
				   <option value='CLSM'>CLSM</option>
				 <option value='一般料'>一般料</option>
			  
			 </select>	
				 
	 	</div>
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
				 
				</select>	  
				 
	 </div>	
  
		 	
	 <div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2" >
		   <label>數量：</label> 
		   <input class="form-control" name="quantity" id="quantity" value="">            
	 </div>
	 
	 <div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2">
	   <label>施工方式：</label>
	   <select class="form-control" name="work_type" id="work_type"  >
		 			<option value='壓送車'>壓送車</option>
					<option value='直漏'>直漏</option>
					<option value='貓車'>貓車</option>
					<option value='怪手'>怪手</option>
				</select>	
	 </div>
	 

	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div>
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div>

	 <!--line 4-->
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div>
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div>
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
					<?php
					  if($name=="A00041"){echo' <option value="王振宇"selected>王振宇</option>';}
					  else if($name=="A00012"){echo' <option value="王南欽"selected>王南欽</option>';}
					  else if($name=="A00018"){echo' <option value="林泰宏"selected>林泰宏</option>';}
					  else if($name=="A00027"){echo' <option value="林商發"selected>林商發</option>';}
					?>
				   <option value='王南欽'>王南欽</option>
				 <option value='王振宇'>王振宇</option>
				 <option value='林商發'>林商發</option>
				 <option value='林泰宏'>林泰宏</option>
			 </select>	
					
	 </div>
	  <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div>
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div>
	
	 <!--line 5-->
 
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div>		
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div> 
	 <div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2" >
		   <label>品管：</label> 
			
		   <select class="form-control" name="qc" id="qc"  >
				  <option value='無'>無</option>
				   <option value='有'>有</option>
				  
			 </select>				  
	 </div>
	 
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
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div>
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div>
	
	 
<!--line 8-->
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div>
	<div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div>

		 <div class="col-12 col-xs-12 col-sm-8 col-md-8 col-lg-8 mt-2 mb-2">
		   <label>備註：</label> 
		   <textarea class="form-control" name="note" id="note" value="">
		   </textarea>    
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
	
   		
	  
  <!---->
</form>
</div>
  
</body>
</html>
