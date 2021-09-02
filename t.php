<!DOCTYPE html>
<html lang="en">
  <head>
   	  
  </head>
   
<script type="text/javascript">
	 
	function show_book_num(a)
	{    
		var result=document.getElementById('company').value;
		 
		  var words="";
		if (window.XMLHttpRequest)
			{// IE7+, Firefox, Chrome, Opera, Safari  
				xmlhttp=new XMLHttpRequest();
			}
		 
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{    words =xmlhttp.responseText.split("\n");
				  
				//document.getElementById('case-list').empty();
				var datalist = document.getElementById('case-list');
				 
				//datalist.remove(0);
				while (datalist.firstChild) {
					datalist.removeChild(datalist.firstChild);
				}
				for(var i=0;i<words.length-1;i++)
				 	{	 
						 var option1 = document.createElement("option");
						 option1.value = words[i];
						 
						 datalist.appendChild(option1);
					 } 
				 
			}
		} 
		xmlhttp.open("GET","sql_company.php?q="+result,true);
		xmlhttp.send();
	}
	 
	</script>	
	  
</head>
 
<body> 
<div class="container">
 
 

	<form  id="myform" name="myform" action="t.php" method="post" enctype="multipart/form-data">
    
   <div class="container" > 
<div class="form-group row"   >	
<?php 
require 'db_login.php';	// where delivery='$date' and status in('N','RN')
?>
	 <!--line 1-->
	 
		 
	 <div class="col-12 col-xs-12 col-sm-4 col-md-4 col-lg-4 mt-2 mb-2"  >
		   <label>客戶：</label> 
		   <input list="company-list" id="company" class="form-control" onchange="show_book_num(this.id)"> 
		   <datalist  id="company-list"   >  
		   
    	   <?php
					$sql_search2 = "select company from `customer`";
						$result_n = mysqli_query($db, $sql_search2);
						
						while ($row = mysqli_fetch_array($result_n)) {
				?>
						<option value="<?=$row['company'];?>">
				<?php
						}
				?>
 
			</datalist>

	 </div>
	 
	  <!--line 3-->
	  
	 <div class="col-12 col-xs-12 col-sm-8 col-md-8 col-lg-8 mt-2 mb-2">
	   <label>購買紀錄：</label>
	 <input list="case-list" id="work_case" class="form-control"  > 
		   <datalist  id="case-list"   >
		    
			</datalist>
	   
	 </div>
  
</form>  
</div>
 
</body>
</html>
