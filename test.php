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
 
<script>
  function chk(input)
  {
    for(var i=0;i<document.myform.c1.length;i++)
    {
      document.myform.c1[i].checked = false;
    }
    
    input.checked = true;
    return true;
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
	 if(isset($_POST['submit'])){
		$arr  =  $_POST['a'];

		 if( count($arr)>0)
           { 
             
				  $sql = "select* from `saleform`  where id='$arr[0]' ";
				  //mysqli_query($db, $sql);
				 
       
					
			 
				 
		   }

	 }
   
?>
	  <div class="row mt-3 mb-3">	
			<div class="col-2 col-xs-2 col-sm-2 col-md-3 col-lg-4"></div>
			<div class="col-10 col-xs-10 col-sm-8 col-md-8 col-lg-6">
			<a href="new.php" class="btn btn-primary btn-lg">??????</a>
                 <a href="test.php" class="btn btn-primary btn-lg">??????</a>
                  <a href="delete.php" class="btn btn-primary btn-lg">??????</a>
               <a href="show.php"  class="btn btn-primary btn-lg">??????</a>
               <br> 
			</div>
			 
		</div>
	<div class="row mt-3 mb-3">	
			<div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-4"></div>
			<div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-4">
				<h3 class=" d-flex justify-content-center"><span class="backstage_title">??????????????????</span></h3>
			</div>
			 
		</div>
	<form  id="myform" name="myform" action="revise.php" method="post" enctype="multipart/form-data">	
 
		<?php
	 
			require 'db_login.php';			
			$daste=date('Y-m-d');
			$ndate2=date("Y-m-d",strtotime("+10 day"));
		//	$daste="2021-05-31";
			$sql = "SELECT * FROM saleform where status in('N','RN')and delivery between '$daste' and '$ndate2' ";
			$query_sql = mysqli_query($db, $sql);
			$count_data = mysqli_num_rows($query_sql); //????????????
			$per_num = 10; //??????????????????
			$totalpage = ceil($count_data/$per_num); //????????????
			if (!isset($_GET["page"])){ 	
				$page=1; //???????????????
			} else {
				$page = intval($_GET["page"]); //????????????
			}
			$stacle_page = ($page-1) * $per_num; //??????????????????
		
			$result = mysqli_query($db, $sql);//.' LIMIT '.$stacle_page.', '.$per_num
			$i=($page-1)*10+1;
			
			//------------------------------------------------------------------------------
		 
			echo "
				<table class='table table-bordered text-center max'>
					<tr class='table-info'>
					<th class='text-center align-middle' style='line-height:30px;width:60px;'> ??????</th>
					<th class='text-center align-middle' style='line-height:30px;width:100px;'> ????????????</th>
						<th class='text-center align-middle' style='line-height:30px;width:100px;'> ????????????<br>??????</th>
						<th class='text-center align-middle' style='line-height:30px;width:100px;'> ??????<br>????????????<br>????????????</th>
						<th class='text-center align-middle' style='line-height:30px;width:100px;'> ??????<br>??????<br>????????????</th>
						<th class='text-center align-middle' style='line-height:30px;width:100px;'> ??????<br>????????????</th>
                        <th class='text-center align-middle' style='line-height:30px;width:100px;'> ?????????<br>??????</th>
						<th class='text-center align-middle' style='line-height:30px;width:100px;'> ??????</th>
						 
					</tr>";

				while ($row = mysqli_fetch_array($result)) {
					?>
						<tbody id="searchTable" name="searchTable">
						<tr>
                            <td class="text-center align-middle" style="line-height:30px;"> 
                            <input type=checkbox name='c1' id='c1' value="<?=$row["id"]?>" onclick="return chk(this);">
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
						'.$row["type"].": ".$row["quantity"].' ???<br>
						'.$row["work_type"] .'
						 <br><font color="white" style="opacity: 0;">
						0000000000</font>
					</td>
					 
					<td class="text-center align-middle" style="line-height:30px;"> 
						'.$row["qc"].'<br>
						'.$row["qc_time2"].'
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
      <button type="submit" name="submit" class="btn "   >&emsp;&emsp;??????&emsp;&emsp;</button>
    </div>		
		<div class="col-sm-2   col-md-2 col-lg-2"  ></div> 
	 <!---->
  </form>
			<?php mysqli_close($db);	
		   ?>
	</div>
</body>
</html>