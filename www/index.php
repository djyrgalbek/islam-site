<!DOCTYPE html>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <title>Исламский сайт Joodar-jannat.ru</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="style_error.css">
	<script type="text/javascript" src="script.js"></script>
	<script type="text/javascript" src="jquery-321js-1.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Fira+Sans|Roboto+Condensed" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Neucha|Patrick+Hand|Shadows+Into+Light+Two" rel="stylesheet">	
<?php
$db=mysql_connect("localhost","root","","mybasequran");
mysql_set_charset("utf-8",$db);
mysql_select_db("mybasequran",$db) or die("Нет соединения с БД. ".mysql_error());

//Хадис дня
$glTextRead=mysql_query("SELECT * FROM `text`",$db);
$glTextId=Array();
$glText=Array();
$k=0;

while($glTextReadArray=mysql_fetch_array($glTextRead))
{
		$glTextId[$k]=$glTextReadArray['id'];
		$glText[$k]=$glTextReadArray['text'];
		$k++;
}

//Меню
$menuBase=mysql_query("SELECT * FROM `menu`",$db);

$menuId=Array();
$menuName=Array();
$menuOsnText=Array();
$menuText=Array();
$n=0;

while($menuArray=mysql_fetch_array($menuBase))
{
		$menuId[$n]=$menuArray['id'];
		$menuName[$n]=$menuArray['name'];
		$menuText[$n]=$menuArray['text'];
		$menuOsnText[$n]=$menuArray['osnText'];
		$n++;
}
mysql_close();
?>

</head>
<body>
<?php include 'PHP/soobshenie.php';?>

 <div class="gl_fon">
 <!-- Шапка -->
<?php include 'header_main.php'; ?>
    <div style="width: 100%; height: 1px;"></div>
<div style="clear:left"></div>
<?php 

$string = strip_tags($menuOsnText[0]);
$string = substr($string, 0, 631);
$string = rtrim($string, "!,.-");
$string = substr($string, 0, strrpos($string, ' '));
$string = $string." ... ";

$string1 = strip_tags($menuOsnText[1]);
$string1 = substr($string1, 0, 210);
$string1 = rtrim($string1, "!,.-");
$string1 = substr($string1, 0, strrpos($string1, ' '));
$string1 = $string1." ... ";

$string2 = strip_tags($menuOsnText[2]);
$string2 = substr($string2, 0, 235);
$string2 = rtrim($string2, "!,.-");
$string2 = substr($string2, 0, strrpos($string2, ' '));
$string2 = $string2." ... ";

$string3 = strip_tags($menuOsnText[3]);
$string3 = substr($string3, 0, 235);
$string3 = rtrim($string3, "!,.-");
$string3 = substr($string3, 0, strrpos($string3, ' '));
$string3 = $string3." ... ";

$string4 = strip_tags($menuOsnText[4]);
$string4 = substr($string4, 0, 235);
$string4 = rtrim($string4, "!,.-");
$string4 = substr($string4, 0, strrpos($string4, ' '));
$string4 = $string4." ... ";

$string5 = strip_tags($menuOsnText[5]);
$string5 = substr($string5, 0, 235);
$string5 = rtrim($string5, "!,.-");
$string5 = substr($string5, 0, strrpos($string5, ' '));
$string5 = $string5." ... ";

$string6 = strip_tags($menuOsnText[6]);
$string6 = substr($string6, 0, 235);
$string6 = rtrim($string6, "!,.-");
$string6 = substr($string6, 0, strrpos($string6, ' '));
$string6 = $string6." ... ";

$string7 = strip_tags($menuOsnText[7]);
$string7 = substr($string7, 0, 218);
$string7 = rtrim($string7, "!,.-");
$string7 = substr($string7, 0, strrpos($string7, ' '));
$string7 = $string7." ... ";

