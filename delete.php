<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once ("head.php"); ?>	
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
</style>
	<script>
		 $( function() {
			$( ".sdate" ).datepicker({
				changeMonth:true,
				changeYear:true,
				dateFormat:"yy/mm/dd"	
			});
		} );
		$(document).ready(function(){
			$('.stime').mdtimepicker({ 
				format: 'hh:mm' 
			}).data('mdtimepicker');
		});
	</script>	
	<div class="container" style="padding-bottom:100px;">
	<?php
	  require 'db_login.php';
	  require 'line.php';
	 if(isset($_POST['submit'])){
		$arr  =  $_POST['a'];
		$name = $_SESSION['acc'];
		 
		 if( count($arr)>0)
           { 
             for($i=0;$i<count($arr);$i++)
                {
				  $sql = "update `saleform` set status='D',filled_in='$name' where id='$arr[$i]' ";
				  mysqli_query($db, $sql);
				  $sql_search = "select* from `saleform`where  id='$arr[$i]' ";
				  $result = mysqli_query($db, $sql_search);
				  while ($row = mysqli_fetch_array($result)) {
					$book_date= $row["book_date"] ;
                    $company= $row["company"]; 
                    $place=  $row["place"] ;
                    $strength= $row["strength"];
                    $quantity=$row["quantity"];
                    $work_type=$row["work_type"];  
                    $code=$row["code"];
                    $qc=$row["qc"];
                    $user=$row["user"]; 
                    $tel=$row["tel"];
                    $delivery=$row["delivery"];
                    $sale=$row["sale"]; 
                    $note=$row["note"];
					line_call("取消訂單",$book_date,$company,$place,$work_case,$strength,$quantity,$work_type,$code,$qc,$user,$tel,$delivery,$sale,$note);
		  
				  }
				}
       
					
			 
				if (mysqli_query($db, $sql)) {
					
					echo '<div class="alert alert-info alert-dismissible">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<i class="far fa-check-circle fa-lg pr-3" style="color:red;"></i><strong>取消成功</strong><br>
						</div>';
					}				
				/**/
		   }

	 }
   
?>
	<form  id="myform" name="myform" action="delete.php" method="post" enctype="multipart/form-data">	
	
	<div class="row mt-3 mb-3">	
			<div class="col-2 col-xs-2 col-sm-2 col-md-3 col-lg-4"></div>
			<div class="col-10 col-xs-10 col-sm-8 col-md-8 col-lg-6">
			<a href="new.php" class="btn btn-primary btn-lg">新增</a>
                 <a href="test.php" class="btn btn-primary btn-lg">修改</a>
                  <a href="delete.php" class="btn btn-primary btn-lg">取消</a>
               <a href="show.php"  class="btn btn-primary btn-lg">查詢</a>
               <br> 
			</div>
			 
		</div>
		<div class="row mt-3 mb-3">	
			<div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-4"></div>
			<div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-4">
				<h3 class=" d-flex justify-content-center"><span class="backstage_title">訂貨紀錄取消</span></h3>
			</div>
			 
		</div>
		<?php
	 
			require 'db_login.php';			
			$daste=date('Y-m-d');
			$ndate2=date("Y-m-d",strtotime("+10 day"));
		 
	  
			$sql = "SELECT * FROM saleform where status in('N','RN')and delivery between '$daste' and '$ndate2' ";
			$query_sql = mysqli_query($db, $sql);
			$count_data = mysqli_num_rows($query_sql); //計算總數
			$per_num = 10; //每頁顯示筆數
			$totalpage = ceil($count_data/$per_num); //取得整數
			if (!isset($_GET["page"])){ 	
				$page=1; //設定起始頁
			} else {
				$page = intval($_GET["page"]); //確認頁數
			}
			$stacle_page = ($page-1) * $per_num; //每頁開始序號
		
			$result = mysqli_query($db, $sql);//.' LIMIT '.$stacle_page.', '.$per_num
			$i=($page-1)*10+1;
			
			//------------------------------------------------------------------------------
		 
			echo "
				<table class='table table-bordered text-center max'>
					<tr class='table-info'>
					<th class='text-center align-middle' style='line-height:30px;width:60px;'> 勾選</th>
					<th class='text-center align-middle' style='line-height:30px;width:100px;'> 訂貨時間</th>
					<th class='text-center align-middle' style='line-height:30px;width:100px;'> 出貨時間<br>業務</th>
					<th class='text-center align-middle' style='line-height:30px;width:100px;'> 廠商<br>工地位置<br>工程名稱</th>
					<th class='text-center align-middle' style='line-height:30px;width:100px;'> 強度<br>數量<br>施工方式</th>
					<th class='text-center align-middle' style='line-height:30px;width:100px;'> 品管<br>品管時間</th>
					<th class='text-center align-middle' style='line-height:30px;width:100px;'> 聯絡人<br>電話</th>
					<th class='text-center align-middle' style='line-height:30px;width:100px;'> 備註</th>
					</tr>";

				while ($row = mysqli_fetch_array($result)) {
					?>
						<tbody id="searchTable">
						<tr>
                            <td class="text-center align-middle" style="line-height:30px;"> 
                            <input type=checkbox name='a[]' id='a' value="<?=$row["id"]?>">
                            </td>
                   <?php
						echo '
						<td class="text-center align-middle" style="line-height:30px;"> 
						'.$row["book_date"].' 
						</td>
					<td class="text-center align-middle" style="line-height:30px;"> 
					'.$row["delivery"].'<br>'.$row["delivery_time"]." ".$row["delivery_time2"].'<br>'.$row["sale"].'
					<br><font color="white" style="opacity: 0;">
					0000000000</font>
					</td>
					<td class="text-center align-middle" style="line-height:30px;"> 
					'.$row["company"].'<br>'
					.$row["place"].'<br>'
					.$row["work_case"].'
						<br><font color="white" style="opacity: 0;">
						00000000</font>
					</td>
					<td class="text-center align-middle" style="line-height:30px;"> 
						
						'.$row["strength"].'<br>
						'.$row["type"].": ".$row["quantity"].' 方<br>
						'.$row["work_type"] .'
						 <br><font color="white" style="opacity: 0;">
						0000000000</font>
					</td>
					 
					<td class="text-center align-middle" style="line-height:30px;"> 
						'.$row["qc"].'<br>
						'.$row["qc_time2"].'<br><font color="white" style="opacity: 0;">
						000000000</font>
					</td>
					<td class="text-center align-middle" style="line-height:30px;"> 
						'.$row["user"].'<br>
						'.$row["tel"].' 
					</td>
					 
					<td class="text-center align-middle" style="line-height:30px;"> 
					'.$row["note"].'<br><font color="white" style="opacity: 0;">
					000000000</font>
					</td>
					 
					  '; 
						 
					$i++;
				}?>
			 </tbody>
				</table> 
                <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center mt-5">
        <button type="submit" name="submit" class="btn "   >取消訂單</button>
	</div>		
		<div class="col-sm-2   col-md-2 col-lg-2"  ></div> 
	 <!---->
  </form>
			<?php mysqli_close($db);	
		   ?>
	</div>
</body>
</html>