<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once("head.php");?>
 
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
<style>
		body {
			 
			background-size:cover;
			text-align: justify;
			text-justify: inter-word;
			background: rgba(172, 240, 203, 0.2);
		}
		 
 .form-group{
	background: rgb(172,240,203);
	background: linear-gradient(90deg, rgba(172,240,203,0) 15%, rgba(255,255,255,1) 15%, rgba(255,255,255,1) 55%, rgba(255,255,255,1) 85%, rgba(0,228,146,0.1) 85%, rgba(172,240,203,0) 87%);
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
<body>
<?php
   
   require 'db_login.php';
   require 'line.php';
  // echo  $_GET['id'];;
  if(isset($_POST['book_date']) ){
    $cid = $_GET['id'];
    $book_date=$_POST['book_date'];
    $company=$_POST['company'];
    $place=$_POST['place'];
    $strength=$_POST['strength'];
    $quantity=$_POST['quantity'];
    $work_type=$_POST['work_type'];
     $type=$_POST['type'];
   $code="";
    $qc=$_POST['qc'];
	$work_case=$_POST['work_case'];
	$qc_time="";//$_POST['qc_time'];
	$qc_time2=$_POST['qc_time2'];
    $user=$_POST['user'];
    $tel=$_POST['tel'] ;
    $delivery=$_POST['delivery'] ;
	$delivery_time=$_POST['delivery_time'];
	$delivery_time2=$_POST['delivery_time2'];
    $sale=$_POST['sale'] ;
    $note=$_POST['note'] ;
    $name = $_SESSION['acc'];
     $sql = "update `saleform` set status='R' where id='$cid ' ";
     mysqli_query($db, $sql);
    $sqlRN="INSERT INTO `saleform`(`book_date`, `company`, `place`, `work_case`, `strength`, `type`, `quantity`, `work_type`, `code`, `qc`, `qc_time`, `qc_time2`, `user`, `tel`, `delivery`, `delivery_time`, `delivery_time2`, `sale`, `note`, `status`, `filled_in`) VALUES 
    ('$book_date', '$company', '$place', '$work_case', '$strength', '$type', '$quantity', '$work_type', '$code','$qc','$qc_time','$qc_time2', '$user', '$tel', '$delivery', '$delivery_time', '$delivery_time2', '$sale', '$note','RN','$name')";
  
 
  line_call("修改訂單",$book_date,$company,$place,$work_case,$strength,$type."/".$quantity,$work_type,$code,$qc." ".$qc_time2,$user,$tel,$delivery.$delivery_time." ".$delivery_time2,$sale,$note);
						
 if (mysqli_query($db, $sqlRN)) {	
       ?>
       <div class="container" style="padding-bottom:100px;">
	   <br><center><h3>訂單修改</h3></center><br>
        <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <i class="far fa-check-circle fa-lg pr-3" style="color:red;"></i><strong>修改成功</strong><br>
            </div>
            <table class='table table-bordered text-center max'>
					<tr class='table-info'>
                        
					<th class='text-center align-middle' style='line-height:30px;width:100px;'> 訂貨時間</th>
						<th class='text-center align-middle' style='line-height:30px;width:100px;'> 出貨時間<br>業務</th>
						<th class='text-center align-middle' style='line-height:30px;width:100px;'> 廠商<br>工地位置</th>
						<th class='text-center align-middle' style='line-height:30px;width:100px;'> 強度<br>數量<br>施工方式</th>
						<th class='text-center align-middle' style='line-height:30px;width:100px;'> 品管<br>品管時間</th>
                        <th class='text-center align-middle' style='line-height:30px;width:100px;'> 聯絡人<br>電話</th>
						<th class='text-center align-middle' style='line-height:30px;width:60px;'> 備註</th>
						 
					</tr>
                    <tbody id="searchTable" name="searchTable">
						<tr>
                            
                   <?php
						echo '
						<td class="text-center align-middle" style="line-height:30px;"> 
						'.$book_date.'<br>'.'
					</td>
							<td class="text-center align-middle" style="line-height:30px;"> 
								
								'. $delivery.'<br>'.$delivery_time." ".$delivery_time2.'<br>'.$sale.'
								<br><font color="white" style="opacity: 0;">
						0000000000</font>
							</td>
							<td class="text-center align-middle" style="line-height:30px;"> 
								'. $company.'<br>'.$place.'<br><font color="white" style="opacity: 0;">
								0000000000</font>
							</td>
							<td class="text-center align-middle" style="line-height:30px;"> 
								
								'.$strength.'<br>
								'.$type." : ".$quantity.'方<br>
								'.$work_type.'<br><font color="white" style="opacity: 0;">
								000000000</font>
									
						 
							</td>
							<td class="text-center align-middle" style="line-height:30px;"> 
							'.$qc.'<br>
							'.$qc_time2.'<br><font color="white" style="opacity: 0;">
							000000000</font>
							</td>
                            
							<td class="text-center align-middle" style="line-height:30px;"> 
								'.$user.'<br>
								'.$tel.'<br>
                '.$qc.'
							</td>
							 
							<td class="text-center align-middle" style="line-height:30px;"> 
                            '.$note.'
							</td>
						<tr>
						';
					 
				 ?>
			 </tbody>
				</table> 
        <?php
      }	 

}  


?>
<center><h3><a href="test.php">返回</a></h3></center>
</div>
</body>
</html>