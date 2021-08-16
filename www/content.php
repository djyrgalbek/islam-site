<!DOCTYPE html>
<html>
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="style_error.css">
	<script type="text/javascript" src="script.js"></script>
	<script type="text/javascript" src="jquery-321js-1.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Fira+Sans|Roboto+Condensed" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Neucha|Patrick+Hand|Shadows+Into+Light+Two" rel="stylesheet">	
 <?php 
 $menu = "koran";
 $value = 0;
 $suraBase = 'sura1';
 $valueGlText = 0;
 $menuNumber = 1;
 $univArgNumber = 1;
 $univArgText = "";
 $nextStr = false;
 $number_question = date("d") - 1;

 if($_POST["menuInput"]!=""){
 	$menu=$univArgText=$_POST["menuInput"];
	$menuNumber=$_POST["menuNumber"];
	$value=$menuNumber-1;
	$titleInput=$_POST["titleInput"];
	//echo "menu ".$menu."<br />menuNumber ".$menuNumber;//Удалить
	$nextStr=true;
	echo '<title>Исламский сайт Joodar-jannat.ru | '.$titleInput.'</title>';//Титульное название страницы
	$univArgNumber=0;
 }
 
if($_POST["numberSura"]!=""){
	$value=$_POST["numberSura"];
	$suraBase=$_POST["wordSura"];
	$titleSura=$_POST["titleSura"];
	$menuNumber=0;
	//echo $value."<br />";//Удалить
	//echo $suraBase."<br />";//Удалить
	echo '<title>Исламский сайт Joodar-jannat.ru | '.$titleSura.'</title>';
 }
 
 if($_POST["UniversalNum"]!=""){
	$univArgNumber=$_POST["UniversalNum"];
	$menu=$univArgText=$_POST["UniversalText"];
	$UniversalTitle=$_POST["UniversalTitle"];
	$menuNumber=100;
	$value=$univArgNumber;
	//echo "univArgNumber ".$univArgNumber."<br />";//Удалить
	//echo "univArgText ".$univArgText."<br />";//Удалить
	echo '<title>Исламский сайт Joodar-jannat.ru | '.$UniversalTitle.'</title>';
	
	if($menu=="sunna"){
		$un_menu="Сунны и Хадисы";
		$titleInput = $un_menu;
	}
	else if($menu=="molitvy_dua"){
		$un_menu="Молитвы и Дуа";
	}
	else if($menu=="namaz"){
		$un_menu="Намаз";
	}
	else if($menu=="proroksav"){
		$un_menu="Пророк Мухаммад (С.А.В.)";
	}
	else if($menu=="iskusstvo"){
		$un_menu="Искусство и Ислам";
	}
	else if($menu=="education"){
		$un_menu="Образование в Исламе";
	}
	else if($menu=="family"){
		$un_menu="Семья и Ислам";
	}
	else if($menu=="dobro"){
		$un_menu="Добро";
	}
	else if($menu=="hadj"){
		$un_menu="Хадж";
	}
 }
 ?>
	  
<?php
$db=mysql_connect("localhost","cf77513_jannat","Jannat17","cf77513_jannat");
mysql_set_charset("utf-8",$db);
mysql_select_db("cf77513_jannat",$db) or die("Нет соединения с БД. ".mysql_error());

$id=Array();
$name=Array();
$text=Array();
$audio=Array();
$video=Array();

$idSura=Array();
$arabLanguage=Array();
$translit=Array();
$rusLanguage=Array();

$glTextId=Array();
$glText=Array();

$menuId=Array();
$menuName=Array();
$menuOsnText=Array();
$menuText=Array();

$idUn=Array();
$nameUn=Array();
$textUn=Array();
$textUn_2=Array();
$audioUn=Array();
$videoUn=Array();

$idQuestion=Array();
$textQuestion=Array();
$ver_1Question=Array();
$ver_2Question=Array();
$ver_3Question=Array();
$ver_4Question=Array();
$trueQuestion=Array();
     
$i=0;
$j=0;
$k=0;
$n=0;
$z=0;
$m=0;
     
$glTextRead=mysql_query("SELECT * FROM `text`",$db);

while($glTextReadArray=mysql_fetch_array($glTextRead))
{
		$glTextId[$k]=$glTextReadArray['id'];
		$glText[$k]=$glTextReadArray['text'];
		$k++;
}

if($menuNumber==0)
{
$resultat=mysql_query("SELECT * FROM `tablequran`",$db);
$suraRead=mysql_query("SELECT * FROM $suraBase",$db);

while($array=mysql_fetch_array($resultat))
{
		$id[$i]=$array['id'];
		$name[$i]=$array['name'];
		$text[$i]=$array['text'];
		$audio[$i]=$array['audio'];
		$video[$i]=$array['video'];
		$i++;
}

while($suraArray=mysql_fetch_array($suraRead))
{
		$arabLanguage[$j]=$suraArray['arabLanguage'];
		$translit[$j]=$suraArray['translit'];
		$rusLanguage[$j]=$suraArray['rusLanguage'];
		$idSura[$j]=$suraArray['id'];
		$j++;
}
}
else if($menuNumber!=0&&$menuNumber!=100){
	$menuBase=mysql_query("SELECT * FROM `menu`",$db);
	
while($menuArray=mysql_fetch_array($menuBase))
{
		$menuId[$n]=$menuArray['id'];
		$menuName[$n]=$menuArray['name'];
		$menuText[$n]=$menuArray['text'];
		$menuOsnText[$n]=$menuArray['osnText'];
		$audio[$n]=$menuArray['audio'];
		$video[$n]=$menuArray['video'];
		$n++;
		//echo $menuText[$menuNumber-1];
		}
}

