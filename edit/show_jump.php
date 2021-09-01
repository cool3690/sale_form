<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once ("head.php"); 
include_once ("navbar.php");?>	
 <link rel="stylesheet" href="css/n_record.css">
 
 
</head>
<body>
 
	
	<div class="container" style="padding-bottom:100px;">
	<?php
	  require 'db_login.php';
        
        $name = $_SESSION['acc'];
	 if(isset($_GET['c1'])){
		$arr  =  $_GET['c1'];
        
		 if( $arr!=null)
           { 
             
				  $sql = "select* from `erp_form`  where id='$arr' ";
				  $result = mysqli_query($db,$sql);
                  while ($row = mysqli_fetch_array($result)) {
                      
                        $_SESSION['book_num']=$row["book_num"];
                        $_SESSION['company']=$row["company"];
                       
                        $_SESSION['work_case']=$row['work_case'];
                        $date= $row["date"] ;
                    $book_num= $row["book_num"] ;
                    $company= $row["company"]; 
                    
                    $work_case=$row['work_case'];
                   
                      ?>
                    <form  id="myform" name="myform" action="show_jump.php?id=<?=$row["id"];?>" method="post" enctype="multipart/form-data">
                    
                     <div class="container"> 
                      
                     <br>
               <div class="form-group row">	 
               <div class="col-sm-1   col-md-1 col-lg-1" ></div>
<div class="col-sm-1   col-md-1 col-lg-1" style="background-color:#fff;border-radius:10px;" ></div>
		<div class="col-12 col-xs-12 col-sm-8  col-md-8 col-lg-8" style="margin-top:48px;">
		 	<div style="text-align:right;">填表人工號: <?=$name;?></div>
		</div> 
            <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;border-radius:10px;" > </div>
		<div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
	 
                       
            <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div> 
                       <div class="col-12 col-xs-12 col-sm-8  col-md-8 col-lg-8">
                             <hr width="100%"  align="left"  style="border: 1px solid #C0C2CC; right:20px;">
                       </div>
                      
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div> 
                <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
                       <!--line 1-->
                       <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div>
     <div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2">
                             <label>訂貨日期：</label> 
                             <input class="form-control" name="date" id="date" value="<?=$date;?>"  >
                                   
                       </div>	 
                           <div class="col-12 col-xs-12 col-sm-3 col-md-3 col-lg-3 mt-2 mb-2">
                             <label>訂單編號：</label> 
                             <input class="form-control" name="book_num" id="book_num" value="<?=$book_num;?>" >
                                   
                       </div>	
                       <div class="col-12 col-xs-12 col-sm-3 col-md-3 col-lg-3 mt-2 mb-2" >
                             <label>客戶：</label> 
                             <input list="company" name="company" class="form-control" value="<?=$company;?>"></label>
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
                         <label>工程名稱：</label>
                         <input type="text" class="form-control" name="work_case" id="work_case" value="<?=$work_case;?>">
                       </div>
                                   
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div> 
                <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 

         
                       <!--here-->
                       <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"   > </div>
	<div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;border-radius:10px; " > </div>

		 <div class="col-12 col-xs-12 col-sm-8 col-md-8 col-lg-8 mt-2 mb-2"  ><center>
		 <button type="submit" name="submit" class="btn " style="margin-bottom:48px;" onmousedown="this.style.background='#8C8012';" >修改訂單</button>
</center>
	 </div>	
	 
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff; border-radius:10px;" > </div>
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div>
	
                 </form>
                 <?php
                  }	 
		   }


            
	 }
       ////////////////////
       if(isset($_POST['submit']) ){
        $cid = $_GET['id'];
        $book_num=$_POST['book_num'];
        $company=$_POST['company'];
        $date=$_POST['date'];
        $work_case=$_POST['work_case'];
        
        $name = $_SESSION['acc'];
        if (strpos($company, '-')== false) {
		 
      }
      else{
       $tmp_company = explode("-", $company);
       $company=$tmp_company[1];
      }
         $sql = "update `erp_form` set status='R' where id='$cid ' ";
         mysqli_query($db, $sql);
        $sqlRN = "INSERT INTO `erp_form`(`book_num`,`date`, `company`, `work_case`,`status`) VALUES 
       ('$book_num','$date','$company', '$work_case','RN')";
       mysqli_query($db, $sqlRN);                  
      echo '<script language="javascript">';
				 
      echo "window.location.href='erp_show.php'";
      echo '</script>';
    
    }  
    
    
  
	 
			 mysqli_close($db);	
		   ?>
	</div>
</body>
</html>