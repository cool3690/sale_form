<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once("head.php");
 include_once ("navbar2.php");
?>
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
<link href="table_fix/css/960.css" rel="stylesheet" media="screen" />
        <link href="table_fix/css/defaultTheme.css" rel="stylesheet" media="screen" />
        <link href="table_fix/css/myTheme.css" rel="stylesheet" media="screen" />
      
        <script src="table_fix/jquery.fixedheadertable.js"></script>
        <script src="table_fix/demo.js"></script>
<script>
function myFunction() {
  var x = document.getElementById("accept").value;
  alert(x.selectedIndex);
  document.getElementById("accept").style.display = "none";
  var tmp="demo";
  document.getElementById(tmp).innerHTML = "111" + x;
}
</script>

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
				   //echo $arr[$i]."<br>";
				   mysqli_query($db, $sql);
				}
				if (mysqli_query($db, $sql)) {	
					echo '<div class="alert alert-info alert-dismissible">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<i class="far fa-check-circle fa-lg pr-3" style="color:red;"></i><strong>刪除成功</strong><br>
						</div>';
					}				
				
		   }/**/

	 }
    else if(isset($_POST['pen'])){
		$arr  =  $_POST['pen'];
	 
		$name = $_SESSION['acc'];
		  
		 if( count($arr)>0)
           { 
             for($i=0;$i<count($arr);$i++)
                {
				  $sql = "update `saleform` set status='D',filled_in='$name' where id='$arr[$i]' ";
				    echo $arr[$i]."<br>";
				 //  mysqli_query($db, $sql);
				}
				//if (mysqli_query($db, $sql)) {	
					echo '<div class="alert alert-info alert-dismissible">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<i class="far fa-check-circle fa-lg pr-3" style="color:red;"></i><strong>刪除成功</strong><br>
						</div>';
				//	}				
				
		   }/**/

	 }
?> 
		<div class="row mt-3 mb-3">	
			<div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-3"></div>
			<div class="col-12 col-xs-12 col-sm-12 col-md-8 col-lg-8">
			<form method="post" action="check".php" name="form1" class="">
						<div class="row">
						<div class="col-9 col-sm-9 col-md-2 col-lg-2">
								 </div>
							<div class="col-9 col-sm-9 col-md-6 col-lg-4">
								<input type="date" class="form-control " name="date"  id="date" placeholder="開始日期	" required>
							</div>
							 
							<div class="col-3 col-sm-3 col-md-4 col-lg-4">
									<button type="submit" class="btn btn-primary" name="submit" id="submit">查詢</button>
							</div>
						</div>
			</form>	
			</div>
			 
		</div>
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
			
			
		 
				<table class='table table-bordered text-center max ' id="">
					<tr class='' bgcolor='#009761'>
					<th class='text-center align-middle'  style='line-height:30px;width:100px; '> 訂貨時間</th>
					<th class='text-center align-middle' style='line-height:30px;width:100px;'> 出貨時間<br>業務</th>
					<th class='text-center align-middle' style='line-height:30px;width:100px;'> 廠商<br>工地位置<br>工程選項</th>
					 
					<th class='text-center align-middle' style='line-height:30px;width:100px;'> 強度<br>數量<br>施工方式</th>
					 
					<th class='text-center align-middle' style='line-height:30px;width:100px;'> 品管<br>品管時間</th>
					<th class='text-center align-middle' style='line-height:30px;width:100px;'> 聯絡人<br>電話</th>
					<th class='text-center align-middle' style='line-height:30px;width:100px;'> 備註</th>
					<th class='text-center align-middle' style='line-height:30px;width:100px;'> 修改<br>刪除</th>
					<th class='text-center align-middle' style='line-height:30px;width:100px;'> 確認</th>
					 
					</tr> 
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
							 
						}
					echo '	<td class="text-center align-middle" style="line-height:30px;color:'. $color.';"> 
						'.$row["book_date"].' 
						</td>
					<td class="text-center align-middle" style="line-height:30px;color:'. $color.';"> 
					'.$row["delivery"].'<br>'.$row["delivery_time"]." ".$row["delivery_time2"].'<br>'.$row["sale"].'
					<br><font color="white" style="opacity: 0;">0000000000</font>
					</td>
					<td class="text-center align-middle" style="line-height:30px;color:'. $color.';"> 
					'.$row["company"].'<br>'
					.$row["place"].'<br>'
					.$row["work_select"].'
						<br><font color="white" style="opacity: 0;">
						0000000000</font>
					</td>
					 
					<td class="text-center align-middle" style="line-height:30px;color:'. $color.';"> 
						
						'.$row["strength"].'<br>
						'.$row["type"]." : ".$row["quantity"].' 方<br>
						'.$row["work_type"] .'
						<br><font color="white" style="opacity: 0;">0000000000</font>
					</td>
					 
				 
					<td class="text-center align-middle" style="line-height:30px;color:'. $color.';"> 
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
						<td class="align-left" style="line-height:30px;"> 
							 
							 
 
							
							 <button type="submit" class="btn_choice "  name="pen[]"id='pen'  style="border-width:0px;outline : none;" value="<?=$row["id"]?>">
							 <img  src="images/pen.png"   width="30"  height="30" onmouseover="this.src='images/pen1.png';"
							onmouseout="this.src='images/pen.png';"
							onmousedown="this.src='images/pen2.png';">
							 </button>
							 <!---->
                           <button type="submit" class="btn_choice" name="trash[]"id='trash' style="border-width:0px;outline : none;" value="<?=$row["id"]?>">
							 <img src="images/trash.png"  width="30"  height="30" onmouseover="this.src='images/trash1.png';"
							onmouseout="this.src='images/trash.png';"onmousedown="this.src='images/trash2.png';" >
							 </button>
							 
							 
                            </td>
						<td class="text-center align-middle" style="line-height:30px;color:'. $color.';"> 
						  
						<?php
						if($row["accept"]=='' && $row['status']!='D' ){
							?>
							<select class="form-control" name="accept[]" id="accept[]" onchange="this.form.submit()"  >
						<option value="" disabled selected>請選擇</option>  
							<option value='Y<?=$row["id"];?>'>接受</option>
							<option value='N<?=$row["id"];?>'>拒絕</option>
						</select>
						<?php
						}
						else{
							if( $row['status']=='D' ){
								echo "已取消";
							}
							else{
								 echo $row["accept"];	
							}
							
						}
						?>
						 <br><font color="white" style="opacity: 0;">
						00000000</font>
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
				備註: 1. 工程 , 2.個人, 3.道路 
				 
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