if($menuNumber==100){
	$universal=mysql_query("SELECT * FROM $univArgText",$db);
	$menuBase=mysql_query("SELECT * FROM `menu`",$db);
		while($array=mysql_fetch_array($universal))
		{
		$idUn[$z]=$array['id'];
		$nameUn[$z]=$array['name'];
		$textUn[$z]=$array['text'];
        $textUn_2[$z]=$array['text_2'];
		$audio[$z]=$array['audio'];
		$video[$z]=$array['video'];
		$z++;
		$num_rows=mysql_num_rows($universal);
}
}

     $question=mysql_query("SELECT * FROM `question`",$db);
    while($questionArray=mysql_fetch_array($question))
    {
		$idQuestion[$m]=$questionArray['id'];
		$textQuestion[$m]=$questionArray['text'];
		$ver_1Question[$m]=$questionArray['ver_1'];
		$ver_2Question[$m]=$questionArray['ver_2'];
		$ver_3Question[$m]=$questionArray['ver_3'];
		$ver_4Question[$m]=$questionArray['ver_4'];
        $trueQuestion[$m]=$questionArray['true'];
		$m++;
		}
//Считывание количество строк таблицы из БД(необходим для перехода между страницами)

	//echo "<br />num_rows ".$num_rows;//Удалить
mysql_close();
$min=0;
//echo "<br />Проверка на порядка строк:";//Удалить
for($n=0;$n<count($idSura);$n++){
	if($min<$idSura[$n]){
		$min=$idSura[$n];
		//echo $idSura[$n]." ";//Удалить
	}
	else{
		//echo "<div class='markWord'>Ошибка</div>";//Удалить
	}	
}

$pr1=count($arabLanguage); $pr2=count($translit); $pr3=count($rusLanguage); 
	//echo "<br /><br />Длина: ".$pr1."=".$pr2."=".$pr3."<br />Проверка на пустоту:";//Удалить

	 /*for($i=0;$i<$pr1;$i++){//Удалить
		 if($arabLanguage[$i]!=""&&$translit[$i]!=""&&$rusLanguage[$i]!=""){
			echo $i." ";
		 }
		  else{
			echo "<div class='markWord'>ПУСТО!!!</div>";
			  }
		for($j=$i+1;$j<$pr1;$j++){
			if($arabLanguage[$i]==$arabLanguage[$j])
			{
				echo "<div class='blueMark'>Похожи </div>".$j."!";
			}
			if($translit[$i]==$translit[$j])
			{
				echo "<div class='goldMark'>Похожи </div>".$j."!";
			}
			if($rusLanguage[$i]==$rusLanguage[$j])
			{
				echo "<div class='markWord'>Похожи </div>".$j."!";
			}
		}
	 } */
 ?>
</head>
 
<body>
<?php include 'PHP/soobshenie.php';?>

 	<!--Функция присвоения значений форме "SuraForm" -->
<script>
	function Sura(sura,word,title){
		document.SuraForm.numberSura.value=sura;
		document.SuraForm.wordSura.value=word;
		document.SuraForm.titleSura.value=title;
		document.SuraForm.submit();
 	}
</script>
 
  	<!--Функция присвоения значений форме "Universal" -->
<script>
	function Universal(unArg1,unArg2,unArg3){
		document.UniversalForm.UniversalNum.value=unArg1;
		document.UniversalForm.UniversalText.value=unArg2;
		document.UniversalForm.UniversalTitle.value=unArg3;
		document.UniversalForm.submit();
 	}
</script>

<!-- Форма для передачи данных порядка суры -->
<form name="SuraForm" method="POST" action="/content.php">
	<input type="hidden" name="numberSura" value="0"/>
	<input type="hidden" name="wordSura" value="0"/>
	<input type="hidden" name="titleSura" value="0"/>	
	<input type="hidden" name="suraSubmit" value="0"/>
</form>

 <!-- Форма для передачи данных порядка меню -->
<form  name="menuForm" method="POST" action="/content.php">
	<input type="hidden" name="menuInput" value="0"/>
	<input type="hidden" name="titleInput" value="0"/>
	<input type="hidden" name="menuNumber" value="0"/>
	<input type="hidden" name="menuSubmit" value="0"/>
</form>

 <!-- Форма для передачи данных таблицы меню -->
<form name="UniversalForm" method="POST" action="/content.php">
	<input type="hidden" name="UniversalNum" value="0"/>
	<input type="hidden" name="UniversalText" value="0"/>
	<input type="hidden" name="UniversalTitle" value="0"/>	
	<input type="hidden" name="UniversalSubmit" value="0"/>
