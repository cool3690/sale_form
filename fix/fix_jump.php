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
            <label>????????????:</label> 
            <input class="form-control" name="date" id="date" value="<?=$date;?>"  >
                        
      </div>	
      <div class="col-12 col-xs-12 col-sm-3 col-md-3 col-lg-3 mt-5 "  >
            <label>??????:</label> 
            <select class="form-control" name="depart" id="depart"   >
            <option value='<?=$depart;?>'selected><?=$depart;?></option>
                        <option value='?????????'>?????????</option>
                        <option value='???????????????'>???????????????</option>
                        <option value='???????????????'>???????????????</option>
                        <option value='?????????'>?????????</option>
                  </select>		 

      </div>	
      <div class="col-12 col-xs-12 col-sm-3 col-md-3 col-lg-3 mt-5">
            <label>??????</label>
            <select class="form-control" name="myname" id="myname">
            <option value='<?=$myname;?>'selected><?=$myname;?></option>
                  <option value="?????????">?????????</option>
                  <option value="?????????">?????????</option>
                  <option value="?????????">?????????</option>
                  <option value="?????????">?????????</option>
                  <option value="?????????">?????????</option>
            </select>
      </div>

      
      <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div>
      <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
      
      

      <!--line 2-->
      <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
      <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div> 
      <div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4 mt-3">
            <label>????????????</label>
            <input type="date" class="form-control" name="fix_date" id="fix_date" value="<?=$fix_date;?>">
      </div>
      <div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4 mt-3 "  >
            <label>?????????</label> 
            <input list="company" name="company" class="form-control"value="<?=$company;?>"></label>
            <datalist  name="company" id="company">
            
            <option value="??????">
                  <option value="??????">
                  <option value="??????">
                  <option value="??????">
                  <option value="??????">
                  <option value="??????">
                  <option value="?????????">
                  <option value="????????????">
                  <option value="??????">
                  <option value="??????">
                  <option value="??????">
                  <option value="?????????">
                  <option value="??????">
                  <option value="????????????">
                  <option value="??????">
                  <option value="????????????">
                  <option value="(??????)??????????????????">
                  <option value="???????????????">
                  <option value="??????????????????">
                  <option value="????????????">
                  <option value="???????????????">
                  </datalist>
      </div>   
      

      <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div>
      <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
      
      <!--line 2-->
      <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
      <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div> 
      <div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4 mt-3">
            
            <label>?????????</label> 
            <input list="equipment" name="equipment" class="form-control" value="<?=$equipment;?>"></label>
            <datalist  name="equipment" id="equipment">
           
                        <option value="?????????1">
                        <option value="?????????2">
                        <option value="???????????????">
                        <option value="??????????????????">
                        <option value="CLSM?????????2">
                        <option value="??????????????????">
                        <option value="?????????????????????">
                        <option value="??????200-1???">
                        <option value="??????200-2???">
                        <option value="??????200-3???">
                        <option value="??????200-5???">
                        <option value="??????200-6???(??????)">
                        <option value="??????200-7???">
                        <option value="??????320-8???(??????)">
                        <option value="?????????S130">
                        <option value="?????????90-3???">
                        <option value="?????????90-5???">
                        <option value="?????????90-6???">
                        <option value="????????????">
                        <option value="AHU-3829 3??????">
                        <option value="?????????">
                        <option value="??????????????????">
                        <option value="???????????????">

                  </datalist>
      </div>
      <div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4 mt-3 "  >
            <label>???????????????</label> 
            <input list="item" name="item" class="form-control"value="<?=$item;?>"></label>
            <datalist  name="item" id="item">
           
                  <option value="1HP????????????-1">
                  <option value="1HP????????????-2">
                  <option value="1HP????????????-3">
                  <option value="3HP????????????-1">
                  <option value="3HP????????????-2">
                  <option value="3HP????????????-3">
                  <option value="????????????">
                  <option value="??????????????????-??????">
                  <option value="??????????????????-??????">
                  <option value="??????????????????">
                  <option value="???(???)????????????">
                  <option value="??????">
                  <option value="????????????">
                  <option value="?????? ????????????">
                  <option value="?????????">
                  <option value="?????????(??????)">
                  <option value="???????????????">
                  <option value="????????????">
                  <option value="????????????">
                  <option value="?????????????????????">
                  <option value="?????????????????????">
                  <option value="????????????2">
                  <option value="??????">
                  <option value="???????????????????????????">
                  <option value="????????????">
            </datalist>
      </div>   
      

      <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div>
      <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
      
      
      <!--line 3-->
      <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
      <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div> 
      
      <div class="col-12 col-xs-12 col-sm-3 col-md-3 col-lg-3 mt-3 "  >
            <label>?????????</label> 
            <input type="number" name="quantity" id="quantity" class="form-control" value="<?=$quantity;?>"> 
            
      </div>   
      <div class="col-12 col-xs-12 col-sm-2 col-md-2 col-lg-2 mt-3 "  >
            <label>?????????</label> 
            <input list="unit" name="unit" class="form-control"value="<?=$unit;?>"></label>
            <datalist  name="unit" id="unit">
            
                  <option value="???">
                  <option value="???">
                  <option value="???">
                  <option value="???">
                  <option value="??????">
                  </datalist>

      </div>   
      <div class="col-12 col-xs-12 col-sm-3 col-md-3 col-lg-3 mt-3 "  >
            <label>?????????</label> 
            <input type="number" name="fee" id="fee" class="form-control" value="<?=$fee;?>"> 
            
      </div>

      <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div>
      <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
      <!--line4-->
      <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
      <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff; " > </div> 
      
      <div class="col-12 col-xs-12 col-sm-8 col-md-8 col-lg-8 mt-2 mb-2">
            <label>?????????</label> 
            <textarea class="form-control" name="note" id="note" value=""><?=$note;?></textarea>
      </div>	
      
      <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff;" > </div>
      <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  > </div> 
      
      
      <!--here-->


      <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"   > </div>
      <div class="col-12 col-xs-12 col-sm-1 col-md-1 col-lg-1"  style="background-color:#fff; border-radius:10px;" > </div>

            <div class="col-12 col-xs-12 col-sm-8 col-md-8 col-lg-8 mt-5 mb-2"  ><center>
            <button type="submit" name="submit" class="btn " style="margin-bottom:48px;" onmousedown="this.style.background='#009761';" >????????????</button>
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