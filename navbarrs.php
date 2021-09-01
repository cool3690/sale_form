<style>
 /*rtlist_select*/
 
 

@media (min-width: 950px) and (max-width: 4000px) { 


#bt {

-webkit-border-radius: 20px;

-moz-border-radius: 20px;

border-radius: 20px;
border: 2px solid;
border-color:#FFE53b;
margin-top:-10px;

}
nav{	 
background: linear-gradient(to right, #ff6b24,#FFE53b);
overflow:hidden;
}


 
 
#navbardrop::after {
    content: '';
    display: block;
    width: 0;
    height:3px;
    background: #ff6b24  !important;
    transition: width 1s;
}

#navbardrop:hover::after {
    width: 100%;
    transition: width 1s;
}
 .nav-item.myactive::before {
  content: "";
  display: block;
  
  width: 50%;
  height: 65%;
  
  position: absolute;
  bottom: 0px;
  left: -50%;
   border-top-left-radius: 99%;
  border-bottom-right-radius: 50%;
   box-shadow: 8px 8px 0 0 white;
}
.nav-item.myactive::after {
  content: "";
  display: block;
  
  width: 50%;
  height: 65%;
  
  position: absolute;
  bottom: 0px;
  left: 100%;
  
  border-bottom-left-radius: 50%;
  box-shadow: -8px 8px 0 0 white;
}


/*here*/
.myactive{
	background-color:#FFF !important;
	 
	 border-top-left-radius: 15px;
border-top-right-radius: 15px;
 
border-bottom-left-radius: 0px;
    height:60px;
  
	}
.cle{
	 
	padding-bottom: 2px;
   
	margin-right:3px;
	margin-left:3px;
   
}
.up{
	margin-top:-12px;
}	
.myset{
	 
	margin-right:10px;
	margin-left:10px;
}

 
 
.nav-link{
	font-weight:450;
	font-size:22px;
}
.tex{
	font-weight:450;
	 margin-top:-15px;
}

.navstyle{
	 padding-left: 8%;
 // margin-right: calc(-100vw / 2 + 500px / 2);
	//padding-left:150px;
	padding-right:150px;
	padding-bottom:0px;
}
}

@media (min-width: 450px) and (max-width: 949px) {
nav{	 

background: linear-gradient(to right,  #ff6b24,#FFE53b);
}
 .navbar-collapse {
  display: flex;
  flex-wrap: nowrap;
}

.navbar-nav {
  flex-direction: row;
} 

#bt {
  
border: 1px solid;
border-color:#FFE53b;
margin-left:10px;
font-size: 3px;

}


 
#navbardrop::after {
    content: '';
    display: block;
    width: 0;
    height:3px;
    background: #ff6b24  !important;
    transition: width 1s;
}

#navbardrop:hover::after {
    width: 100%;
    transition: width 1s;
}
/* here*/
 .nav-item.myactive::before {
  content: "";
  display: block;
  
  width: 50%;
  height: 65%;
  
  position: absolute;
  bottom: 0px;
  left: -50%;
   border-top-left-radius: 99%;
  border-bottom-right-radius: 50%;
   box-shadow: 8px 8px 0 0 white;
}
.nav-item.myactive::after {
  content: "";
  display: block;
  
  width: 50%;
  height: 65%;
  
  position: absolute;
  bottom: 0px;
  left: 100%;
  
  border-bottom-left-radius: 50%;
  box-shadow: -8px 8px 0 0 white;
}


/*here*/
.myactive{
	background-color:#FFF !important;
	 
	 border-top-left-radius: 15px;
border-top-right-radius: 15px;
 
border-bottom-left-radius: 0px;
    height:50px;
	// width:100px;
	 
 
	}
 
 .navstyle{
	padding-left: 0px;
	padding-right: 0px;
	padding-bottom:0px; 
}  
.up {
        display: none !important;
    }