</form>

 <div class="fon">
 <!-- Мобильное меню -->
 <script>
 function Vyz_menu(){
	document.getElementById('gl_m').style.display="block";
	document.getElementById('exit_gl_m').style.display="block";
	document.getElementById('kn_vyz_m').style.display="none";
	document.getElementById('up').style.display="none";
 }
 function Open_menu(arg){
	 var Open;
		if(arg == "1"){
	 Open = document.getElementById('Op_1').style;
	 document.getElementById('Op_2').style.display="none";
	 	 document.getElementById('Op_3').style.display="none";
		 	 document.getElementById('Op_4').style.display="none";
			 	 document.getElementById('Op_5').style.display="none";
				 	 document.getElementById('Op_6').style.display="none";
					 	 document.getElementById('Op_7').style.display="none";
						 	 document.getElementById('Op_8').style.display="none";
							 	 document.getElementById('Op_9').style.display="none";
								 	 document.getElementById('Op_10').style.display="none";
	 }
		else if(arg == "2"){
	 Open = document.getElementById('Op_2').style;
	  document.getElementById('Op_1').style.display="none";
	 	 document.getElementById('Op_3').style.display="none";
		 	 document.getElementById('Op_4').style.display="none";
			 	 document.getElementById('Op_5').style.display="none";
				 	 document.getElementById('Op_6').style.display="none";
					 	 document.getElementById('Op_7').style.display="none";
						 	 document.getElementById('Op_8').style.display="none";
							 	 document.getElementById('Op_9').style.display="none";
								 	 document.getElementById('Op_10').style.display="none";
	 }
	 	 else if(arg == "3"){
	 Open = document.getElementById('Op_3').style;
	 	document.getElementById('Op_1').style.display="none";
	 	 document.getElementById('Op_2').style.display="none";
		 	 document.getElementById('Op_4').style.display="none";
			 	 document.getElementById('Op_5').style.display="none";
				 	 document.getElementById('Op_6').style.display="none";
					 	 document.getElementById('Op_7').style.display="none";
						 	 document.getElementById('Op_8').style.display="none";
							 	 document.getElementById('Op_9').style.display="none";
								 	 document.getElementById('Op_10').style.display="none";
	 }
	 	 else if(arg == "4"){
	 Open = document.getElementById('Op_4').style;
	  document.getElementById('Op_1').style.display="none";
	 	 document.getElementById('Op_2').style.display="none";
		 	 document.getElementById('Op_3').style.display="none";
			 	 document.getElementById('Op_5').style.display="none";
				 	 document.getElementById('Op_6').style.display="none";
					 	 document.getElementById('Op_7').style.display="none";
						 	 document.getElementById('Op_8').style.display="none";
							 	 document.getElementById('Op_9').style.display="none";
								 	 document.getElementById('Op_10').style.display="none";
	 }
	 	 else if(arg == "5"){
	 Open = document.getElementById('Op_5').style;
	  document.getElementById('Op_1').style.display="none";
	 	 document.getElementById('Op_2').style.display="none";
		 	 document.getElementById('Op_3').style.display="none";
			 	 document.getElementById('Op_4').style.display="none";
				 	 document.getElementById('Op_6').style.display="none";
					 	 document.getElementById('Op_7').style.display="none";
						 	 document.getElementById('Op_8').style.display="none";
							 	 document.getElementById('Op_9').style.display="none";
								 	 document.getElementById('Op_10').style.display="none";
	 }
	 	 else if(arg == "6"){
	 Open = document.getElementById('Op_6').style;
	  document.getElementById('Op_1').style.display="none";
	 	 document.getElementById('Op_2').style.display="none";
		 	 document.getElementById('Op_3').style.display="none";
			 	 document.getElementById('Op_4').style.display="none";
				 	 document.getElementById('Op_5').style.display="none";
					 	 document.getElementById('Op_7').style.display="none";
						 	 document.getElementById('Op_8').style.display="none";
							 	 document.getElementById('Op_9').style.display="none";
								 	 document.getElementById('Op_10').style.display="none";	 
	 }
	 	 else if(arg == "7"){
	 Open = document.getElementById('Op_7').style;
	  document.getElementById('Op_1').style.display="none";
	 	 document.getElementById('Op_2').style.display="none";
		 	 document.getElementById('Op_3').style.display="none";
			 	 document.getElementById('Op_4').style.display="none";
				 	 document.getElementById('Op_5').style.display="none";
					 	 document.getElementById('Op_6').style.display="none";
						 	 document.getElementById('Op_8').style.display="none";
							 	 document.getElementById('Op_9').style.display="none";
								 	 document.getElementById('Op_10').style.display="none";
	 }
	 	 else if(arg == "8"){
	 Open = document.getElementById('Op_8').style;
	  document.getElementById('Op_1').style.display="none";
	 	 document.getElementById('Op_2').style.display="none";
		 	 document.getElementById('Op_3').style.display="none";
			 	 document.getElementById('Op_4').style.display="none";
				 	 document.getElementById('Op_5').style.display="none";
					 	 document.getElementById('Op_6').style.display="none";
						 	 document.getElementById('Op_7').style.display="none";
							 	 document.getElementById('Op_9').style.display="none";
								 	 document.getElementById('Op_10').style.display="none";
	 }
	 	 else if(arg == "9"){
	 Open = document.getElementById('Op_9').style;
	  document.getElementById('Op_1').style.display="none";
	 	 document.getElementById('Op_2').style.display="none";
		 	 document.getElementById('Op_3').style.display="none";
			 	 document.getElementById('Op_4').style.display="none";
				 	 document.getElementById('Op_5').style.display="none";
					 	 document.getElementById('Op_6').style.display="none";
						 	 document.getElementById('Op_7').style.display="none";
							 	 document.getElementById('Op_8').style.display="none";
								 	 document.getElementById('Op_10').style.display="none";
	 }
	 	 else if(arg == "10"){
	 Open = document.getElementById('Op_10').style;
	  document.getElementById('Op_1').style.display="none";
	 	 document.getElementById('Op_2').style.display="none";
		 	 document.getElementById('Op_3').style.display="none";
			 	 document.getElementById('Op_4').style.display="none";
				 	 document.getElementById('Op_5').style.display="none";
					 	 document.getElementById('Op_6').style.display="none";
						 	 document.getElementById('Op_7').style.display="none";
							 	 document.getElementById('Op_8').style.display="none";
								 	 document.getElementById('Op_9').style.display="none";
	 }
	 
	 if(Open.display == "none" || Open.display==false){
		 Open.display="block"
	 }
	 else{
		 Open.display="none"
	 }
 }
 
function Exit_gl_menu(){
	document.getElementById('gl_m').style.display="none";
	document.getElementById('exit_gl_m').style.display="none";
	document.getElementById('kn_vyz_m').style.display="block";
	document.getElementById('up').style.display="block";
}
</script>

<div id="exit_gl_m" class="exit_gl_menu" onClick="Exit_gl_menu()"></div>

<div id="gl_m" class="gl_menu" >
	
	<form id="poiskFormMobile" method="POST" action="search.php">
	    <input type="text" id="poiskInputMobile" name="poiskInputMobile" class="poisk_gl_menu" placeholder="Поиск по сайту" maxlength = "256" />
	    <img src="images/Значок поиска.png" class="button_gl_menu" onClick="SearchMobile()"/>
	</form>
	
<script>    
    function SearchMobile ()
    {
		var text = $('#poiskInputMobile').val();
        var text = text.split(' ').join('');
        if(!text)
        {
            alert ("Запрос не может быть пустым!");
        }
        else if (text.length < 3)
        {
            alert ("Запрос не может состоять меньше 3 символов!");
        }
        else
        {
            $('#poiskFormMobile').submit();
        }
        return false;
    }
