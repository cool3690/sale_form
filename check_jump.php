<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once ("head.php"); 
include_once ("navbar.php");?>	
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
 
<script type="text/javascript">
	 	
		 $( function() {
					$( ".date" ).datepicker({
					changeMonth:true,
					changeYear:true,
					dateFormat:"yy/mm/dd"	
					});
				} );
  
 
department=new Array();
department[0]=["大於20", "大於50", "小於90", "20-90", "20-70","30-80","35-90","40-80","50-90","30-60","20-50","140", "175", "210", "245", "280", "315", "350", "420" ];//clsm	 
department[1]=["大於20", "大於50", "小於90", "20-90", "20-70","30-80","35-90","40-80","40-90","50-90","30-60","20-50"];	//一般料
department[2]=["140", "175", "210", "245", "280", "315", "350", "420"];	//一般料
function renew(index){
	for(var i=0;i<department[index].length;i++)
		document.myform.strength.options[i]=new Option(department[index][i], department[index][i]);	// 設定新選項
	document.myform.strength.length=department[index].length;	// 刪除多餘的選項
}
 
	 
	</script>

</head>
<body>
<style>
      @media (min-width: 0px) and (max-width: 1024px) { 
            .form-group{
                  background: rgb(255,255,255);
            } 
      }
      @media (min-width: 1025px) and (max-width: 4000px) { 
            .form-group{
                  background: rgb(172,240,203);
                  background: linear-gradient(90deg, rgba(172,240,203,0) 15%, rgba(255,255,255,1) 15%, rgba(255,255,255,1) 55%, rgba(255,255,255,1) 85%, rgba(0,228,146,0.2) 90%, rgba(172,240,203,0) 93%);
            } 
      }	 
            body {
			 
                   background-size:cover;
                   text-align: justify;
                   text-justify: inter-word;
                   background: rgba(172, 240, 203, 0.2);
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
            border-color:#FFE70D;
      }
      .btn:hover{
            background-color: #FFE70D; 
            color:black;
            margin-bottom:20px;
            border-color:#FFE70D;
      }
      .btn:focus{
            border: none;
            background-color: #8C8012;
            outline:0;
            box-shadow: 0 0 3px #8C8012;
      }