#bt{  
	 margin-top:-15px;
}  
.textset{
	//font-size:12px;
	//font-weight:light;
//	margin-left:-15px;
}
 
} 
 
 @media (min-width: 0px) and (max-width: 449px) {
nav{	 

background: linear-gradient(to right,  #ff6b24,#FFE53b);
}
 .navbar-collapse {
  display: flex;
  flex-wrap: nowrap;
}

.navbar-nav {
  flex-direction: row;
} 

#bt {
  
border: 1px solid;
border-color:#FFE53b;
margin-left:10px;
font-size: 3px;

}


 
#navbardrop::after {
    content: '';
    display: block;
    width: 0;
    height:3px;
    background: #ff6b24  !important;
    transition: width 1s;
}

#navbardrop:hover::after {
    width: 100%;
    transition: width 1s;
}
/* here*/
 .nav-item.myactive::before {
  content: "";
  display: block;
  
  width: 50%;
  height: 65%;
  
  position: absolute;
  bottom: 0px;
  left: -50%;
   border-top-left-radius: 99%;
  border-bottom-right-radius: 50%;
   box-shadow: 8px 8px 0 0 white;
}
.nav-item.myactive::after {
  content: "";
  display: block;
  
  width: 50%;
  height: 65%;
  
  position: absolute;
  bottom: 0px;
  left: 100%;
  
  border-bottom-left-radius: 50%;
  box-shadow: -8px 8px 0 0 white;
}


/*here*/
.myactive{
	background-color:#FFF !important;
	 
	 border-top-left-radius: 15px;
	border-top-right-radius: 15px;
	 
	border-bottom-left-radius: 0px;
    height:50px;
	  width:80px;
	 
 
	}
 
 .navstyle{
	padding-left: 0px;
	padding-right: 0px;
	padding-bottom:0px; 
}  
.up {
        display: none !important;
    }
#bt{  
	 margin-top:-15px;
}  
.textset{
	//font-family:MingLiU;
	//letter-spacing: 0px;　
	// font-size:3px;
	//font-weight:light;
 	margin-left:-35px;
}
 
} 
</style>
<?php
//是否為行動裝置
function isMobileCheck(){
    //Detect special conditions devices
    $iPod = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
    $iPhone = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
    $iPad = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
    if(stripos($_SERVER['HTTP_USER_AGENT'],"Android") && stripos($_SERVER['HTTP_USER_AGENT'],"mobile")){
        $Android = true;
    }else if(stripos($_SERVER['HTTP_USER_AGENT'],"Android")){
        $Android = false;
        $AndroidTablet = true;
    }else{
        $Android = false;
        $AndroidTablet = false;
    }
    $webOS = stripos($_SERVER['HTTP_USER_AGENT'],"webOS");
    $BlackBerry = stripos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
    $RimTablet= stripos($_SERVER['HTTP_USER_AGENT'],"RIM Tablet");
    //do something with this information
    if( $iPod || $iPhone || $iPad || $Android || $AndroidTablet || $webOS || $BlackBerry || $RimTablet){
        return true;
    }else{
        return false;
    }
} 
?>