</script>

	<ul class="gl_menu_name">
		<li onClick="Open_menu('1')">Коран</li>
			<ul id="Op_1" >
				<li onClick="Menu('koran','Священный Коран','1')">Коран</li><br>
				<?php include 'PHP/Koran/navigation_koran.php'; ?>
				<br>
			</ul>
			
		<li onClick="Open_menu('2')">Сунны и хадисы</li>
			<ul id="Op_2" >
				<li onClick="Menu('sunna','Сунны и хадисы','2')">Сунны и хадисы</li>
				<?php include 'PHP/Sunny_Hadisy/navigation_sunny_hadisy.php'; ?>
			</ul>
	
		<li onClick="Open_menu('3')">Молитвы (дуа)</li>
			<ul id="Op_3" >
				<li onClick="Menu('molitvy_dua','Молитвы и Дуа','3')">Молитвы и Дуа</li><br>
				<?php include 'PHP/Molitvy_Dua/navigation_molitvy_dua.php'; ?>
			</ul>
			
		<li onClick="Open_menu('4')">Намаз</li>
			<ul id="Op_4" >
			<li onClick="Menu('namaz','Намаз','4')">Намаз</li><br>
				<?php include 'PHP/Namaz/namaz.php'; ?>
			</ul>	
			
		<li onClick="Open_menu('5')">Мухаммад (ﷺ)</li>
			<ul id="Op_5" >
			<li onClick="Menu('proroksav','Мухаммад (С.А.В.)','5')">Мухаммад (ﷺ)</li><br>
				<?php include 'PHP/Muhammed(SAV)/Muhammed(SAV).php'; ?>
			</ul>
			
		<li onClick="Open_menu('6')">Искусство и Ислам</li>
			<ul id="Op_6" >
			<li onClick="Menu('iskusstvo','Искусство и Ислам','6')">Искусство и Ислам</li><br>
				<?php include 'PHP/Iskusstvo/Iskusstvo.php'; ?>
			</ul>	
			
		<li onClick="Open_menu('7')">Образование</li>
			<ul id="Op_7" >
			<li onClick="Menu('education','Образование в Исламе','7')">Образование</li><br>
				<?php include 'PHP/Education/education.php'; ?>
			</ul>	
			
		<li onClick="Open_menu('8')">Семья  и Ислам</li>
			<ul id="Op_8" >
			<li onClick="Menu('family','Семья  и Ислам','8')">Семья  и Ислам</li><br>
				<?php include 'PHP/Family/family.php'; ?>
			</ul>
			
		<li onClick="Open_menu('9')">Добро</li>
			<ul id="Op_9" >
			<li onClick="Menu('dobro','Добро в Исламе','9')">Добро</li><br>
				<?php include 'PHP/Dobro/dobro.php'; ?>
			</ul>	
			
		<li onClick="Open_menu('10')">Хадж</li>
			<ul id="Op_10" >
			<li onClick="Menu('hadj','Хадж','10')">Хадж</li><br>
				<?php include 'PHP/Hadj/hadj.php'; ?>
			</ul>
	</ul>
</div>

<div id="kn_vyz_m" class="kn_vyz_menu" onClick="Vyz_menu()"></div>
<?php include 'header.php'; ?>
<div style="width: 100%; height: 1px;"></div>
<p class="razdel_spisok"><?php include 'list.php'; ?></p>

<!-- раздел меню -->
<div id="menuNavigation">
 <ul class="menu">
    <li><p id="1" onClick="Menu('koran','Священный Коран','1')">Коран</p>
     	<ul><?php include 'PHP/Koran/navigation_koran.php'; ?></ul>
	</li>	
	
    <li><p id="2" onClick="Menu('sunna','Сунны и хадисы','2')">Сунны и хадисы</p>
		<ul><?php include 'PHP/Sunny_Hadisy/navigation_sunny_hadisy.php'; ?></ul>
	</li>

	<li><p id="3" onClick="Menu('molitvy_dua','Молитвы и Дуа','3')">Молитвы и Дуа</p>
		<ul><?php include 'PHP/Molitvy_Dua/navigation_molitvy_dua.php'; ?></ul>
	</li>
	
	<li><p id="4" onClick="Menu('namaz','Намаз','4')">Намаз</p>
		<ul><?php include 'PHP/Namaz/namaz.php'; ?></ul>
	</li>
	
	<li><p id="5" onClick="Menu('proroksav','Мухаммад (С.А.В.)','5')">Мухаммад (ﷺ)</p>
		<ul><?php include 'PHP/Muhammed(SAV)/Muhammed(SAV).php'; ?></ul>
	</li>
	
	<li><p id="6" onClick="Menu('iskusstvo','Искусство и Ислам','6')">Искусство и Ислам</p>
		<ul><?php include 'PHP/Iskusstvo/Iskusstvo.php'; ?></ul>
	</li>
	
	<li><p id="7" onClick="Menu('education','Образование в Исламе','7')">Образование</p>
		<ul><?php include 'PHP/Education/education.php'; ?></ul>
	</li>

	<li><p id="8" onClick="Menu('family','Семья  и Ислам','8')">Семья  и Ислам</p>
	<ul><?php include 'PHP/Family/family.php'; ?></ul>
	</li>
	
	<li><p id="9" onClick="Menu('dobro','Добро в Исламе','9')">Добро</p>
	<ul style="margin-left:-117px;"><?php include 'PHP/Dobro/dobro.php'; ?></ul>
	</li>
	
	<li><p id="10" onClick="Menu('hadj','Хадж','10')">Хадж</p>
	<ul style="margin-left:-173px;"><?php include 'PHP/Hadj/hadj.php'; ?></ul>
	</li>
   </ul>
</div>


