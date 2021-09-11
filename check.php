<!DOCTYPE html>
<html lang="en">
<head>
<script src="signformchange.js"></script>
	<script src="./jquery-3.2.1.min.js"></script>
  <link rel="stylesheet" href="sign.css"> 	
<?php 
 include_once("head.php");
 include_once ("navbar.php");
?>
    
</head>
<body>
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
		.form-control:focus {
     
			border:1px solid #00E492;
			box-shadow: 0 0 3px #00E492;
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
		.btn_choice{
			background-color: Transparent; 
			border:none;
			outline: none;
		}
		.btn_choice:active {
			border-style: outset;
		}
		th{
			line-height:30px;
			width:100px; 
			color: white;
		}
		.find{
			border-radius: 50px;
		}
		td{
			background-color:#fff;
		}
		tr{
			 
			border-radius: 30px;
		}
				
		thead th:first-child {
		border-radius: 10px 0 0 100px;
		}
		thead th:last-child {
		border-radius: 0 100px 100px 0;
		}
		
		/* remove border from first tbody row... */
		.table > tbody > tr:first-child > td,
		.table > tbody > tr:first-child > th {
		border-top: none;
		}
		.table-bordered{
			border: 0px;
			 
		}
</style>
	<script>
		  $( function() {
					$( ".date" ).datepicker({
					changeMonth:true,
					changeYear:true,
					dateFormat:"yy-mm-dd"	
					});
				} );
		$(document).ready(function(){
			$('.stime').mdtimepicker({ 
				format: 'hh:mm' 
			}).data('mdtimepicker');
		});
		
	</script>	
<script type="text/javascript">
jQuery(document).ready(function() {
   var windowHeight = $(window).height() - 50;
  $('.fullScreenTable').css({ 'height': windowHeight+'px'});
   $(window).resize(function() {
     var windowHeight = $(window).height() - 50;
    $('.fullScreenTable').css({'height': windowHeight+'px'});
   });
  $('.fullScreenTable').fixedHeaderTable({footer:false,cloneHeaderToFooter:true, autoResize:true, fixCol1:true});
});
    //參數footer(頁尾):false(不顯示)/true(顯示)
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
			setTimeout('alertify.alert("您是清除端帳號，已自動幫您轉跳清除端畫面 ")', 500 );
		 
			return false;
		}
	 

		 
	</script>	
	<div class="container" >
	 <?php
	   
	  require 'db_login.php';
      if(isset($_POST["accept"])){
		$arr=$_POST["accept"];
	   // echo $arr;
		for($i=0;$i<count($arr);$i++){ 
			  
			 $ans= substr_replace($arr[$i],'',1);
		 $t= substr($arr[$i], 1);
			  $sql="update `saleform` set accept='$ans' where id='$t'";
			   mysqli_query($db, $sql);
			  
			 
		 }
		   
		
	  
	}
	if(isset($_GET['clearsession'])){
		$_SESSION['date']="";
	}
	if(isset($_POST['trash'])){
		$arr  =  $_POST['trash'];
		//  for($i=0;$i<count($arr);$i++){ echo $arr[$i]."<br>"; }
		$name = $_SESSION['acc'];
		  
		 if( count($arr)>0)
           { 
             for($i=0;$i<count($arr);$i++)
                {
				  $sql = "update `saleform` set status='D',filled_in='$name' where id='$arr[$i]' ";
				    
				    mysqli_query($db, $sql);
				}
				if (mysqli_query($db, $sql)) {
					 
					 //  line_call("刪除訂單",$book_date,$company,$place,$work_case,$strength,$type."/".$quantity,$work_type,$code,$qc." ".$qc_time2,$user,$tel,$delivery.$delivery_time." ".$delivery_time2,$sale,$note);
	 
					?>	
					 
					<div class="col-8 col-xs-7 col-sm-6 col-md-4 col-lg-3 mt-3 mb-3">
						 <div class="alert alert-light alert-dismissible">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<i class=" fas fa-exclamation-circle  fa-lg pr-7" style="color:#E40000;"></i><strong> 訂單已刪除</strong> <br>
						</div> 
					</div>		
					<div class="col-4 col-xs-5 col-sm-6 col-md-8 col-lg-9 mt-3 mb-3"></div>	
						<?php
					}				
				
		   }/**/

	 }
    else if(isset($_POST['pen'])){
		$arr  =  $_POST['pen'];
		
		if( count($arr)>0)
		{  
		  for($i=0;$i<count($arr);$i++)
			 {echo '<script language="javascript">';
				 
				echo "window.location.href='check_jump.php?c1=$arr[$i]'";
				echo '</script>';
				 
			 }
		}

	 }
