<?php
include "megtekintesvedelem.php";
include "frissites.php";
date_default_timezone_set("Europe/Bucharest");
if(isset($_POST["kilepes"])){
	header("location: kilepes.php");
}
if(isset($_POST["vissza"])){
	header("location: index.php");
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
			<?php
			if(empty($_GET["id"])){
			?>
				<table style="min-height: 720px; min-width: 1280; margin: auto; color: white;">
					<tr>
						<td style="border-width:2px; border-style: outset;border-color: rgb(38, 38, 38); border-radius: 10px 10px 10px 10px; height: 100%; width: 900px;">
							<table style="border-width:2px; border-style: inset;border-color: rgb(38, 38, 38); border-radius: 10px 10px 10px 10px; color: white;">
								<tr>
									<td style="border-width:2px; border-style: outset;border-color: rgb(38, 38, 38);border-radius: 10px 10px 10px 10px;height:30px;width:900;">teto</td>
								</tr>
								<tr>
									<td style="border-width:2px; border-style: outset;border-color: rgb(38, 38, 38);border-radius: 10px 10px 10px 10px;height:660px;width:900;">
										<div id="banya_lista_div">
											<table>
												<tr>
												<?php
													for($esz=1;$esz<=$projektek_szama;$esz++){
													?>
														<td id="projekt_modul">
															<div onClick="document.location.href='index.php?id=<?php echo $esz; ?>'" id="projektid_<?php echo $esz;?>" class="projekt_tomb">
															<?php
															$projekt_neve=mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM projektek WHERE id=$esz"))["nev"];
															echo $projekt_neve;
															?>
															</div>
														</td>
													<?php
													if($esz%3 == 0){
														echo "</tr>";
														if($esz != $projektek_szama){
															echo "<tr>";
														}
													}
													}
												?>
											</table>
										</div>
									</td>
								</tr>
							</table>
						</td>
						<td></td>
						<td style="border-width:4px; border-style: inset;border-color: rgb(38, 38, 38); border-radius: 10px 10px 10px 10px; height: 100%;width: 350px;">12</td>
					</tr>
				</table>
				<?php }else{ ?>
					<table style="border-width:4px; border-style: inset;border-color: rgb(38, 38, 38); border-radius: 10px 10px 10px 10px;min-height: 717px; min-width: 1280; margin: auto; color: white;">
						<?php 
						$projekt_azonosito=$_GET["id"];
						$projekt_kategoria=mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM projektek WHERE id=$projekt_azonosito"))["kategoria"];
						$adatbazis_projekt_azonosito=mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM projektek WHERE id=$projekt_azonosito"))["azonosito"];
						$projekt_tipus=mysqli_fetch_assoc(mysqli_query($conn , "SELECT * FROM tipusok WHERE kategoria_nev='$projekt_kategoria'"))["tipus"];
						if($projekt_tipus == "konyveles"){
							$fizetesek=mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM $adatbazis_projekt_azonosito WHERE id = (select max(id) from $adatbazis_projekt_azonosito)"))["id"];
							$sql = "SELECT * from $adatbazis_projekt_azonosito";
							$lekeres = mysqli_query($conn , $sql);
							?>
								<tr>
									<td style="border-width:2px; border-style: outset;border-color: rgb(38, 38, 38); border-radius: 10px 10px 10px 10px;height:30;background-color: rgba(0, 0, 0, 0.5);">
									<div style="float: right; display: inline; height: 1px; margin: -10px 5px 0px 0px;"><form method="post"><input type="submit" name="vissza" value="Vissza" title="Vissza"></form><div>
									</td>
								</tr>
								<tr>
									<td>
										<table border='1' style='background-color: rgba(0, 0, 256, 0.6); color: white; cursor:pointer;width: 1245px; margin: 0px 0px 0px 3px;'>
												<tr>
													<td style='width:25px;'>ID:</td>
													<td style='width:160px;'>Dátum:</td>
													<td style='width:50px;'>M.nap:</td>
													<td style='width:50px;'>S.nap:</td>
													<td style='width:50px;'>B.nap:</td>
													<td style='width:50px;'>T.nap:</td>
													<td style='width:50px;'>100%:</td>
													<td style='width:50px;'>200%:</td>
													<td style='width:80px;'>+</td>
													<td style='width:50px;'>-</td>
													<td style='width:60px;'>N/Nap</td>
													<td style='width:60px;'>N/Honap</td>
													<td style='width:60px;'>Tiket sz.</td>
													<td style='width:60px;'>Tiket é.</td>
													<td style='width:100px;'>BEVÉTEL</td>
													<td></td>
												</tr>
										</table>
										<div style='height: 610px; overflow-y: scroll;'>
											<table align='center' >
												<tr>
													<td>
														<?php
														$munkanap=0;
														$szabadnap=0;
														$betegszabadnap=0;
														$tuloranap=0;
														$ora100=0;
														$ora200=0;
														$netto=0;
														$brutto=0;
														$tiketekszama=0;
														$tiketekerteke=0;
														$bevetel=0;
														while($row = mysqli_fetch_object($lekeres)){
															$munkanap=$munkanap+$row->munkanap;
															$szabadnap=$szabadnap+$row->szabadnap;
															$betegszabadnap=$betegszabadnap+$row->betegszabadnap;
															$tuloranap=$tuloranap+$row->tuloranap;
															$ora100=$ora100+$row->ora100;
															$ora200=$ora200+$row->ora200;
															$netto=$netto+ceil($row->nettohonap);
															$tiketekszama=$tiketekszama+ceil($row->tiketekszama);
															$tiketekerteke=$tiketekerteke+ceil($row->tiketekerteke);
															$bevetel=$bevetel+ceil($row->bevetel);
															$id=$row->id;
															echo "
															<table border='1' style='background-color: lightblue; cursor: pointer; width: 1245px;'>
																<tr>
																	<td style='width:25px;'>$row->id</td>
																	<td style='width:160px;'>$row->datum</td>
																	<td style='width:50px;'>$row->munkanap</td>
																	<td style='width:50px;'>$row->szabadnap</td>
																	<td style='width:50px;'>$row->betegszabadnap</td>
																	<td style='width:50px;'>$row->tuloranap</td>
																	<td style='width:50px;'>$row->ora100</td>
																	<td style='width:50px;'>$row->ora200</td>
																	<td style='width:80px;'>$row->egyebbplusz</td>
																	<td style='width:50px;'>$row->egyebbminusz</td>
																	<td style='width:60px;'>$row->nettonap lej</td>
																	<td style='width:60px;'>$row->nettohonap lej</td>
																	<td style='width:60px;'>$row->tiketekszama db</td>
																	<td style='width:60px;'>$row->tiketekerteke lej</td>
																	<td style='width:100px;'>$row->bevetel lej</td>
																	<td style='text-align: center;'>
																		<form method='post'>
																			<input type='submit' id='szerkesztes' name='id$id' value='' onclick='return szerkesztes($id);' title='Kijelentkezes'>
																			<input type='submit' id='torles' name='id$id' value='' onclick='torles($row->id)' title='Torles'>
																		</form>
																	</td>
																</tr>
															</table>
															";
														}
														?>
													</td>
												</tr>
											</table>
										</div>
										<table border='1' style='background-color: rgba(0, 0, 256, 0.6); color: white; cursor:pointer;width: 1245px; margin: 0px 0px 0px 3px;'>
											<tr>
												<td style='width:25px;'><?php echo $fizetesek;?></td>
												<td style='width:160px;'></td>
												<td style='width:50px;'><?php echo $munkanap;?></td>
												<td style='width:50px;'><?php echo $szabadnap;?></td>
												<td style='width:50px;'><?php echo $betegszabadnap;?></td>
												<td style='width:50px;'><?php echo $tuloranap;?></td>
												<td style='width:50px;'><?php echo $ora100;?></td>
												<td style='width:50px;'><?php echo $ora200;?></td>
												<td style='width:80px;'></td>
												<td style='width:50px;'></td>
												<td style='width:60px;'></td>
												<td style='width:60px;'><?php echo $netto;?></td>
												<td style='width:60px;'><?php echo $tiketekszama;?></td>
												<td style='width:60px;'><?php echo $tiketekerteke;?></td>
												<td style='width:100px;'><?php echo $bevetel;?></td>
												<td></td>
											</tr>
									</table>
									</td>
								</tr>
					<?php }else{ }?>
					</table>
				<?php } ?>
			</td>
		</tr>
		<tr>
			<td class="alja">PoverBy: Magyari Ottó @2018</td>
		</tr>
	</table>
</body>
</html>