<?php include 'side.php'; ?><!-- Боковая панель -->
	
	<script>
		//Функция для проверки вопрос дня
        function Rez(){
           var ver = document.querySelector('input[name = "question_day"]:checked').value;
            if(ver == "<?php echo $trueQuestion[$number_question]; ?>")
               {
                    document.getElementById('Show_rez_question').innerHTML="Правильно! ";
                    document.getElementById('Show_rez_question').style.color = "green";
                    document.getElementById('Show_rez_question_2').innerHTML="Ответ: " + "<?php echo $trueQuestion[$number_question]; ?>";
                    document.getElementById('question_f').style.display='none';
               }
            else{
                    document.getElementById('Show_rez_question').innerHTML="Неправильно! ";
                    document.getElementById('Show_rez_question').style.color = "red";
                    document.getElementById('Show_rez_question_2').innerHTML="Ответ: " + "<?php echo $trueQuestion[$number_question]; ?>";
                    document.getElementById('question_f').style.display='none';
            }
        }
    </script>

	<script>
		//Функция для проверки вопрос дня (мобильная версия)
        function Rez_Mobile(){
           var ver = document.querySelector('input[name = "question_day_Mobile"]:checked').value;
            if(ver == "<?php echo $trueQuestion[$number_question]; ?>")
               {
                    document.getElementById('Show_rez_question_Mobile').innerHTML="Правильно! ";
                    document.getElementById('Show_rez_question_Mobile').style.color = "green";
                    document.getElementById('Show_rez_question_2_Mobile').innerHTML="Ответ: " + "<?php echo $trueQuestion[$number_question]; ?>";
                    document.getElementById('question_f_Mobile').style.display='none';
               }
            else{
                    document.getElementById('Show_rez_question_Mobile').innerHTML="Неправильно! ";
                    document.getElementById('Show_rez_question_Mobile').style.color = "red";
                    document.getElementById('Show_rez_question_2_Mobile').innerHTML="Ответ: " + "<?php echo $trueQuestion[$number_question]; ?>";
                    document.getElementById('question_f_Mobile').style.display='none';
            }
        }
    </script>
<!-- Контентная часть-->
<div id="contentText">

