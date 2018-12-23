<?php
include "megtekintesvedelem.php";
include "frissites.php";
if(isset($_POST["kilepes"])){
	header("location: kilepes.php");
}
?>
<html>
<head>
	<title>My System</title>
	<META charset='utf-8'>
	<link rel="stylesheet" href="../design/home.css">
<script type="text/javascript">
	nd=new Date('<?=date('F j, Y H:i:s')?>')
	function st(){
	nd.setSeconds(nd.getSeconds()+1)
	sd1=nd.getFullYear()
	sd2=nd.getMonth()+1
	if(sd2<10){sd2='0'+sd2}
	sd3=nd.getDate()
	if(sd3<10){sd3='0'+sd3}
	sd4=nd.getHours()
	if(sd4<10){sd4='0'+sd4}
	sd5=nd.getMinutes()
	if(sd5<10){sd5='0'+sd5}
	sd6=nd.getSeconds()
	if(sd6<10){sd6='0'+sd6}
	document.getElementById('nd').innerHTML=' Szerver ido : '+sd1+'.'+sd2+'.'+sd3+'. '+sd4+':'+sd5+':'+sd6
	document.getElementById('nd').style.color = "white";
	}
</script>
</head>
<body onload="st();setInterval('st()',1000)" background="../design/background.jpg">
	<table class="fotabla">
		<tr>
			<td class="fejlec">
				<div style="float: left; display: inline; height: 1px; margin: 0px 0px 15px 0px;" id="nd"></div>
				<div style="float: right; display: inline; height: 1px; margin: -5px 0px 0px 0px;"><form method="post"><input type="submit" id="kilepes" name="kilepes" value="" title="Kijelentkezes"></form></div>
			</td>
		</tr>
		<tr>
			<td class="kozepe">
				<table style="min-height: 720px; min-width: 1280; margin: auto; color: white;">
					<tr>
						<td style="border-width:2px; border-style: outset;border-color: rgb(38, 38, 38); border-radius: 10px 10px 10px 10px; height: 100%; width: 900px;">
							
						</td>
						<td></td>
						<td style="border-width:4px; border-style: inset;border-color: rgb(38, 38, 38); border-radius: 10px 10px 10px 10px; height: 100%;width: 350px;">12</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td class="alja">PoverBy: Magyari Ottó @2018</td>
		</tr>
	</table>
</body>
</html>