$string8 = strip_tags($menuOsnText[8]);
$string8 = substr($string8, 0, 631);
$string8 = rtrim($string8, "!,.-");
$string8 = substr($string8, 0, strrpos($string8, ' '));
$string8 = $string8." ... ";

$string9 = strip_tags($menuOsnText[9]);
$string9 = substr($string9, 0, 218);
$string9 = rtrim($string9, "!,.-");
$string9 = substr($string9, 0, strrpos($string9, ' '));
$string9 = $string9." ... ";
?>
   
<div class="osnrazdel" onClick="Menu('koran','Священный Коран','1')">
<img src="images/Koran.jpg" width="100%" height="auto" class="img">
<h2 align="center">Коран</h2>
<p class="text_razdel"><?php echo $string; ?></p>
</div>

<div class="razdel" onClick="Menu('sunna','Сунны и хадисы','2')">
<img src="images/sunna.jpg" width="100%" height="auto" class="img">
<h2 align="center">Сунны и хадисы</h2>
<p class="text_razdel"><?php echo $string1; ?></p>
</div>

<div class="razdel" onClick="Menu('molitvy_dua','Молитвы и Дуа','3')">
<img src="images/molitva.jpg" width="100%" height="auto" class="img">
<h2 align="center">Молитвы и Дуа</h2>
<p class="text_razdel"><?php echo $string2; ?></p>
</div>
<div style="clear:left"></div>

<div class="razdel"  onClick="Menu('namaz','Намаз','4')">
<img src="images/namaz.jpg" width="100%" height="auto" class="img">
<h2 align="center">Намаз</h2>
<p class="text_razdel"><?php echo $string3; ?></p>
</div>

<div class="razdel"  onClick="Menu('proroksav','Мухаммад (С.А.В.)','5')">
<img src="images/Muhammad_s.a.v..jpg" width="100%" height="auto" class="img">
<h2 align="center" style="margin: -3px 0px -4px 0px; ">Мухаммад (ﷺ)</h2> 
<p class="text_razdel"><?php echo $string4 ?></p>
</div>

<div class="razdel" onClick="Menu('iskusstvo','Искусство и Ислам','6')">
<img src="images/iskusstvo.jpg" width="100%" height="auto" class="img">
<h3 align="center" style="margin: 2px 0px 4px 0px;">Искусство и Ислам</h3>
<p class="text_razdel"><?php echo $string5; ?></p>
</div>

<div class="razdel" onClick="Menu('education','Образование в исламском мире','7')">
<img src="images/education.jpg" width="100%" height="auto" class="img">
<h3 align="center" style="margin: 2px 0px 4px 0px;">Образование</h3>
<p class="text_razdel"><?php echo $string6; ?></p>
</div>

<div style="clear:left"></div>

<div class="razdel" onClick="Menu('family','Семья  и Ислам','8')">
<img src="images/family.jpg" width="100%" height="auto" class="img">
<h3 align="center" style="margin: 2px 0px 4px 0px;">Семья  и Ислам</h3>
<p class="text_razdel"><?php echo $string7; ?></p>
</div>

<div class="osnrazdel" onClick="Menu('dobro','Добро в Исламе','9')">
<img src="images/dobro.jpg" width="100%" height="auto" class="img">
<h2 align="center">Добро в Исламе</h2>
<p class="text_razdel"><?php echo $string8; ?></p>
</div>

<div class="razdel" onClick="Menu('hadj','Хадж','10')">
<img src="images/hadj.jpg" width="100%" height="auto" class="img">
<h2 align="center">Хадж</h2>
<p class="text_razdel"><?php echo $string9; ?></p>
</div>
<div style="clear:left"></div>
<br><br><br>

<!-- Подвал -->
<?php include 'footer_main.php'; ?>

</div>

<script>
// $('.razdel:eq(0)').hover(function(){
// $(".razdel:eq(0)").css("margin-top","23px");
// });
// $('.razdel:eq(1)').hover(function(){
// $(".razdel:eq(1)").css("margin-top","23px");
 // });
