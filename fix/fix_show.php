<!DOCTYPE html>
<html lang="en">
<head> 
	<?php 
		include_once("head.php");
		include_once("nav_show.php");
        require '../db_login.php';
	?>
    <link rel="stylesheet" href="css/e_show.css">	
</head>
<body >
 
 
 	
	<div class="container"   >
	 <?php
	  
  
	if(isset($_GET['clearsession'])){
		$_SESSION['date']="";
	}
	if(isset($_POST['trash'])){
		$arr  =  $_POST['trash'];
		
		$name = $_SESSION['acc'];
		  
		 if( count($arr)>0)
           { 
             for($i=0;$i<count($arr);$i++)
                {
				  $sql = "update `erp_form` set status='D' where id='$arr[$i]' ";
				    
				    mysqli_query($db, $sql);
				}
		 				
				
		   }/**/

	 }
    else if(isset($_POST['pen'])){
		$arr  =  $_POST['pen'];
		
		if( count($arr)>0)
		{  
		  for($i=0;$i<count($arr);$i++)
			 {echo '<script language="javascript">';
				 
				echo "window.location.href='show_jump.php?c1=$arr[$i]'";
				echo '</script>';
				 
			 }
		}

	 }
?> <form method="post" action="fix_show.php" name="form1" class="">
		<div class="row mt-3 mb-3">	
			<div class="col-3 col-xs-6 col-sm-4 col-md-6 col-lg-8"></div>
			<div class="col-9 col-xs-6 col-sm-8 col-md-6 col-lg-4">
				
					<div class="row justify-content-end"align="right " style="margin-top:32px;margin-bottom:16px;">
				 
			 <input type="date" class="form-control find"style=" height:44px; width:170px; margin-left:10px;" name="date"  id="date" placeholder="開始日期	" required>
			 &emsp; 	<button type="submit" class="btn_choice" name="submit" style="border-width:0px;outline : none; " >
				<img src="../images/find.png"  width="44"  height="44"  align="right">
									</button>					
								 
					</div>
					
			</div>
			 
		</div>
	</form>
		<?php
			 		
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
				$ndate2=date("2021-12-31"); //date("Y-m-d");//date("Y-m-d",strtotime("+10 day"));
				$ndate=date("2021-08-21"); //date("Y-m-d");
				$ndatetmp=$ndate;
				$daycount=7;
			} 
			//設定分頁------------------------------------------------------------------------------
			$sql = "SELECT * FROM erp_form where status in('N','RN')and date between '$ndate' and '$ndate2'order by  CONVERT(`company` using big5),book_num ASC";
			$date=date('Y-m-d');
		  
			$result = mysqli_query($db, $sql);//.' LIMIT '.$stacle_page.', '.$per_num
		  
			 
		?>
		<div  class=" ">
			<form  id="myform" name="myform" action="fix_show.php" method="post" enctype="multipart/form-data">
			 
				<table class='table table-bordered text-center max ' style="border-collapse:collapse; ">
				  
  
				<thead>
					<tr class='' bgcolor='#009761'>
					<th class='text-center align-middle' style="border-radius:5% 0% 0% 0%; border: none !important;">
					填單日期<br>報修日期<br> 部門-姓名</th>
					  
					 <th class='text-center align-middle' >設備<br>維修項目</th>
					<th class='text-center align-middle' > 廠商</th>
                    <th class='text-center align-middle' > 數量<br>價錢</th>
                    <th class='text-center align-middle' > 備註</th>
                    <th class='text-center align-middle'style="border-radius:0% 5% 0% 0%;line-height:30px;width:120px;border: none !important;" > 修改<br>刪除</th>
					
					</tr> </thead>
			<?php
				while ($row = mysqli_fetch_array($result)) {
					$color="blue";
					?>
						<tbody id="searchTable">
						<tr>
			 
						<td class="text-center align-middle" bgcolor="#fff" style="	outline:0;line-height:30px; "> 
						<?=$row["date"];?> <br>
						<?=$row["book_num"];?> 
						</td>
					 
					<td class="text-center align-middle" style="line-height:30px; ">  
					<?=$row["company"];?> 
					 
				 
					</td>
					 <td class="text-center align-middle" style="line-height:30px; ">  
                     <?=$row["work_case"];?>  
					</td>
					  
						 
						<td class="align-left  align-middle" style="line-height:30px;">  
						<button type="submit" class="btn_choice "  name="pen[]"id='pen'  style="border-width:0px;outline : none;" value="<?=$row["id"]?>">
						<img  src="../images/pen.png"   width="46"  height="46" onmouseover="this.src='../images/pen1.png';"
							onmouseout="this.src='../images/pen.png';"
							onmousedown="this.src='../images/pen2.png';">
						</button> 
							 
                        <button type="submit" class="btn_choice" name="trash[]"id='trash' style="border-width:0px;outline : none;" value="<?=$row["id"]?>">
						 <img src="../images/trash.png"  width="46"  height="46" onmouseover="this.src='../images/trash1.png';"
						 onmouseout="this.src='../images/trash.png';"onmousedown="this.src='../images/trash2.png';" >
						</button>	 
                        </td>
					 
						<tr>
					<?php	
					 
				}
				?>
				</font>
				</tbody>
				</table>
			</div>
				</form>
				 
				 
			<?php
			 mysqli_close($db);	
		?>
	</div>
</body>
</html>