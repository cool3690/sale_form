<style>
 /*rec*/
 

 @media (min-width: 601px) and (max-width: 4000px) { 
 
 nav{	 
 background: linear-gradient(to right,  #fff,#fff);

 overflow:hidden;
 }
  
 #navbardrop::after {
	 content: '';
	 display: block;
	 width: 0;
	 height:3px;
	 background: #00d550  !important;
	 transition: width 1s;
 }

 
 #navbardrop:hover  {
	 background-color:#ACF0CB !important;
	  
 }
 .PC_img{
	 margin-left:110px;
	 margin-top:11px;
 }
 .PC_font{
	 margin-left:-100px;
	 font-size:28px;
	  
	 text-align: center;
 }
 center{
	 padding-top:5px;
 }
 .pc_new{
	 background-color:#fff !important;
	  margin-top:-20px;
	 height:48px;
	 width:130px;
	  
 } 
  
 .pc_nav{
	box-shadow: -1px 0px 10px 5px rgba(0, 228, 146, 0.2);
	  overflow:hide;
	height:48px;
 } 
 .pc_rec{
	 margin-top:-20px;
	 width:130px;
	 height: 48px;
	 border-bottom: 3px solid #00E492;	 
 }
}

@media (min-width: 450px) and (max-width: 600px) {
 nav{	 
	 background: linear-gradient(to right,  #fff,#fff);

 }
 .navbar-collapse {
   display: flex;
   flex-wrap: nowrap;
 }

 .navbar-nav {
   flex-direction: row;
 } 
  
 #navbardrop::after {
	 content: '';
	 display: block;
	 width: 0;
	 height:3px;
	 background: #00d550  !important;
	 transition: width 1s;
 }
 #navbardrop:hover  {
	 background-color:#ACF0CB !important;
	 margin-top:1px ;
	 height: 48px;
 }
 
  .PC_img{
	 margin-left:50px;
	 margin-top:11px;
 }
 .PC_font{
	  
	 margin-left:-50px;
	  
	 font-size:28px;
	 text-align: center;
 } 
 center{
	 padding-top: 5px;
 }
 .pc_new{
	 margin-top:-30px;
	 
	 width:130px;
	 height: 48px;
 } 
 .pc_nav{
	box-shadow: -1px 0px 10px 5px rgba(0, 228, 146, 0.2);
	  overflow:hide;
	height:48px;
 } 
 .pc_rec{
	 margin-top:-30px;
	 width:130px;
	 height: 48px;
	 border-bottom: 3px solid #00E492;	 
 }
} 
 
@media (min-width: 0px) and (max-width: 449px) {
	nav{	 
		background: linear-gradient(to right,  #fff,#fff);
	}
	.PC_img{
		margin-left:50px;
		margin-top:12px;
	}
	.PC_font{
		 
		margin-left:-50px;
		font-size:16px;
		text-align: center;
	} 
	center{
		padding-top: 8px;
	}
	 
	.pc_new{
		background-color:#fff !important;
		 
        height:80px;
		width:68px;
		overflow:hidden;　
	} 
	.pc_nav{
		box-shadow: -1px 0px 10px 5px rgba(0, 228, 146, 0.2);
		 overflow:hide;
       height:32px;
	   border-bottom: 3px solid #00E492;	 
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
		  <a href="index.php"  ><img class="PC_img" align="left"  src="../images/logo.png" width="23"  height="17" /></a>
		 <center style="text-align: center;vertical-align: middle; ">
		 <font class="PC_font" color="#FFFFFF "style="font-family: Roboto;"> 全興合約系統</font></center>
	 </div>   
		
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"> </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="new_record.php">
			<font color="black"><b>
				<center>新增訂單</center>
			</b></font></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="erp_show.php">
		<font color="black"><b><center>訂單紀錄</center></b></font></a>
      </li>
      
    </ul>
    
  </div>
</nav>
	 
	 
	 <?php
        
    }else{//不是行動裝置
     ?>    
	  <div style="background-color:#00E492; height:54px;">
		  <a href="index.php"  ><img class="PC_img" align="left"  src="../images/logo.png"   width="40"  height="30" /></a>
		 <center style="text-align: center;vertical-align: middle; ">
		 <font class="PC_font" color="#FFFFFF "style="font-family: Roboto;"> 全興合約系統</font></center>
	 </div>   
	 
	 <nav class="navbar navbar-expand-xl navbar-expand-sm navbar-expand-md navbar-expand-lg bg-transparent navstyle  pc_nav" id="navbar" >
 
 <div class=" navbar-collapse mt-3 " id="navbarSupportedContent" > <img src="../images/logo.png" style="opacity: 0;"width="46"  height="30"  /> &emsp;
	 <ul class="navbar-nav mr-auto ">
		  
									  
	 <li><font color="white" style="opacity: 0;">0000</font> </li>
					 <li class="nav-item pc_new">
							 <a class=" nav-link myset" id="navbardrop" href="new_record.php">
								  
									 <font color="black"><b><center>新增訂單</center></b></font> </a>
						 </li>
					 &emsp;
						 <li class="nav-item  pc_rec">
							 <a class=" nav-link ss" id="navbardrop" href="erp_show.php">
							 <font color="black"><b><center style=" ">訂單紀錄</center></b></font></a>
						 </li>&emsp;
						 
						 
					 <?php	
			  
	  
		 ?>	
	 </ul>
	  
 </div>
</nav>
		<?php
    }
?>