<?php if($menu=="koran")
	{
		if($menuNumber==1)
		{
			echo '<img src="images/mobile/menu/'.$menu_name.'.jpg" width="100%" height="auto" class="pic_mobilie">';
			echo '<p class="razdel_spisok_mobile"><a onclick="javascript:history.back(); return false;">Вернуться назад</a> | <a href="index.php" target="_self">Главная</a> | <a onClick=\'Menu("'.$menu.'","'.$menu_name.'","'.$mn.'")\'>'.$menu_name.'</a> | '.$name[$value].'</p>';
			include 'sideMobile.php';
			echo '<div class="name">'.$menuName[$menuNumber-1].'</div>';
			echo $menuOsnText[$menuNumber-1];
			echo '<p class="videoName">Видео с чтением Корана</p>';
			include 'PHP/video.php';
			echo $menuText[$menuNumber-1]."<br /><br />";
			echo '<p class="next_razdel" onClick=\'Sura("0","sura1","Коран | Открывающая Книгу")\'>Перейти к суре "Аль - Фатиха"</p>';
		}
		else
		{	
			echo '<img src="images/mobile/sura/Суры.jpg" width="100%" height="auto" class="pic_mobilie">';
			echo '<p class="razdel_spisok_mobile"><a onclick="javascript:history.back(); return false;">Вернуться назад</a> | <a href="index.php" target="_self">Главная</a> | <a onClick=\'Menu("'.$menu.'","'.$menu_name.'","'.$mn.'")\'>'.$menu_name.'</a> | '.$name[$value].'</p>';
			include 'sideMobile.php';
			echo '<div class="name">'."О СУРЕ".$name[$value].'</div>';
			include 'PHP/Koran/kontent_koran.php';
		}
	}

	else if($menu=="sunna")
	{
		if($menuNumber==2)
		{
			echo '<img src="images/mobile/menu/'.$menu_name.'.jpg" width="100%" height="auto" class="pic_mobilie">';
			echo '<p class="razdel_spisok_mobile"><a onclick="javascript:history.back(); return false;">Вернуться назад</a> | <a href="index.php" target="_self">Главная</a> | <a onClick=\'Menu("'.$menu.'","'.$menu_name.'","'.$mn.'")\'>'.$menu_name.'</a> | '.$nameUn[$univArgNumber].'</p>';
			include 'sideMobile.php';
			echo '<div class="name">'.$menuName[$menuNumber-1].'</div>';
			echo $menuOsnText[$menuNumber-1];
			echo '<p class="videoName">Видео Что такое Сунна?</p>';
			include 'PHP/video.php';
			echo $menuText[$menuNumber-1]."<br /><br />";
			echo '<p class="next_razdel" onClick=\'Universal("0","sunna","Сунны и хадисы | Азан")\'>Перейти к сунне Азана';
		}
		else
		{	
			echo '<img src="images/mobile/sunna/'.$nameUn[$univArgNumber].'.jpg" width="100%" height="auto" class="pic_mobilie">';
			echo '<p class="razdel_spisok_mobile"><a onclick="javascript:history.back(); return false;">Вернуться назад</a> | <a href="index.php" target="_self">Главная</a> | <a onClick=\'Menu("'.$menu.'","'.$menu_name.'","'.$mn.'")\'>'.$menu_name.'</a> | '.$nameUn[$univArgNumber].'</p>';
			include 'sideMobile.php';
			echo '<div class="name">'.$nameUn[$univArgNumber]."</div>";
			echo $textUn[$univArgNumber]."<br />";
			echo '<p class="videoName">Видео '.$nameUn[$univArgNumber].'</p>';
			include 'PHP/video.php';
            echo $textUn_2[$univArgNumber]."<br />";
			}
	}
	
		else if($menu=="molitvy_dua")
	{
		if($menuNumber==3)
		{
			echo '<img src="images/mobile/menu/'.$menu_name.'.jpg" width="100%" height="auto" class="pic_mobilie">';
			echo '<p class="razdel_spisok_mobile"><a onclick="javascript:history.back(); return false;">Вернуться назад</a> | <a href="index.php" target="_self">Главная</a> | <a onClick=\'Menu("'.$menu.'","'.$menu_name.'","'.$mn.'")\'>'.$menu_name.'</a> | '.$nameUn[$univArgNumber].'</p>';
			include 'sideMobile.php';
			echo '<div class="name">'.$menuName[$menuNumber-1].'</div>';
			echo $menuOsnText[$menuNumber-1];
			echo '<p class="videoName">Видео Молитвы и Дуа</p>';
			include 'PHP/video.php';
			echo $menuText[$menuNumber-1]."<br /><br />";
			echo '<p class="next_razdel" onClick=\'Universal("0","molitvy_dua","Молитвы (Дуа) | Дуа за родителей")\'>Перейти к дуа</p>';
		}
		else
		{	
			echo '<img src="images/mobile/molitvy_dua/Делает дуа.jpg" width="100%" height="auto" class="pic_mobilie">';
			echo '<p class="razdel_spisok_mobile"><a onclick="javascript:history.back(); return false;">Вернуться назад</a> | <a href="index.php" target="_self">Главная</a> | <a onClick=\'Menu("'.$menu.'","'.$menu_name.'","'.$mn.'")\'>'.$menu_name.'</a> | '.$nameUn[$univArgNumber].'</p>';
			include 'sideMobile.php';
			echo '<div class="name">'.$nameUn[$univArgNumber]."</div>";
			echo $textUn[$univArgNumber]."<br />";			
			/*echo '<p class="videoName">Видео '.$nameUn[$univArgNumber].'</p>';
			include 'PHP/video.php';
            echo $textUn_2[$univArgNumber]."<br />";*/
			}
	}
	
		else if($menu=="namaz")
	{
		if($menuNumber==4)
		{
			echo '<img src="images/mobile/menu/'.$menu_name.'.jpg" width="100%" height="auto" class="pic_mobilie">';
			echo '<p class="razdel_spisok_mobile"><a onclick="javascript:history.back(); return false;">Вернуться назад</a> | <a href="index.php" target="_self">Главная</a> | <a onClick=\'Menu("'.$menu.'","'.$menu_name.'","'.$mn.'")\'>'.$menu_name.'</a> | '.$nameUn[$univArgNumber].'</p>';
			include 'sideMobile.php';
			echo '<div class="name">'.$menuName[$menuNumber-1].'</div>';
			echo $menuOsnText[$menuNumber-1];
			echo '<p class="videoName">Видео Намаз</p>';
			include 'PHP/video.php';
			echo $menuText[$menuNumber-1]."<br /><br />";
			echo '<p class="next_razdel" onClick=\'Universal("0","namaz","Намаз | Утренний намаз")\'>Перейти к утреннему намаза</p>';
		}
		else
		{	
			echo '<img src="images/mobile/namaz/'.$nameUn[$univArgNumber].'.jpg" width="100%" height="auto" class="pic_mobilie">';
			echo '<p class="razdel_spisok_mobile"><a onclick="javascript:history.back(); return false;">Вернуться назад</a> | <a href="index.php" target="_self">Главная</a> | <a onClick=\'Menu("'.$menu.'","'.$menu_name.'","'.$mn.'")\'>'.$menu_name.'</a> | '.$nameUn[$univArgNumber].'</p>';
			include 'sideMobile.php';
			echo '<div class="name">'.$nameUn[$univArgNumber]."</div>";
			echo $textUn[$univArgNumber]."<br />";
			echo '<p class="videoName">Видео '.$nameUn[$univArgNumber].'</p>';
			include 'PHP/video.php';
            echo $textUn_2[$univArgNumber]."<br />";
			}
	}
	
		else if($menu=="proroksav")
	{
		if($menuNumber==5)
		{
			echo '<img src="images/mobile/menu/'.$menu_name.'.jpg" width="100%" height="auto" class="pic_mobilie">';
			echo '<p class="razdel_spisok_mobile"><a onclick="javascript:history.back(); return false;">Вернуться назад</a> | <a href="index.php" target="_self">Главная</a> | <a onClick=\'Menu("'.$menu.'","'.$menu_name.'","'.$mn.'")\'>'.$menu_name.'</a> | '.$nameUn[$univArgNumber].'</p>';
			include 'sideMobile.php';
			echo '<div class="name">'.$menuName[$menuNumber-1].'</div>';
			echo $menuOsnText[$menuNumber-1];
			echo '<p class="videoName">Видео Мухаммад (ﷺ)</p>';
			include 'PHP/video.php';
			echo $menuText[$menuNumber-1]."<br /><br />";
			echo '<p class="next_razdel" onClick=\'Universal("0","proroksav","Мухаммад(С.А.В.) | 40 хадисов Мухаммада (ﷺ)")\'>Перейти к 40 хадисам Мухаммада (ﷺ)</p>';
		}
		else
		{	
			$replaceName = preg_replace('/(ﷺ)/', 'саллалЛаху алейхи ва саллям', $nameUn[$univArgNumber]);
			//echo $replaceName;
			echo '<img src="images/mobile/proroksav/'.$replaceName.'.jpg" width="100%" height="auto" class="pic_mobilie">';
			echo '<p class="razdel_spisok_mobile"><a onclick="javascript:history.back(); return false;">Вернуться назад</a> | <a href="index.php" target="_self">Главная</a> | <a onClick=\'Menu("'.$menu.'","'.$menu_name.'","'.$mn.'")\'>'.$menu_name.'</a> | '.$nameUn[$univArgNumber].'</p>';
			include 'sideMobile.php';
			echo '<div class="name">'.$nameUn[$univArgNumber]."</div>";
			echo $textUn[$univArgNumber]."<br />";
			echo '<p class="videoName">Видео '.$nameUn[$univArgNumber].'</p>';
			include 'PHP/video.php';
            echo $textUn_2[$univArgNumber]."<br />";
			}
	}
	
			else if($menu=="iskusstvo")
	{
		if($menuNumber==6)
		{
			echo '<img src="images/mobile/menu/'.$menu_name.'.jpg" width="100%" height="auto" class="pic_mobilie">';
			echo '<p class="razdel_spisok_mobile"><a onclick="javascript:history.back(); return false;">Вернуться назад</a> | <a href="index.php" target="_self">Главная</a> | <a onClick=\'Menu("'.$menu.'","'.$menu_name.'","'.$mn.'")\'>'.$menu_name.'</a> | '.$nameUn[$univArgNumber].'</p>';
			include 'sideMobile.php';
			echo '<div class="name">'.$menuName[$menuNumber-1].'</div>';
			echo $menuOsnText[$menuNumber-1];
			echo '<p class="videoName">Видео Искусство и Ислам</p>';
			include 'PHP/video.php';
			echo $menuText[$menuNumber-1]."<br /><br />";
            echo '<p class="next_razdel" onClick=\'Universal("0","iskusstvo","Искусство и Ислам | Изображения в Исламе")\'>Перейти к изображению в Исламе</p>';
		}
		else
		{	
			echo '<img src="images/mobile/iskusstvo/'.$nameUn[$univArgNumber].'.jpg" width="100%" height="auto" class="pic_mobilie">';
			echo '<p class="razdel_spisok_mobile"><a onclick="javascript:history.back(); return false;">Вернуться назад</a> | <a href="index.php" target="_self">Главная</a> | <a onClick=\'Menu("'.$menu.'","'.$menu_name.'","'.$mn.'")\'>'.$menu_name.'</a> | '.$nameUn[$univArgNumber].'</p>';
			include 'sideMobile.php';
			echo '<div class="name">'.$nameUn[$univArgNumber]."</div>";
			echo $textUn[$univArgNumber]."<br />";
			echo '<p class="videoName">Видео '.$nameUn[$univArgNumber].'</p>';
			include 'PHP/video.php';
            echo $textUn_2[$univArgNumber]."<br />";
			}
	}

		else if($menu=="education")
	{
		if($menuNumber==7)
		{
			echo '<img src="images/mobile/menu/'.$menu_name.'.jpg" width="100%" height="auto" class="pic_mobilie">';
			echo '<p class="razdel_spisok_mobile"><a onclick="javascript:history.back(); return false;">Вернуться назад</a> | <a href="index.php" target="_self">Главная</a> | <a onClick=\'Menu("'.$menu.'","'.$menu_name.'","'.$mn.'")\'>'.$menu_name.'</a> | '.$nameUn[$univArgNumber].'</p>';
			include 'sideMobile.php';
			echo '<div class="name">'.$menuName[$menuNumber-1].'</div>';
			echo $menuOsnText[$menuNumber-1];
			echo '<p class="videoName">Видео образование в Исламе</p>';
			include 'PHP/video.php';
			echo $menuText[$menuNumber-1]."<br /><br />";
		    echo '<p class="next_razdel" onClick=\'Universal("0","education","Образование в Исламе | Зарождение Ислама")\'>Перейти к зарождению Ислама</p>';
		}
		else
		{	
			echo '<img src="images/mobile/education/'.$nameUn[$univArgNumber].'.jpg" width="100%" height="auto" class="pic_mobilie">';
			echo '<p class="razdel_spisok_mobile"><a onclick="javascript:history.back(); return false;">Вернуться назад</a> | <a href="index.php" target="_self">Главная</a> | <a onClick=\'Menu("'.$menu.'","'.$menu_name.'","'.$mn.'")\'>'.$menu_name.'</a> | '.$nameUn[$univArgNumber].'</p>';
			include 'sideMobile.php';
			echo '<div class="name">'.$nameUn[$univArgNumber]."</div>";
			echo $textUn[$univArgNumber]."<br />";
			echo '<p class="videoName">Видео '.$nameUn[$univArgNumber].'</p>';
			include 'PHP/video.php';
            echo $textUn_2[$univArgNumber]."<br />";
			}
	}
	
	else if($menu=="family")
	{
		if($menuNumber==8)
		{
			echo '<img src="images/mobile/menu/'.$menu_name.'.jpg" width="100%" height="auto" class="pic_mobilie">';
			echo '<p class="razdel_spisok_mobile"><a onclick="javascript:history.back(); return false;">Вернуться назад</a> | <a href="index.php" target="_self">Главная</a> | <a onClick=\'Menu("'.$menu.'","'.$menu_name.'","'.$mn.'")\'>'.$menu_name.'</a> | '.$nameUn[$univArgNumber].'</p>';
			include 'sideMobile.php';
			echo '<div class="name">'.$menuName[$menuNumber-1].'</div>';
			echo $menuOsnText[$menuNumber-1];
			echo '<p class="videoName">Видео Семья и Ислам</p>';
			include 'PHP/video.php';
			echo $menuText[$menuNumber-1]."<br /><br />";
			echo '<p class="next_razdel" onClick=\'Universal("0","family","Семья и Ислам | Три дуа, чтобы муж полюбил свою жену")\'>Перейти к трем дуам, чтобы муж полюбил свою жену</p>';
		}
		else
		{	
			echo '<img src="images/mobile/family/'.$nameUn[$univArgNumber].'.jpg" width="100%" height="auto" class="pic_mobilie">';
			echo '<p class="razdel_spisok_mobile"><a onclick="javascript:history.back(); return false;">Вернуться назад</a> | <a href="index.php" target="_self">Главная</a> | <a onClick=\'Menu("'.$menu.'","'.$menu_name.'","'.$mn.'")\'>'.$menu_name.'</a> | '.$nameUn[$univArgNumber].'</p>';
			include 'sideMobile.php';
			echo '<div class="name">'.$nameUn[$univArgNumber]."</div>";
			echo $textUn[$univArgNumber]."<br />";
			echo '<p class="videoName">Видео '.$nameUn[$univArgNumber].'</p>';
			include 'PHP/video.php';
            echo $textUn_2[$univArgNumber]."<br />";
			}
	}
	
	else if($menu=="dobro")
	{
		if($menuNumber==9)
		{
			echo '<img src="images/mobile/menu/'.$menu_name.'.jpg" width="100%" height="auto" class="pic_mobilie">';
			echo '<p class="razdel_spisok_mobile"><a onclick="javascript:history.back(); return false;">Вернуться назад</a> | <a href="index.php" target="_self">Главная</a> | <a onClick=\'Menu("'.$menu.'","'.$menu_name.'","'.$mn.'")\'>'.$menu_name.'</a> | '.$nameUn[$univArgNumber].'</p>';
			include 'sideMobile.php';
			echo '<div class="name">'.$menuName[$menuNumber-1].'</div>';
			echo $menuOsnText[$menuNumber-1];
			echo '<p class="videoName">Видео Твори добро</p>';
			include 'PHP/video.php';
			echo $menuText[$menuNumber-1]."<br /><br />";
			echo '<p class="next_razdel" onClick=\'Universal("0","dobro","Добро | И добро от Аллаха, и зло от Аллаха")\'>Перейти к разделу: "И добро от Аллаха, и зло от Аллаха"</p>';
		}
		else
		{			
			echo '<img src="images/mobile/dobro/'.$nameUn[$univArgNumber].'.jpg" width="100%" height="auto" class="pic_mobilie">';
			echo '<p class="razdel_spisok_mobile"><a onclick="javascript:history.back(); return false;">Вернуться назад</a> | <a href="index.php" target="_self">Главная</a> | <a onClick=\'Menu("'.$menu.'","'.$menu_name.'","'.$mn.'")\'>'.$menu_name.'</a> | '.$nameUn[$univArgNumber].'</p>';
			include 'sideMobile.php';
			echo '<div class="name">'.$nameUn[$univArgNumber]."</div>";
			echo $textUn[$univArgNumber]."<br />";
			echo '<p class="videoName">Видео '.$nameUn[$univArgNumber].'</p>';
			include 'PHP/video.php';
            echo $textUn_2[$univArgNumber]."<br />";
			}
	}
	
	else if($menu=="hadj")
	{
		if($menuNumber==10)
		{
			echo '<img src="images/mobile/menu/'.$menu_name.'.jpg" width="100%" height="auto" class="pic_mobilie">';
			echo '<p class="razdel_spisok_mobile"><a onclick="javascript:history.back(); return false;">Вернуться назад</a> | <a href="index.php" target="_self">Главная</a> | <a onClick=\'Menu("'.$menu.'","'.$menu_name.'","'.$mn.'")\'>'.$menu_name.'</a> | '.$nameUn[$univArgNumber].'</p>';
			include 'sideMobile.php';
			echo '<div class="name">'.$menuName[$menuNumber-1].'</div>';
			echo $menuOsnText[$menuNumber-1];
			echo '<p class="videoName">Видео Хадж</p>';
			include 'PHP/video.php';
			echo $menuText[$menuNumber-1]."<br /><br />";
			echo '<p class="next_razdel" onClick=\'Universal("0","family","Семья и Ислам | Три дуа, чтобы муж полюбил свою жену")\'>Перейти к трем дуам, чтобы муж полюбил свою жену</p>';
		}
		else
		{		
			echo '<img src="images/mobile/hadj/Хадж.jpg" width="100%" height="auto" class="pic_mobilie">';
			echo '<p class="razdel_spisok_mobile"><a onclick="javascript:history.back(); return false;">Вернуться назад</a> | <a href="index.php" target="_self">Главная</a> | <a onClick=\'Menu("'.$menu.'","'.$menu_name.'","'.$mn.'")\'>'.$menu_name.'</a> | '.$nameUn[$univArgNumber].'</p>';
			include 'sideMobile.php';
			echo '<div class="name">'.$nameUn[$univArgNumber]."</div>";
			echo $textUn[$univArgNumber]/*."<br />"*/;
			/*echo '<p class="videoName">Видео '.$nameUn[$univArgNumber].'</p>';
			include 'PHP/video.php';*/
            echo $textUn_2[$univArgNumber]."<br />";
		}
	}
 ?>