?> <form method="post" action="check.php" name="form1" class="">
		<div class="row mt-3 mb-3">	
			<div class="col-3 col-xs-6 col-sm-4 col-md-6 col-lg-8"></div>
			<div class="col-9 col-xs-6 col-sm-8 col-md-6 col-lg-4">
				
					<div class="row justify-content-end"align="right " style="margin-top:32px;margin-bottom:16px;">
				 
			 <input type="date" class="form-control find"style=" height:44px; width:170px; margin-left:10px;" name="date"  id="date" placeholder="開始日期	" required>
			 &emsp; 	<button type="submit" class="btn_choice" name="submit" style="border-width:0px;outline : none; " >
				<img src="images/find.png"  width="44"  height="44"  align="right">
									</button>					
								 
					</div>
					
			</div>
			 
		</div>
	</form>
		<?php
			require 'db_login.php';
			 		
			if(@$_POST['date']!=null){
				$ndate = $_POST['date'];
				//$ndate2 = $_POST['date2']; &&@$_POST['date2']!=null
				$ndate2=$_POST['date'];
				$_SESSION['date']=$ndate;
				 
			 
			}
			else if($_SESSION['date']!=""){
				$ndate=$_SESSION['date'];
				$ndate2=$_SESSION['date'];
			}
			else{
				$ndate2=date("Y-m-d");//date("Y-m-d",strtotime("+10 day"));
				$ndate=date("Y-m-d");
				$ndatetmp=$ndate;
				$daycount=7;
			}
			//設定分頁------------------------------------------------------------------------------
			$sql = "SELECT * FROM saleform where status in('N','RN','D') and delivery between '$ndate' and '$ndate2' order by delivery ASC";
			$date=date('Y-m-d');
			$sql_search = "select sum(quantity) as quantity from `saleform` where status in('N','RN') and accept!='N' and type in('CLSM') and  delivery='$ndate' ";
			$result2 = mysqli_query($db, $sql_search);
			$CLSM=0;
			$i=0;
			while ($row = mysqli_fetch_array($result2)) {
		
				$CLSM+=$row['quantity'];
			}
			$sql_search2 = "select sum(quantity) as quantity from `saleform` where status in('N','RN')and accept!='N' and type in('一般料') and  delivery='$ndate' ";
			$result_n = mysqli_query($db, $sql_search2);
			$normal=0;
			$i=0;
			while ($row = mysqli_fetch_array($result_n)) {
		
				$normal+=$row['quantity'];
			}
			echo "選擇日期: ".$ndate."&emsp;&emsp;<font color='red'>  預訂量: CLSM:". $CLSM."方 / "." 一般料:".$normal." 方 </font>";
			$query_sql = mysqli_query($db, $sql);
			/*
			$count_data = mysqli_num_rows($query_sql); //計算總數
			$per_num = 10; //每頁顯示筆數
			$totalpage = ceil($count_data/$per_num); //取得整數
			if (!isset($_GET["page"])){ 	
				$page=1; //設定起始頁
			} else {
				$page = intval($_GET["page"]); //確認頁數
			}
			$stacle_page = ($page-1) * $per_num; //每頁開始序號
		*/
			$result = mysqli_query($db, $sql);//.' LIMIT '.$stacle_page.', '.$per_num
		//	$i=($page-1)*10+1;
			
			//------------------------------------------------------------------------------
			$result2 = mysqli_query($db, "SELECT * FROM saleform order by book_date DESC ");
			$j=1;
			 
		?>
		<div  class=" ">
			<form  id="myform" name="myform" action="check.php" method="post" enctype="multipart/form-data">
			
			
		 
				<table class='table table-bordered text-center max ' style="border-collapse:collapse; ">
				 
     
   
  
				<thead>
					<tr class='' bgcolor='#009761'  style="border-radius:10% 0% 0% 0%; border: none !important;">
					<th class='text-center align-middle' style="border-radius:10% 0% 0% 0%; border: none !important;"> 訂貨時間<br>出貨時間<br>業務</th>
					 
					<th class='text-center align-middle' >客戶<br>工程名稱</th>
					 <th class='text-center align-middle' >訂單單號<br>工地位置</th>
					<th class='text-center align-middle' > 強度<br>數量<br>施工方式</th>
					 
					<th class='text-center align-middle' > 品管<br>品管時間</th>
					<th class='text-center align-middle' > 聯絡人<br>電話</th>
					<th class='text-center align-middle' style='line-height:30px;width:100px;'> 備註</th>
					<th class='text-center align-middle'style="border-radius:0% 10% 0% 0%;line-height:30px;width:120px;border: none !important;" > 修改<br>刪除</th>
					
		 
					</tr> </thead>
			<?php
				while ($row = mysqli_fetch_array($result)) {
					$color="blue";
					?>
						<tbody id="searchTable">
						<tr>
				<?php if($row['status']=='D'){
							$color="red"; 
						}
						else{
							$color="black";
							 
						}?>
						<td class="text-center align-middle" bgcolor="#fff" style="color:<?=$color;?>;"> 
						<font style="line-height:2.5;"><?=$row["book_date"];?> </font><br>
						<font style="line-height:0.5;"><?=$row["delivery"];?></font><br>
						<font style="line-height:0.5;"><?=$row["delivery_time"]." ".$row["delivery_time2"].$row["code"];?></font><br>
						<font style="line-height:2.5;"><?=$row["sale"];?></font><br>
					 
						</td>
					 
				
					<td class="text-center align-middle" style=" color:<?=$color;?>;"> <br>
					<font style="line-height:2.5;"><?=$row["company"];?></font><br>
						<font style="line-height:0.5;"><?=$row["work_case"];?></font><br>
				 
						<br><font color="white" style="opacity: 0;line-height:2.5;">
						0000000000</font>
					</td>
					 
					<td class="text-center align-middle" style="color:<?=$color;?>;"> <br>
					<font style="line-height:2.5;"><?=$row["book_num"];?> </font><br> 
					<font style="line-height:0.5;"><?=$row["place"];?> </font>  
					 
					<br><font color="white" style="opacity: 0;line-height:2.5;">
					00000000000</font>
					</td>
					<?php
					echo '
					<td class="text-center align-middle" style="line-height:30px;color:'. $color.';"> <br>
						
						'.$row["strength"].'<br>
						'.$row["type"]." : ".$row["quantity"].' 方<br>
						'.$row["work_type"] .'
						<br><font color="white" style="opacity: 0;">0000000000</font>
					</td>
					 
				 
					<td class="text-center align-middle" style="line-height:30px;color:'. $color.';"> <br>
					'.$row["qc"].'<br>
						'.$row["qc_time2"].'<br><font color="white" style="opacity: 0;">0000000000</font>
					</td>

					<td class="text-center align-middle" style="line-height:30px;color:'. $color.';"> 
					'.$row["user"].'<br>
					'.$row["tel"].' 
			    	</td>

					<td class="text-center align-middle" style="line-height:30px;color:'. $color.';"> 
					'.$row["note"].'
					<br><font color="white" style="opacity: 0;">
						'.$row["tel"].'</font>
					</td>';
						?>
						<td class="align-left  align-middle" style="line-height:30px;color:<?=$color;?>;">  
							 
							 
 
							
							 <button type="submit" class="btn_choice "  name="pen[]"id='pen'  style="border-width:0px;outline : none;" value="<?=$row["id"]?>">
							 <img  src="images/pen.png"   width="46"  height="46" onmouseover="this.src='images/pen1.png';"
							onmouseout="this.src='images/pen.png';"
							onmousedown="this.src='images/pen2.png';">
							 </button><br><br>
							 <!---->
                           <button type="submit" class="btn_choice" name="trash[]"id='trash' style="border-width:0px;outline : none;" value="<?=$row["id"]?>">
							 <img src="images/trash.png"  width="46"  height="46" onmouseover="this.src='images/trash1.png';"
							onmouseout="this.src='images/trash.png';"onmousedown="this.src='images/trash2.png';" >
							 </button>
							<?php
							 if($color=="red"){echo'<br>已刪除';} 
							 ?>
							 
                        </td>
					 
						<tr>
					<?php	
					$i++;
				}
				?>
				</font>
				</tbody>
				</table>
			</div>
				</form>
				 
				 
			<?php
				//下方分頁程式------------------------------------------------------------------------------------------
			/*	$spage=$page-1;
				$epage=$page+1;
				
				echo '
					<div>
						<ul class="pagination justify-content-center mt-5">
							<li class="page-item"><a class="page-link" href="?page=1"><<</a></li>
				';
							
							if($spage<=1){
								echo '<li class="page-item disabled"><a class="page-link" href="?page='.$spage.'"><</a></li>';
							}else{    		
								echo '<li class="page-item"><a class="page-link" href="?page='.$spage.'"><</a></li>';
							}
							
							for( $page_loop=1 ; $page_loop<=$totalpage ; $page_loop++ ) {
								if ( $page-3 < $page_loop && $page_loop < $page+3 ) {
									if($page_loop==$page){
										echo '<li class="page-item active"><a class="page-link" href="?page='.$page_loop.'">'.$page_loop.'</a></li>';
									}else{
										echo '<li class="page-item"><a class="page-link" href="?page='.$page_loop.'">'.$page_loop.'</a></li>';
									}
								}
							}
							
							if($epage>=$totalpage){
								echo '<li class="page-item disabled"><a class="page-link" href="?page='.$epage.'">></a></li>';
							}else{    		
								echo '<li class="page-item"><a class="page-link" href="?page='.$epage.'">></a></li>';
							}
				echo '
							<li class="page-item"><a class="page-link" href="?page='.$totalpage.'">>></a></li>
						</ul>
					</div>
				';
				*/
				//-------------------------------------------------------------------------------------------------------------			
			mysqli_close($db);	
		?>
	</div>
</body>
</html>