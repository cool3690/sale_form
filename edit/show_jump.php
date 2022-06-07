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
                    $strength=$row['strength'];
                    $user=$row['user'];
                    $sale=$row['sale'];
                    $tel=$row['tel'];
                    $str=explode(",",$strength);
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
    <!--line 2-->
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div> 
	 
	 <div class="col-12 col-xs-12 col-sm-3 col-md-3 col-lg-3 mt-2 mb-2">
	 <label>電話:</label>
	   <input type="text" class="form-control" name="tel" id="tel" value="<?=$tel;?>">
	 </div>
	 <div class="col-12 col-xs-12 col-sm-3 col-md-3 col-lg-3 mt-2 mb-2">
	 <label>聯絡人:</label>
	   <input type="text" class="form-control" name="user" id="user" value="<?=$user;?>">
	 </div>
	 <div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2">
	 <label>業務:</label>
	 <select class="form-control" name="sale" id="sale" >
	 				<option value='<?=$sale;?>'><?=$sale;?></option>
					<option value='王南欽'>王南欽</option>
					<option value='王振宇'>王振宇</option>
					<option value='林商發'>林商發</option>
					<option value='林泰宏'>林泰宏</option>
					<option value='林宗達'>林宗達</option>
				</select>	
	 </div>
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div>
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div>
            <!--line 3-->
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div> 
	 
	 <div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2">
	 <label>強度1:</label>
	  <input list="strength" name="strength[]" class="form-control" value="<?=$str[0];?>"></label>
		   <datalist  name="strength" id="strength">
	    <option value='大於20'>大於20</option>
					<option value='大於40'>大於40</option>
					<option value='大於50'>大於50</option>
					<option value='小於80'>小於80</option>
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
		</datalist>
	 </div>
	 <div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2">
	 <label>強度2:</label>
	  <input list="strength" name="strength[]" class="form-control" value="<?=$str[1];?>"></label>
		   <datalist  name="strength" id="strength">
	    <option value='大於20'>大於20</option>
					<option value='大於40'>大於40</option>
					<option value='大於50'>大於50</option>
					<option value='小於80'>小於80</option>
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
		</datalist>
	 </div>
	 <div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2">
	 <label>強度3:</label>
	  <input list="strength" name="strength[]" class="form-control" value="<?=$str[2];?>"></label>
		   <datalist  name="strength" id="strength">
	    
					<option value='大於20'>大於20</option>
					<option value='大於40'>大於40</option>
					<option value='大於50'>大於50</option>
					<option value='小於80'>小於80</option>
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
		</datalist>
	 </div>
	 <div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2">
	 <label>強度4:</label>
	  <input list="strength" name="strength[]" class="form-control" value="<?=$str[3];?>"></label>
		   <datalist  name="strength" id="strength">
	    
					<option value='大於20'>大於20</option>
					<option value='大於40'>大於40</option>
					<option value='大於50'>大於50</option>
					<option value='小於80'>小於80</option>
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
		</datalist>
	 </div>
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div>
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
<!--line 3-->
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div> 
	 
	 <div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2">
	 <label>強度5:</label>
	  <input list="strength" name="strength[]" class="form-control" value="<?=$str[4];?>"></label>
		   <datalist  name="strength" id="strength">
	    
					<option value='大於20'>大於20</option>
					<option value='大於40'>大於40</option>
					<option value='大於50'>大於50</option>
					<option value='小於80'>小於80</option>
					<option value='小於90'>小於90</option>
					<option value='20-90'>20-90</option>
					<option value='20-70'>20-70</option>
					<option value='30-80'>30-80</option>
					<option value='35-90'>35-90</option>
					<option value='40-80'>40-80</option>
					<option value='40-90'>40-90</option>
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
		</datalist>
	 </div>
	 <div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2">
	 <label>強度6:</label>
	  <input list="strength" name="strength[]" class="form-control" value="<?=$str[5];?>"></label>
		   <datalist  name="strength" id="strength">
	    
					<option value='大於20'>大於20</option>
					<option value='大於40'>大於40</option>
					<option value='大於50'>大於50</option>
					<option value='小於80'>小於80</option>
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
		</datalist>
	 </div>
	 <div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2">
	 <label>強度7:</label>
	  <input list="strength" name="strength[]" class="form-control" value="<?=$str[6];?>"></label>
		   <datalist  name="strength" id="strength">
	    
				<option value='大於20'>大於20</option>
					<option value='大於40'>大於40</option>
					<option value='大於50'>大於50</option>
					<option value='小於80'>小於80</option>
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
		</datalist>
	 </div>
	 <div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2">
	 <label>強度8:</label>
	  <input list="strength" name="strength[]" class="form-control" value="<?=$str[7];?>"></label>
		   <datalist  name="strength" id="strength">
	    
					<option value='大於20'>大於20</option>
					<option value='大於40'>大於40</option>
					<option value='大於50'>大於50</option>
					<option value='小於80'>小於80</option>
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
		</datalist>
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
		$strength=$_POST['strength'];
        $date=$_POST['date'];
        $work_case=$_POST['work_case'];
        $user=$_POST['user'];
        $sale=$_POST['sale'];
        $tel=$_POST['tel'];
        $name = $_SESSION['acc'];
        $str="";
        for($i=0;$i<count($strength);$i++){
         //echo $i." : ".$strength[$i]."  ";
         if($strength[$i]!=""){
            $str.=$strength[$i].",";
         }
         
        }
        if (strpos($company, '-')== false) {
		 
      }
      else{
       $tmp_company = explode("-", $company);
       $company=$tmp_company[1];
      }
         $sql = "update `erp_form` set status='R' where id='$cid ' ";
         mysqli_query($db, $sql);
   
       $sqlRN = "INSERT INTO `erp_form`(`book_num`,`date`, `company`, `work_case`, `tel`, `user`, `sale`,`strength`,`status`) VALUES 
       ('$book_num','$date','$company', '$work_case','$tel','$user' ,'$sale','$str','RN')";
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