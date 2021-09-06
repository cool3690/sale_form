<?php 
	function line_call($state,$book_date,$company,$place,$work_case,$strength,$quantity,$work_type,$code,$qc,$user,$tel,$delivery,$sale,$note) { 
		$token = "tPYQS1mWhyKSNtupjLAS7ZKmRkPOUuyqGTmi5xWuscm";
		$message ="\n".$state."\n業務:".$sale."\n出貨時間:".$delivery.$code."\n公司:".$company."\n地點:".$place.
		"\n工程名稱:".$work_case."\n強度:".$strength."\n數量:".$quantity."方"."\n施工方式：".$work_type.
		"\n品管：".$qc."\n聯絡人：".$user."\n電話：".$tel."\n訂貨日期：".$book_date."\n備註:".$note;
		$curl = curl_init(); 
		curl_setopt($curl, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0); 
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); 
		curl_setopt($curl, CURLOPT_POST, 1); 
		curl_setopt($curl, CURLOPT_POSTFIELDS, "message=$message"); 
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); 
		$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$token.'',); 
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers); 
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
		$result = curl_exec($curl); 
		 
		curl_close($curl);      
	}
?>