</style>
	
	<div class="container" style="padding-bottom:100px;">
	<?php
	  require 'db_login.php';
        
        $name = $_SESSION['acc'];
	 if(isset($_GET['c1'])){
		$arr  =  $_GET['c1'];
       // echo $arr[0];
		 if( $arr!=null)
           { 
             
				  $sql = "select* from `saleform`  where id='$arr' ";
				  $result = mysqli_query($db,$sql);
                  while ($row = mysqli_fetch_array($result)) {
                      //  $cid  = $row["id"];
                       

                        $_SESSION['cid']=$row["id"];
                        $_SESSION['book_date']=$row["book_date"];
                        $_SESSION['company']=$row["company"];
                        $_SESSION['place']=$row["place"];
                        $_SESSION['strength']=$row["strength"];
                        $_SESSION['quantity']=$row["quantity"];
                        $_SESSION['work_case']=$row['work_case'];
                        $_SESSION['work_type']=$row["work_type"];
                        $_SESSION['book_num']=$row["book_num"];
                        $_SESSION['code']=$row["code"];
                        $_SESSION['qc']=$row["qc"];
                        $_SESSION['qc_time']=$row["qc_time"];
                        $_SESSION['qc_time2']=$row["qc_time2"];
                        $_SESSION['type']=$row["type"];
                        $_SESSION['user']=$row["user"];
                        $_SESSION['tel']=$row["tel"];
                        $_SESSION['delivery']=$row["delivery"];
                        $_SESSION['delivery_time']=$row["delivery_time"];
                        $_SESSION['delivery_time2']=$row["delivery_time2"];
                        $_SESSION['sale']=$row["sale"];
                    $book_date= $row["book_date"] ;
                    $company= $row["company"]; 
                    $place=  $row["place"] ;
                    $strength= $row["strength"];
                    $type= $row["type"];
                    $quantity=$row["quantity"];
                    $work_case=$row['work_case'];
                    $work_type=$row["work_type"]; 
                    $book_num=$row["book_num"]; 
                    $code=$row["code"];
                    $qc=$row["qc"];
                    $qc_time=$row["qc_time"];
                    $qc_time2=$row["qc_time2"];
                    $user=$row["user"]; 
                    $tel=$row["tel"];
                    $delivery=$row["delivery"];
                    $delivery_time=$row["delivery_time"];
                    $delivery_time2=$row["delivery_time2"];
                    $sale=$row["sale"]; 
                    $note=$row["note"];
                      ?>
                    <form  id="myform" name="myform" action="check_jump.php?id=<?=$row["id"];?>" method="post" enctype="multipart/form-data">
                    <!-- ?status_title=2-->
                     <div class="container"> 
                     
                    <!-- <h2><center>全興訂貨表修改 </center> </h2>-->
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
                           <div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4 mt-2 mb-2">
                             <label>訂貨日期：</label> 
                             <input class="form-control" name="book_date" id="book_date" value="<?=$book_date;?>" >
                                   
                       </div>	
                       <div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4 mt-2 mb-2" >
                             <label>客戶：</label> 
                             <input list="company" name="company" class="form-control" value="<?=$company;?>"></label>
		   <datalist  name="company" id="company">
    	                  <?php
					$sql_search2 = "select company from `customer`";
						$result_n = mysqli_query($db, $sql_search2);
						
						while ($row = mysqli_fetch_array($result_n)) {
				?>
						<option value="<?=$row['company'];?> ">
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
                        <div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2">
                        <label>訂單單號：</label>
                        <input type="text" class="form-control" name="book_num" id="book_num" value="<?=$book_num;?>">
                        </div>
	                   <div class="col-12 col-xs-12 col-sm-6 col-md-6 col-lg-6 mt-2 mb-2">
                         <label>工地位置：</label>
                         <input type="text" class="form-control" name="place" id="place" value="<?=$place;?>">
                       </div>
                                   
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div> 
                <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 

                   
                       <!--line 3-->
                        <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
                        <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div> 
                         
                        <div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2">
			  <label>料別：</label> 
			  <select class="form-control" name="type" id="type" onChange="renew(this.selectedIndex);" >
                    <option value='<?=$type;?>'selected><?=$type;?></option>
			  		<option value='CLSM'>CLSM</option>
					<option value='一般料'>一般料</option>
				 
				</select>	
                    
		            </div>	
                          <div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2">
                             <label>強度：</label> 
                            
                        <select class="form-control" name="strength" id="strength"  >
                             <option value='<?=$strength;?>'selected><?=$strength;?></option>
                             <option value='大於20'>大於20</option>
					<option value='大於50'>大於50</option>
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
				</select>	 
                       </div>	
                      
                       <div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2" >
                             <label>數量：</label> 
                             <input class="form-control" name="quantity" id="quantity" value="<?=$quantity;?>">            
                       </div>
                      <div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2">
                  <label>施工方式：</label>
                        <select class="form-control" name="work_type" id="work_type"  >
                         <option value='<?=$work_type;?>'selected><?=$work_type;?></option>
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
                             <input class="form-control" name="delivery" id="delivery " value="<?=$delivery;?>" >
                                   
                       </div>	
                       <div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2">
                             <label>出貨時段：</label> 
                             <select class="form-control" name="delivery_time" id="delivery_time"  >
                             <option value='<?=$delivery_time;?>'selected><?=$delivery_time;?></option>
			  		<option value='早上'>早上</option>
					<option value='下午'>下午</option>
				 
				</select>    
                       </div>	
                       <div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2">
                             <label>出貨時間：</label> 
                           
                        <input class="form-control" name="delivery_time2" id="delivery_time2" value="<?=$delivery_time2;?>" >
                                      
                       </div>
                       <div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2" >
                             <label>業務：</label> 
                             
                             <select class="form-control" name="sale" id="sale"  >
                             <option value='<?=$sale;?>'selected><?=$sale;?></option>
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
                                <option value='<?=$qc;?>'selected><?=$qc;?></option>
                                            <option value='有'>有</option>
                                          <option value='無'>無</option>
                                           
                                    </select>				  
                        </div>
                        
                        <div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2">
                                <label>品管時間:</label> 
                                <input class="form-control" name="qc_time2" id="qc_time2" value="<?=$qc_time2;?>" >
                                
                        </div>
                       
                           <div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2">
                             <label>聯絡人：</label> 
                             <input class="form-control" name="user" id="user" value="<?=$user;?>" >
                                   
                       </div>	
                       <div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-2 mb-2" >
                             <label>電話：</label> 
                             <input class="form-control" name="tel" id="tel" value="<?=$tel;?>">            
                       </div>
                     
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div> 
                <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div>
                
               <!--line 8-->
               <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
	 <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div> 
             
                           <div class="col-12 col-xs-12 col-sm-8 col-md-8 col-lg-8 mt-2 mb-2">
                             <label>備註：</label> 
                             <input class="form-control" name="note" id="note" value="<?=$note;?>"/>
                            
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
        $book_num=$_POST['book_num'];
        $name = $_SESSION['acc'];
        $weekarray=array("日","一","二","三","四","五","六");
        $code="(".$weekarray[date("w",strtotime($delivery))].")" ;
        $company=str_replace("有限公司","",$company);
        $company=str_replace("股份有限公司","",$company);
        $company=str_replace("公司","",$company);
        $company=str_replace("工程行","",$company);  
        $company=str_replace("土木包工業","",$company);
        $company=str_replace("工程有限公司","",$company); 
        $company=str_replace("企業行","",$company);
        
       // line_call("修改訂單",$book_date,$company,$place,$work_case,$strength,$type."/".$quantity,$work_type,$code,$qc." ".$qc_time2,$user,$tel,$delivery.$delivery_time." ".$delivery_time2,$sale,$note);
          
         $sql = "update `saleform` set status='R' where id='$cid ' ";
         mysqli_query($db, $sql);
        $sqlRN="INSERT INTO `saleform`(`book_date`,`book_num`,`company`, `place`, `work_case`, `strength`, `type`, `quantity`, `work_type`, `code`, `qc`, `qc_time`, `qc_time2`, `user`, `tel`, `delivery`, `delivery_time`, `delivery_time2`, `sale`, `note`, `status`, `filled_in`) VALUES 
        ('$book_date','$book_num', '$company', '$place', '$work_case', '$strength', '$type', '$quantity', '$work_type', '$code','$qc','$qc_time','$qc_time2', '$user', '$tel', '$delivery', '$delivery_time', '$delivery_time2', '$sale', '$note','RN','$name')";
       mysqli_query($db, $sqlRN);
     
                      
      echo '<script language="javascript">';
				 
      echo "window.location.href='check.php'";
      echo '</script>';
    
    }  
    
    
  
	 
			 mysqli_close($db);	
		   ?>
	</div>
</body>
</html>