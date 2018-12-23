<?php
include "include/connect.php";
date_default_timezone_set("Europe/Bucharest");
session_start();
if( isset($_SESSION["userid"]) ){
	header("Location: include/index.php");
}
if(!empty($_POST["username"]) && !empty($_POST["password"])):
	
	$nyilvantartas = $conn2->prepare("SELECT userid,username,password FROM users WHERE username = :username");
	$nyilvantartas->bindParam(":username", $_POST["username"]);
	$nyilvantartas->execute();
	$talalatok = $nyilvantartas->fetch(PDO::FETCH_ASSOC);

	$hiba = "";

	if(count($talalatok) > 0 && $_POST["password"] = $talalatok["password"]){
		$belepve="belepve";
		$_SESSION["userid"] = $talalatok["userid"];
		$_SESSION["userid.$belepve"] = 1;
		header("Location: include/index.php");

	} else {
		$hiba = "Hibas belepesi adatok";
	}

endif;
if(!empty($hiba)){
	echo $hiba;
}
?>
<html>
<head>
	<title>My System</title>
	<META charset='utf-8'>
	<link rel="stylesheet" href="design/home.css">
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
<body onload="st();setInterval('st()',1000)" background="design/background.jpg">
	<table class="fotabla">
		<tr>
			<td class="fejlec">
				<div style="float: left; display: inline; height: 1px; margin: 0px 0px 15px 0px;" id="nd"></div>
			</td>
		</tr>
		<tr>
			<td class="kozepe">
				<form method="post">
					<table class="login">
						<tr>
							<td colspan="2">MySystem Bejelentkezes</td>
						</tr>
						<tr>
							<td height="10">Felhasznalonev:</td>
							<td height="10"><input type="text" name="username" value=""></td>
						</tr>
						<tr>
							<td height="10">Jelszo:</td>
							<td height="10"><input type="password" name="password" value=""></td>
						</tr>
						<tr>
							<td colspan="2"><input id="belepes_input" type="submit" name="login" value="Belépek"></td>
						</tr>
					</table>
				</form>
			</td>
		</tr>
		<tr>
			<td class="alja">PoverBy: Magyari Ottó @2018</td>
		</tr>
	</table>
</body>
</html>