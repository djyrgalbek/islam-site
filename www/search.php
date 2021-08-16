<?php
    setlocale(LC_ALL, "ru_RU.UTF-8");
    $db=mysql_connect ("localhost","root","","mybasequran");
    mysql_set_charset ("utf-8",$db);
    mysql_select_db ("mybasequran",$db) or die("Нет соединения с БД. ".mysql_error());
    $glText=Array();
    $glTextRead=mysql_query("SELECT * FROM `text`", $db);

    while ($glTextReadArray=mysql_fetch_array ($glTextRead))
    {
		$glText[$k] = $glTextReadArray['text'];
		$k++;
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="style_error.css">
	<script type="text/javascript" src="jquery-321js-1.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Fira+Sans|Roboto+Condensed" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Neucha|Patrick+Hand|Shadows+Into+Light+Two" rel="stylesheet">	

    <title>Joodar-jannat.ru | Результаты поиска</title>
</head>
<body>
<style>
    .rez
    {
        padding: 30px;
        min-height: 370px;
        font: normal 16px 'Roboto Condensed', Roboto, 'Fira Sans', sans-serif;
        color: #000;
    }
    .rez span
    {
        color: orange;
    }
    .rez p
    {
        color: #000;
        margin-top: 5px;
    }
    .rez p:hover
    {
        text-decoration: underline;
    }
    .rez p:active
    {
        text-decoration: none;
    }
    .rez div
    {
        padding-bottom: 15px;
        margin-bottom: 25px;
        border-bottom: 1px solid orange;
    }
    .rez div .back
    {
        font: normal 16px 'Roboto Condensed', Roboto, 'Fira Sans', sans-serif;
        color: #000;
    }
    .back:hover
    {
        text-decoration: underline;
    }
    .back:active
    {
        text-decoration: none;
    }
</style>
<div class="fon">
<?php include 'header.php'; 
echo '<img src="images/fon1.jpg" class="searchMobilePic">';
?>
<div class="rez">

<div>
    <a class="back" onclick="javascript:history.back(); return false;">Вернуться назад</a><span> | </span><a class="back" href="index.php" target="_self">Главная</a>
</div>
<?php 
    $start = false;

    if (isset ($_POST['poiskInput']))
    {
        $rez = $_POST['poiskInput'];
        $start = true;
        $arrRez = explode(" ", $rez);
        $sumRez = count($arrRez);
    }
    else if (isset ($_POST['poiskInputMobile']))
    {
        $rez = $_POST['poiskInputMobile'];
        $start = true;
        $arrRez = explode(" ", $rez);
        $sumRez = count($arrRez);
    }
    if ($start == true)
    {
        $arrayDB = array ("tablequran", "sunna", "molitvy_dua", "namaz", "proroksav", "iskusstvo", "education", "family", "dobro", "hadj", "menu");
        $arrMenu = array ("koran", "sunna", "molitvy_dua", "namaz", "proroksav", "iskusstvo", "education", "family", "dobro", "hadj");
        $nameMenu = Array();
        $n = 0;
        $sum = 0;
        $menu = mysql_query("SELECT * FROM `menu`", $db);
	
	    while($arrayMenu=mysql_fetch_array($menu))
	    {
            $nameMenu[$n] = $arrayMenu['name'];
		    $n++;
        }

        //echo "<br /><b>Меню </b>".$nameMenu[0]."<br />";
        echo "<b>Ваш запрос: </b>".$rez;
        
        for ($r=0; $r<count($arrRez); $r++)
        {   
            $arrRez[$r] = mb_strtolower($arrRez[$r],'utf-8'); 
            $arrRez[$r] = preg_replace('/[^a-zA-Zа-яА-Я0-9]/ui', '', $arrRez[$r]);
        }
        
        echo '<br />Результаты поиска: найдено <span id="rez"></span> файл(-а -ов).<br /><br />';
        for ($i = 0; $i<count($arrayDB); $i++)
        {
            $id = Array();
            $name = Array();
            $arr = Array();
            $k = 0;
            $marginBottom = 0;

            $dataColumnName = mysql_query("SELECT * FROM `$arrayDB[$i]`", $db);
            $num = mysql_num_rows($dataColumnName);
            
        while($arrColumnName = mysql_fetch_array($dataColumnName))
        {
		    $id[$k]=$arrColumnName['id'];
		    $name[$k]=$arrColumnName['name'];
		    $k++;
        }
        
        for ($ii = 0; $ii<$num; $ii++)
        {
            $arr[$ii] = preg_replace('/[^a-zA-Zа-яА-Я0-9]/ui', '', $name[$ii]);
            $arr[$ii] = mb_strtolower( $arr[$ii],'utf-8'); 
            //echo "<br />$ii. $arr[$ii]";

            if ($sumRez == 1)
            {
                if (preg_match("/$arrRez[0]/i", $arr[$ii]))
                {
                    $sum++;
                    $marginBottom++;
                    //echo ' <b>true</b>';
    
                    if ($arrayDB[$i] == "menu")
                    {
                        $index = $ii + 1;
                        echo '<p onClick=\'Menu("'.$arrMenu[$ii].'","'.$name[$ii].'","'.$index.'")\')>'.$name[$ii].'</p>';
                    }
                    else if ($arrayDB[$i] == "tablequran")
                    {
                        $index = $ii + 1;
                        echo '<p onClick=\'Sura("'.$ii.'", "sura'.$index.'", "'.$nameMenu[$i].'")\')>'.$name[$ii].'</p>';
                    }
                    else
                    {
                        echo '<p onClick=\'Universal("'.$ii.'","'.$arrayDB[$i].'","'.$nameMenu[$i].'" | "'.$name[$ii].'")\'>'.$name[$ii].'</p>';
                    }   
                }
            }
            else if ($sumRez >= 2) 
            {
                $sumT = 0;
                for ($t=0; $t<$sumRez; $t++)
                {
                    if (preg_match("/$arrRez[$t]/i", $arr[$ii]))
                    {
                        $arr_0[$ii] = $sumT++;
                    }
                    else
                    {
                        $arr_0[$ii] = 0;
                    }
                }  

               if ($sumT >= $sumRez)
               {
                    $sum++;
                    $marginBottom++;
                    //echo ' <b>true</b>';

                    if ($arrayDB[$i] == "menu")
                    {
                        $index = $ii + 1;
                        echo '<p onClick=\'Menu("'.$arrMenu[$ii].'","'.$name[$ii].'","'.$index.'")\')>'.$name[$ii].'</p>';
                    }
                    else if ($arrayDB[$i] == "tablequran")
                    {
                        $index = $ii + 1;
                        echo '<p onClick=\'Sura("'.$ii.'", "sura'.$index.'", "'.$nameMenu[$i].'")\')>'.$name[$ii].'</p>';
                    }
                    else
                    {
                        echo '<p onClick=\'Universal("'.$ii.'","'.$arrayDB[$i].'","'.$nameMenu[$i].'" | "'.$name[$ii].'")\'>'.$name[$ii].'</p>';
                    }   
               }
               
            }

            else
            {
                //echo ' <b>false</b>';
            }
        }
        if ($marginBottom!=0)
        {
            echo "<br />";
        }
    }
    /*print_r($arr_0);
    echo '<br />';
    print_r($arr_1);*/
    
    echo '<script>$(\'#rez\').html('.$sum.')</script>';
    }
?>
</div>
<?php include 'PHP/soobshenie.php';?>
<?php include 'footer.php';?>

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

<script>
     function Sura(sura,word,title){
        document.SuraForm.numberSura.value=sura;
        document.SuraForm.wordSura.value=word;
        document.SuraForm.titleSura.value=title;
        document.SuraForm.submit();
    }

    function Universal(unArg1,unArg2,unArg3){
        document.UniversalForm.UniversalNum.value=unArg1;
        document.UniversalForm.UniversalText.value=unArg2;
        document.UniversalForm.UniversalTitle.value=unArg3;
        document.UniversalForm.submit();
    }

    function Menu(menuArg1,menuArg2,menuArg3){
	    document.menuForm.menuInput.value=menuArg1;
	    document.menuForm.titleInput.value=menuArg2;
	    document.menuForm.menuNumber.value=menuArg3;
	    document.menuForm.submit(); 
    }
</script>

</div>
</body>
</html>