<!-- Переключение страниц -->

<p class="nextLeft" onClick='Sura("<?php echo $value-1; ?>", "<?php $suraBase1 = substr($suraBase, 0, 4); echo $suraBase1.$value; ?>", "<?php echo "Священный Коран | ".$name[$value - 1]; ?>")' id="nextL" title="<?php echo $name[$value-1]; ?>">Пред. страница<?php if($value!=0){echo ": ".$name[$value-1]; }else{ echo " ..."; } ?></p>
<p class="nextRigth" onClick='Sura("<?php echo $value+1; ?>", "<?php $suraBase1 = substr($suraBase, 0, 4); $value1=$value+2; echo $suraBase1.$value1; ?>", "<?php echo "Священный Коран | ".$name[$value + 1]; ?>")' id="nextR" title="<?php echo $name[$value+1]; ?>">След. страница<?php if($value!=count($id)-1){echo ": ".$name[$value+1]; }else{ echo " ..."; } ?></p>

<p class="nextLeft" id="nextL_2" onClick='Universal("<?php echo $univArgNumber-1; ?>","<?php echo $menu; ?>","<?php echo $un_menu." | ".$nameUn[$univArgNumber - 1]; ?>")' title="<?php echo $nameUn[$univArgNumber-1]; ?>">Пред. страница<?php if($univArgNumber!=0){echo ": ".$nameUn[$univArgNumber-1]; }else{ echo " ..."; } ?></p>
<p class="nextRigth" id="nextR_2" onClick='Universal("<?php echo $univArgNumber+1; ?>","<?php echo $menu; ?>","<?php echo $un_menu." | ".$nameUn[$univArgNumber + 1]; ?>")' title="<?php echo $nameUn[$univArgNumber+1]; ?>">След. страница<?php if($univArgNumber!=count($idUn)-1){echo ": ".$nameUn[$univArgNumber+1]; }else{ echo " ..."; } ?></p>
</div>


