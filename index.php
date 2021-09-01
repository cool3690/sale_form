
<!DOCTYPE html>
<html>
    <head>
    <?php include_once ("head.php"); ?>	
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <style>
    body{
        font-family:微軟正黑體;
    }
  
</style>

    <body>
    <font size="7"><center>訂單登入系統</font> </br> </br> 
    
<div class="container">
       <form class="form-horizontal" action="index.php" method = "post">
    <div class="form-group">


      <label class="control-label col-sm-4" for="acc"><font size="4">帳號：</label>
      <div class="col-sm-4">

    <?php if(isset($_COOKIE['account'])){
    ?>
					 <input type="account" class="form-control"   placeholder="帳號" id="acc"  name="acc" value='<?php echo $_COOKIE['account'];?>'  require>
					 <?php
            }
					 else{
          ?>
					  <input type="account" class="form-control"   placeholder="帳號" id="acc"  name="acc" value=''   require>
					<?php	 
					 }
					 ?>
 
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="pwd">密碼：</label>
      <div class="col-sm-4"> 
        
      <?php if(isset($_COOKIE['passwd'])){?>
					 <input type="password" class="form-control"  placeholder="密碼" id="pwd"  name="pwd" value='<?php echo $_COOKIE['passwd'];?>'  require>
					 <?php }
					 else{?>
					<input type="password" class="form-control"  placeholder="密碼" id="pwd"  name="pwd" value='' required>
					<?php	 
					 }
					 ?>
        
      </div>
    </div>
   
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-8">
        <button type="submit" name="submit" class="btn btn-default"  >登入</button>
      </div>
    </div>
  </form>
<?php
require 'db_login.php';
	 
	 $_SESSION['acc']="yyyyy";

   if(isset($_COOKIE['account']) && isset($_COOKIE['passwd'])){
    $acc =$_COOKIE['account'];
    $pwd=$_COOKIE['passwd'];
    setcookie('account',$acc,time()+21600*30);
    setcookie('passwd',$pwd,time()+21600*30);
   
    //  session_register('acc');
    $sql = "select* from emp where emp_id='$acc' and pwd='$pwd' ";
    $result = mysqli_query($db,$sql);
     
    while ($row = mysqli_fetch_array($result)) {
   $_SESSION['acc']= $acc;
      echo  $_SESSION['acc']."歡迎登入!";
     echo "<script type='text/javascript'>window.top.location='new_form.php';</script>"; exit;
    }

  }
	else if(isset($_POST['submit'])){
      $acc = $_POST['acc'];
      $pwd=$_POST['pwd'];
      setcookie('account',$acc,time()+21600*30);
      setcookie('passwd',$pwd,time()+21600*30);
    
      //  session_register('acc');
      $sql = "select* from emp where emp_id='$acc' and pwd='$pwd' ";
      $result = mysqli_query($db,$sql);
      
      while ($row = mysqli_fetch_array($result)) {
         $_SESSION['acc']= $acc;
         echo  $_SESSION['acc']."歡迎登入!";
         echo "<script type='text/javascript'>window.top.location='new_form.php';</script>"; exit;
      }

  }

?>
 
        </div>
    </body>
</html>

</html>