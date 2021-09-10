<!DOCTYPE html>
<html lang="en">
<head>
<?php 
      include_once ("head.php"); 
      include_once ("nav_show.php");
      require '../db_login.php';
?>	
 <link rel="stylesheet" href="css/n_fix.css">
 
 
</head>
<body>
 
	
	<div class="container" style="padding-bottom:100px;">
	<?php
	
        
        $name = $_SESSION['acc'];
	 if(isset($_GET['c1'])){
		$arr  =  $_GET['c1'];
        
		 if( $arr!=null)
           { 
             
				  $sql = "select* from `fix_form`  where id='$arr' ";
				  $result = mysqli_query($db,$sql);
                  while ($row = mysqli_fetch_array($result)) {
                      
                        $_SESSION['date']=$row["date"];
                        $_SESSION['depart']=$row["depart"];
                        $_SESSION['myname']=$row['myname'];
                        $_SESSION['fix_date']=$row['fix_date'];
                        $_SESSION['company']=$row['company'];
                        $_SESSION['equipment']=$row['equipment'];
                        $_SESSION['item']=$row['item'];
                        $_SESSION['quantity']=$row['quantity'];
                        $_SESSION['unit']=$row['unit'];
                        $_SESSION['item']=$row['item'];
                        $_SESSION['note']=$row['note'];
                        $date=$row['date'];
                        $depart=$row['depart'];
                        $myname=$row['myname'];
                        $fix_date=$row['fix_date'];
                        $company = $row['company'];
                        $equipment=$row['equipment'];
                        $item = $row['item'];
                        $quantity=$row['quantity'];
                        $unit=$row['unit'];
                        $fee=$row['fee'];
                        $note=$row['note'];
                   
                      ?>
                    <form  id="myform" name="myform" action="fix_jump.php?id=<?=$row["id"];?>" method="post" enctype="multipart/form-data">
                    
                     <div class="container"> 
                      
                     <br>
              
<div class="form-group row"  style="margin-top:48px;" >	
      
      <!--line 1-->
      <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
      <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff; " > </div> 
      
      <div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-5 "  >
            <label>填單日期:</label> 
            <input class="form-control" name="date" id="date" value="<?=$date;?>"  >
                        
      </div>	
      <div class="col-12 col-xs-12 col-sm-3 col-md-3 col-lg-3 mt-5 "  >
            <label>部門:</label> 
            <select class="form-control" name="depart" id="depart"   >
            <option value='<?=$depart;?>'selected><?=$depart;?></option>
                        <option value='廠務課'>廠務課</option>
                        <option value='設備維護課'>設備維護課</option>
                        <option value='拌合控制課'>拌合控制課</option>
                        <option value='進料課'>進料課</option>
                  </select>		 

      </div>	
      <div class="col-12 col-xs-12 col-sm-3 col-md-3 col-lg-3 mt-5">
            <label>名字</label>
            <select class="form-control" name="myname" id="myname">
            <option value='<?=$myname;?>'selected><?=$myname;?></option>
                  <option value="錢璟璘">錢璟璘</option>
                  <option value="蕭為豪">蕭為豪</option>
                  <option value="辜膺陵">辜膺陵</option>
                  <option value="余宗欣">余宗欣</option>
                  <option value="吳振濱">吳振濱</option>
            </select>
      </div>

      
      <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div>
      <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
      
      

      <!--line 2-->
      <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
      <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div> 
      <div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4 mt-3">
            <label>維修日期</label>
            <input type="date" class="form-control" name="fix_date" id="fix_date" value="<?=$fix_date;?>">
      </div>
      <div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4 mt-3 "  >
            <label>廠商：</label> 
            <input list="company" name="company" class="form-control"value="<?=$company;?>"></label>
            <datalist  name="company" id="company">
            
            <option value="友利">
                  <option value="台欣">
                  <option value="世興">
                  <option value="洽和">
                  <option value="聯瑀">
                  <option value="浚峰">
                  <option value="曾煥明">
                  <option value="勝功電機">
                  <option value="良順">
                  <option value="宏欣">
                  <option value="弘珈">
                  <option value="金運鴻">
                  <option value="展林">
                  <option value="榮隆輪胎">
                  <option value="昆銘">
                  <option value="東倫吊車">
                  <option value="(循興)高敏汽車電機">
                  <option value="祥亨企業行">
                  <option value="宗葆板車託運">
                  <option value="大煜橡膠">
                  <option value="駿榮企業社">
                  </datalist>
      </div>   
      

      <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div>
      <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
      
      <!--line 2-->
      <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
      <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div> 
      <div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4 mt-3">
            
            <label>設備：</label> 
            <input list="equipment" name="equipment" class="form-control" value="<?=$equipment;?>"></label>
            <datalist  name="equipment" id="equipment">
           
                        <option value="破碎機1">
                        <option value="粉碎機2">
                        <option value="污泥貯存區">
                        <option value="砂石皮帶區域">
                        <option value="CLSM入料口2">
                        <option value="截流溝集水井">
                        <option value="移動式抽水馬達">
                        <option value="怪手200-1號">
                        <option value="怪手200-2號">
                        <option value="怪手200-3號">
                        <option value="怪手200-5號">
                        <option value="怪手200-6號(唐榮)">
                        <option value="怪手200-7號">
                        <option value="怪手320-8號(燁聯)">
                        <option value="小山貓S130">
                        <option value="鏟裝機90-3型">
                        <option value="鏟裝機90-5型">
                        <option value="鏟裝機90-6型">
                        <option value="場內備用">
                        <option value="AHU-3829 3噸半">
                        <option value="空壓機">
                        <option value="廠區其他區域">
                        <option value="庫存備用品">

                  </datalist>
      </div>
      <div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4 mt-3 "  >
            <label>維修項目：</label> 
            <input list="item" name="item" class="form-control"value="<?=$item;?>"></label>
            <datalist  name="item" id="item">
           
                  <option value="1HP抽水馬達-1">
                  <option value="1HP抽水馬達-2">
                  <option value="1HP抽水馬達-3">
                  <option value="3HP抽水馬達-1">
                  <option value="3HP抽水馬達-2">
                  <option value="3HP抽水馬達-3">
                  <option value="砂石皮帶">
                  <option value="破碎機輸送帶-平行">
                  <option value="破碎機輸送帶-斜行">
                  <option value="破碎機齒刀片">
                  <option value="破(粉)碎機零件">
                  <option value="馬達">
                  <option value="線路檢修">
                  <option value="保養 換機油等">
                  <option value="引擎類">
                  <option value="壓縮機(冷氣)">
                  <option value="重機具輪胎">
                  <option value="輪胎耗材">
                  <option value="拆裝工資">
                  <option value="其他零件維修類">
                  <option value="牛油、機油系列">
                  <option value="震動篩網2">
                  <option value="輪胎">
                  <option value="吊車及機具託運費用">
                  <option value="增購機具">
            </datalist>
      </div>   
      

      <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div>
      <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
      
      
      <!--line 3-->
      <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
      <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div> 
      
      <div class="col-12 col-xs-12 col-sm-3 col-md-3 col-lg-3 mt-3 "  >
            <label>數量：</label> 
            <input type="number" name="quantity" id="quantity" class="form-control" value="<?=$quantity;?>"> 
            
      </div>   
      <div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-3 "  >
            <label>單位：</label> 
            <input list="unit" name="unit" class="form-control"value="<?=$unit;?>"></label>
            <datalist  name="unit" id="unit">
            
                  <option value="台">
                  <option value="包">
                  <option value="個">
                  <option value="升">
                  <option value="加侖">
                  </datalist>

      </div>   
      <div class="col-12 col-xs-12 col-sm-3 col-md-3 col-lg-3 mt-3 "  >
            <label>費用：</label> 
            <input type="number" name="fee" id="fee" class="form-control" value="<?=$fee;?>"> 
            
      </div>

      <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div>
      <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
      <!--line4-->
      <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
      <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff; " > </div> 
      
      <div class="col-12 col-xs-12 col-sm-8 col-md-8 col-lg-8 mt-2 mb-2">
            <label>備註：</label> 
            <textarea class="form-control" name="note" id="note" value=""><?=$note;?></textarea>
      </div>	
      
      <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div>
      <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
      
      
      <!--here-->


      <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"   > </div>
      <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff; border-radius:10px;" > </div>

            <div class="col-12 col-xs-12 col-sm-8 col-md-8 col-lg-8 mt-5 mb-2"  ><center>
            <button type="submit" name="submit" class="btn " style="margin-bottom:48px;" onmousedown="this.style.background='#009761';" >報修新增</button>
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
      
        $date=$_POST['date'];
        $depart=$_POST['depart'];
        $myname=$_POST['myname'];
        $fix_date=$_POST['fix_date'];
        $company = $_POST['company'];
        $equipment=$_POST['equipment'];
        $item = $_POST['item'];
        $quantity=$_POST['quantity'];
        $unit=$_POST['unit'];
        $fee=$_POST['fee'];
        $note=$_POST['note'];
        $name = $_SESSION['acc'];
        if (strpos($company, '-')== false) {
		 
      }
      else{
       $tmp_company = explode("-", $company);
       $company=$tmp_company[1];
      }
         $sql = "update `fix_form` set status='R' where id='$cid ' ";
         mysqli_query($db, $sql);
         $sqlRN="insert into fix_form (`date`,`depart`,`myname`,`fix_date`,`equipment`,`item`,`company`,`quantity`,`unit`,`fee`,`note`,`status`) values 
         ('$date','$depart','$myname','$fix_date','$equipment','$item','$company','$quantity','$unit','$fee','$note','RN')";
          
       mysqli_query($db, $sqlRN);                  
      echo '<script language="javascript">';
				 
      echo "window.location.href='fix_show.php'";
      echo '</script>';
    
    }  
    
    
  
	 
			 mysqli_close($db);	
		   ?>
	</div>
</body>
</html>