<html>
<head>
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=big5">
</head>

<body>
<h2 align=center>動態下拉式選單：兩框連動（兩層樹狀選項）</h2>
<hr>

<script>
department=new Array();
department[0]=["張隆紋", "黃能富", "王炳豐", "張世杰", "張智星"];	// 資訊系
department[1]=["黃瑞星", "黃仲陵", "呂忠津", "鄭博泰", "盧向成"];	// 電機系
department[2]=["楊敬堂", "王培仁", "葉銘權", "宋鎮國"];			// 動機系
department[3]=["王天戈", "開執中", "梁正宏"];				// 工科系

function renew(index){
	for(var i=0;i<department[index].length;i++)
		document.myForm.member.options[i]=new Option(department[index][i], department[index][i]);	// 設定新選項
	document.myForm.member.length=department[index].length;	// 刪除多餘的選項
}
</script>

<form name="myForm">
系別：
<select  onChange="renew(this.selectedIndex);">
	<option value="資訊系">資訊系
	<option value="電機系">電機系
	<option value="動機系">動機系
	<option value="工科系">工科系
</select>

隊員：
<select name="member"  >
<option value="資訊系">資訊系
	<option value="電機系">電機系
	<option value="動機系">動機系
	<option value="工科系">工科系
</select>
</form>

<hr>
</body>
</html>