<?php
    if(isMobileCheck()){//是行動裝置
	 ?>
	   
<nav class="navbar navbar-expand-sm bg-transparent navstyle" id="navbar"   style=" padding-bottom:0px;">
	 
	<div class=" navbar-collapse mt-3" id="navbarSupportedContent" >
	<a href="index.php"  style="margin-top:-10px; z-index:999;" ><img src="images/012.png" width="50"  height="50"/></a>&emsp;
		<ul class="navbar-nav mr-auto">
			<?php
			 $var=0;
			 
			
			//echo $var ;
			if(1==1){	
				if(1==1){	
//使用者登入											
						?>   <!--/*rtlist*/-->
                            	 		
					 
						<li class="nav-item dropdown"  style="margin-left:-25px; " >
								<a class=" nav-link " id="navbardrop" href="rtlist.php?status_title=<?php echo $a=1; ?>"><div class="textset"><font size="1"> 聯單申報</font></div></a>
							</li>
						&emsp;
							<li class="nav-item dropdown myactive " style="margin-left:-55px;">
								<a class=" nav-link  myset" id="navbardrop" href="rtlist_select.php?status_title=<?php echo $a=1; ?>"  ><div class="cle textset"><font size="1">聯單紀錄</font></div> </a>
							</li>&emsp;	
							
							
						<?php	
				}else{	
//未登入				
					?>		
							<li class="nav-item  dropdown"  style="margin-left:-25px;">
								<a class=" nav-link " id="navbardrop" href="rtlist.php?status_title=<?php echo $a=2; ?>"><div class=" textset"><font size="1"> 聯單申報</font></div></a>
							</li>
						&emsp;
						<!--
							<li class="nav-item dropdown myactive "  style="margin-left:-55px;">
								<a class=" nav-link myset" id="navbardrop" href="clelist_select.php?status_title=2"  ><div class="cle textset"><font size="1">聯單紀錄</font></div></a>
							</li>&emsp;
							-->
					<?php	
				}
			}else{
				if($var==1){
					echo '<script language="javascript">';
					echo 'alert("尚未有權限，請進行登入！");';
					echo "window.location.href='login.php'";
					echo '</script>';	
				}
				else if($var==2){
					echo '<script language="javascript">';
					echo 'alert("尚未有權限，請進行登入！");';
					echo "window.location.href='login2.php'";
					echo '</script>';
				}		
			}
			?>	
			  
			
		</ul><a class=" btn btn-light" href="logout.php" id="bt" style="margin-left:-25px; margin-top:-10px;"><i class="fas fa-sign-out-alt  "></i><font size="1;">登出</font></a>
		 
		<?php
		 
		?>
	</div>
</nav>
	 
	 <?php
        
    }else{//不是行動裝置
     ?>    
	 
<nav class="navbar navbar-expand-xl navbar-expand-sm navbar-expand-md navbar-expand-lg bg-transparent navstyle" id="navbar" style="padding-bottom:0px;">
 
	<div class=" navbar-collapse mt-3" id="navbarSupportedContent" style=" top:10px;"><a href="index.php"  ><img src="images/012.png" width="60"  height="60" style="margin-top:-10px;"/></a>&emsp;
		<ul class="navbar-nav mr-auto">
			<?php
			 $var=0;
			 if(isset($_GET['status_title'])){
				 $var = $_GET['status_title'];
			 }
			
			//echo $var ;
			if(1==1){	
				if(1==1){	
//使用者登入											
						?>   <!--/*rtlist*/-->
                            	 		
					 
						<li class="nav-item dropdown">
								<a class=" nav-link" id="navbardrop" href="rtlist.php?status_title=<?php echo $a=1; ?>">聯單申報</a>
							</li>
						&emsp;
							<li class="nav-item dropdown  myactive ">
								<a class=" nav-link  myset" id="navbardrop" href="rtlist_select.php?status_title=<?php echo $a=1; ?>"><div class="cle">聯單紀錄</div></a>
							</li>&emsp;	
							
							
						<?php	
				}else{	
//未登入				
					?>		
							<li class="nav-item dropdown">
								<a class=" nav-link" id="navbardrop" href="rtlist.php?status_title=<?php echo $a=2; ?>">聯單申報</a>
							</li>
						&emsp;
						<!--
							<li class="nav-item dropdown myactive">
								<a class=" nav-link myset" id="navbardrop" href="clelist_select.php?status_title=2;"><div class="cle">聯單紀錄</div></a>
							</li>&emsp;
							-->
					<?php	
				}
			}else{
				if($var==1){
					echo '<script language="javascript">';
					echo 'alert("尚未有權限，請進行登入！");';
					echo "window.location.href='login.php'";
					echo '</script>';	
				}
				else if($var==2){
					echo '<script language="javascript">';
					echo 'alert("尚未有權限，請進行登入！");';
					echo "window.location.href='login2.php'";
					echo '</script>';
				}		
			}
			?>	
		</ul>
		<?php
			if(@$_SESSION['account']!=null){	 
				echo '<div class=" text-dark pr-3 up" style="font-size:18px; margin-top=-40px;" ><span class="tex">'.$_SESSION['company'].'，您好</span></div>
					<a class=" btn btn-light" href="logout.php" id="bt" ><i class="fas fa-sign-out-alt pr-3  "></i>登出</a>	';	
			}
		?>
	</div>
</nav>
	 
		<?php
    }
?>
