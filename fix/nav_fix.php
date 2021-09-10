<link rel="stylesheet" href="../css/nav_show.css"/>
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
<script>
	$(function(){
	if($(window).width()<480){ //當視窗小於480時才運作
	$('.navbar a').on('click', function(){
		$('.navbar-toggle').click();
	});
	}
	});
</script>
<?php
    if(isMobileCheck()){//是行動裝置
	 ?>
	 
		<div style="background-color:#00E492; height:38px;">
		  <a href="new_fix.php"  ><img class="PC_img" align="left"  src="../images/logo.png" width="23"  height="17" /></a>
		 <center style="text-align: center;vertical-align: middle; ">
		 <font class="PC_font" color="#FFFFFF "style="font-family: Roboto;"> 全興報修單</font></center>
	 </div>
	 
	 

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"> </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="new_fix.php">
			<font color="black"><b>
				<center>報修表單</center>
			</b></font></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="fix_show.php">
		<font color="black"><b><center>報修紀錄</center></b></font></a>
      </li>
      
    </ul>
    
  </div>
</nav>
	 
	 <?php
        
    }else{//不是行動裝置
     ?>    
	 <div style="background-color:#00E492; height:54px;">
		  <a href="new_fix.php"  ><img class="PC_img" align="left"  src="../images/logo.png"   width="40"  height="30" /></a>
		 <center style="text-align: center;vertical-align: middle; ">
		 <font class="PC_font" color="#FFFFFF "style="font-family: Roboto;"> 全興報修單</font></center>
	 </div>  
	 
<nav class="navbar navbar-expand-xl navbar-expand-sm navbar-expand-md navbar-expand-lg bg-transparent navstyle  pc_nav" id="navbar" >
 
	<div class=" navbar-collapse mt-3 " id="navbarSupportedContent" >  
		<ul class="navbar-nav mr-auto pc_navlu">
			 
                            	 		
		<li><font color="white" style="opacity: 0;">0</font> </li>
						<li class="nav-item pc_new">
								<a class=" nav-link myset" id="navbardrop" href="new_fix.php">
									 
										<font color="black"><b><center>報修表單</center></b></font> </a>
							</li>
						&emsp;
							<li class="nav-item  pc_rec">
								<a class=" nav-link ss" id="navbardrop" href="fix_show.php">
								<font color="black"><b><center style=" ">報修紀錄</center></b></font></a>
							</li>&emsp;
							
							
						<?php	
				 
		 
			?>	
		</ul>
		 
	</div>
</nav>
	 
		<?php
    }
?>
