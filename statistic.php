<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once("head.php");
 
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
	<?php
    	require 'db_login.php';
        $ndatetmp="";
        $daycount=0;
        function DateDiff($beginDate, $endDate) {
            $_beginDate = strtotime($beginDate);
            $_endDate = strtotime($endDate);
            $_diff = abs($_beginDate-$_endDate);
            return round(($_diff)/3600/24);
        }
       
        if(@$_POST['date']!=null && @$_POST['date2']!=null){
            $ndate = $_POST['date'];
            //$ndate2 = $_POST['date2']; 
            $ndate2=$_POST['date2'];
            //$_SESSION['date']=$ndate;
            $daycount= DateDiff($ndate, $ndate2)+1;
            $ndatetmp=$ndate;
         
        }
        
        else{
            $ndate2=date("Y-m-d",strtotime("+7 day"));
            $ndate=date("Y-m-d");
            $ndatetmp=$ndate;
          
            $daycount=7;
        }
        ////////
    ?>
	<div class="container" >
	 <!--
		  <div class="row mt-3 mb-3">	
			<div class="col-2 col-xs-2 col-sm-2 col-md-3 col-lg-4"></div>
			<div class="col-10 col-xs-10 col-sm-8 col-md-8 col-lg-6 ">
			<a href="new.php" class="btn btn-primary btn-lg">新增</a>
                 <a href="test.php" class="btn btn-primary btn-lg">修改</a>
                  <a href="delete.php" class="btn btn-primary btn-lg">取消</a>
               <a href="show.php?clearsession=true"  class="btn btn-primary btn-lg">查詢</a>
               <br> 
			</div>
			 
		</div>
-->
		<div class="row mt-3 mb-3">	
			<div class="col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4"></div>
			<div class="col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<h3 class=" d-flex justify-content-center"><span class="backstage_title">訂貨查詢</span></h3>
			</div>
			 
		</div>
		 
		 
		<div class="row mt-3 mb-3">	
			<div class="col-12 col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
			<div class="col-12 col-xs-12 col-sm-12 col-md-10 col-lg-10">
			<form method="post" action="statistic.php" name="form1" class="">
						<div class="row">
						    <div class=" col-sm-9 col-md-1 col-lg-2"></div>
								 
							<div class="col-5 col-sm-4 col-md-4 col-lg-3">
								<input type="date" class="form-control " name="date"  id="date" placeholder="開始日期	" required>
							</div>
							
							<div class="col-5 col-sm-4 col-md-4 col-lg-3">
								<input type="date" class="form-control" name="date2" id="date2" placeholder="結束日期	" required>
							</div>
							<!---->
							<div class="col-3 col-sm-3 col-md-3 col-lg-3">
									<button type="submit" class="btn btn-primary" name="submit" id="submit">查詢</button>
							</div>
						</div>
			</form>	
			</div>
			 
		</div>
		<?php
		 

            for($i=0;$i<$daycount;$i++){
				$str="";
                 
				//設定分頁------------------------------------------------------------------------------
                $mydate[$i]=$ndatetmp;
                $sql_search = "select sum(quantity) as quantity from `saleform` where status in('N','RN') and accept!='N' and type in('CLSM') and  delivery='$ndatetmp' ";
                $result2 = mysqli_query($db, $sql_search);
                $CLSM[$i]=0;
                $normal[$i]=0;
                while ($row = mysqli_fetch_array($result2)) {
                      //  echo "A"."/".$row['quantity'];
                        if($row['quantity']==''){  $CLSM[$i]=0;}
                        else{
                             $CLSM[$i]=$row['quantity'];
                        }
                   
                }
                $sql_search2 = "select sum(quantity) as quantity from `saleform` where status in('N','RN')and accept!='N' and type in('一般料') and  delivery='$ndatetmp' ";
                $result_n = mysqli_query($db, $sql_search2);
               
               
                while ($row = mysqli_fetch_array($result_n)) {
                    if($row['quantity']==''){   $normal[$i]=0;}
                    else{
                        $normal[$i]=$row['quantity'];
                    }
                     
                }
			
						 
					$ndatetmp=date("Y/m/d",strtotime($ndatetmp."+1 day"));
					 
					 
			}
			 
			
		


			//設定分頁------------------------------------------------------------------------------
		 
			echo "選擇日期: ".$ndate."~". $ndate2 ;
		 
			 
		?>
			<form  id="myform" name="myform" action="statistic.php" method="post" enctype="multipart/form-data">
			<?php
			echo " 
				<table class='table table-bordered text-center max'>
					<tr class='table-info'>
                    <th class='text-center align-middle'  style='line-height:30px;width:100px; '> 日期</th>
					<th class='text-center align-middle' style='line-height:30px;width:100px;'> CLSM</th>
					<th class='text-center align-middle' style='line-height:30px;width:100px;'>一般料</th>
					  
					</tr>";

                    for($i=0;$i<$daycount;$i++){
                       // echo $mydate[$i]." / ".$i." / : ";
                        //$color="black";
                        ?>
                            <tbody id="searchTable">
                            <tr>
                    <?php  
                             
                        echo '	<td class="text-center align-middle" style="line-height:30px; "> 
                            '.$mydate[$i].' 
                            </td>
                            <td class="text-center align-middle" style="line-height:30px; "> 
                            '.$CLSM[$i].' 
                            </td>
                            <td class="text-center align-middle" style="line-height:30px; "> 
                            '.$normal[$i].' 
                            </td>
                      
                        ';
                            ?>
                      
                            <tr>
                        <?php	
                        
                    }
                    ?>
                    </font>
				 
				</tbody>
				</table>
				</form>
                <?php
			  mysqli_close($db);	
		?>
	</div>
</body>
</html>