// $('.razdel:eq(2)').hover(function(){
// $(".razdel:eq(2)").css("margin-top","23px");
// });
// $('.razdel:eq(3)').hover(function(){
// $(".razdel:eq(3)").css("margin-top","23px");
// });
// $('.razdel:eq(4)').hover(function(){
// $(".razdel:eq(4)").css("margin-top","23px");
// });
// $('.razdel:eq(5)').hover(function(){
// $(".razdel:eq(5)").css("margin-top","23px");
// });
// $('.razdel:eq(6)').hover(function(){
// $(".razdel:eq(6)").css("margin-top","23px");
// });
// $('.razdel:eq(7)').hover(function(){
// $(".razdel:eq(7)").css("margin-top","23px");
// });

// $('.razdel:eq(0)').mouseout(function(){
// $(".razdel:eq(0)").css("margin-top","30px");
// });
// $('.razdel:eq(1)').mouseout(function(){
// $(".razdel:eq(1)").css("margin-top","30px");
// });
// $('.razdel:eq(2)').mouseout(function(){
// $(".razdel:eq(2)").css("margin-top","30px");
// });
// $('.razdel:eq(3)').mouseout(function(){
// $(".razdel:eq(3)").css("margin-top","30px");
// });
// $('.razdel:eq(4)').mouseout(function(){
// $(".razdel:eq(4)").css("margin-top","30px");
// });
// $('.razdel:eq(5)').mouseout(function(){
// $(".razdel:eq(5)").css("margin-top","30px");
// });
// $('.razdel:eq(6)').mouseout(function(){
// $(".razdel:eq(6)").css("margin-top","30px");
// });
// $('.razdel:eq(7)').mouseout(function(){
// $(".razdel:eq(7)").css("margin-top","30px");
// });
</script>

<script>
 function Menu(menuArg1,menuArg2,menuArg3){
	var t = document.menuForm.menuInput.value=menuArg1;
	document.menuForm.titleInput.value=menuArg2;
	document.menuForm.menuNumber.value=menuArg3;
	document.menuForm.submit(); 

 }

 //Состояние ссылки на соц. сеть при наведении мыши
 function S_network_on(arg_active){
					var s_n_icon="images/contact/"+arg_active+".png";
					if(arg_active=="vk_active"){
						document.getElementById("vk").src=s_n_icon;
					}
					else if(arg_active=="facebook_active"){
						document.getElementById("facebook").src=s_n_icon;
					}
					else if(arg_active=="ok_active"){
						document.getElementById("ok").src=s_n_icon;
					}
					else if(arg_active=="instagram_active"){
						document.getElementById("instagram").src=s_n_icon;
					}
					else if(arg_active=="whatsapp_active"){
						document.getElementById("whatsapp").src=s_n_icon;
					}
				}
	//Состояние ссылки на соц. сеть при отведении мыши
	function S_network_off(arg_inactive){
					var s_n_icon="images/contact/"+arg_inactive+".png";
					if(arg_inactive=="vk_inactive"){
						document.getElementById("vk").src=s_n_icon;
					}
					else if(arg_inactive=="facebook_inactive"){
						document.getElementById("facebook").src=s_n_icon;
					}
					else if(arg_inactive=="ok_inactive"){
						document.getElementById("ok").src=s_n_icon;
					}
					else if(arg_inactive=="instagram_inactive"){
						document.getElementById("instagram").src=s_n_icon;
					}
					else if(arg_inactive=="whatsapp_inactive"){
						document.getElementById("whatsapp").src=s_n_icon;
					}
				}
</script>

 <!-- Форма для передачи данных порядка меню -->
<form  name="menuForm" method="POST" action="content.php">
	<input type="hidden" name="menuInput" value="0">
	<input type="hidden" name="titleInput" value="0">
	<input type="hidden" name="menuNumber" value="0">
	<input type="hidden" name="menuSubmit" value="0">
</form>
 </body>
</html>

 