<?php include 'footer.php' ?><!-- Подвал -->

</div>
<script>
//запрет перехода к странице

if('<?php echo $value; ?>'==0||'<?php echo $univArgNumber; ?>'==0)
{
	$(".nextLeft").css("pointer-events","none");
	$(".nextLeft").css("color","#a3a3a3");
}
if('<?php echo $value; ?>'=='<?php echo (int)count($id)-1; ?>'||'<?php echo $value; ?>'=='<?php echo (int)count($idUn)-1; ?>')
{
	$(".nextRigth").css("pointer-events","none");
	$(".nextRigth").css("color","#a3a3a3");
}

//Уравнения высоты навигации с контентом 

	var a=$('#contentText').height();
	$('#navigation').height(a+51);

//Функция присвоения значения форме "menuForm"

 function Menu(menuArg1,menuArg2,menuArg3){
	document.menuForm.menuInput.value=menuArg1;
	document.menuForm.titleInput.value=menuArg2;
	document.menuForm.menuNumber.value=menuArg3;
	document.menuForm.submit(); 
 }
	Menu2('<?php echo $menu; ?>');

	var select = <?php echo $menuNumber; ?>;
	if(select == 0){
		document.getElementById('nextL').style.display ="inline-block";
		document.getElementById('nextR').style.display ="block";
	}
	else if(select == 100){
		document.getElementById('nextL_2').style.display ="inline-block";
		document.getElementById('nextR_2').style.display ="block";		
	}

	//Функция дл определения состояние ссылки на соц. сеть при наведении мыши
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
	//Функция дл определения состояние ссылки на соц. сеть при отведении мыши
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
</div>
</body>
</html>

 	