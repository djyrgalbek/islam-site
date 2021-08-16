<?php

    $db=mysql_connect ("localhost","cf77513_jannat","Jannat17","cf77513_jannat");
    mysql_set_charset ("utf-8",$db);
    mysql_select_db ("cf77513_jannat",$db) or die("Нет соединения с БД. ".mysql_error());
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
        min-height: 500px;
        font: normal 16px 'Roboto Condensed', Roboto, 'Fira Sans', sans-serif;
        color: #000;
    }
    .back
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
    .rez .source
    {
        color: #000;
    }
    .rez .source:hover
    {
        color: orange;
    }
    .rez .source:active
    {
        text-decoration: none;
    }
</style>

    <div class="fon">
        <?php include 'header.php'; ?>
        <img src="images/fon1.jpg" class="searchMobilePic">
        <div class="rez">
            <a class="back" onclick="javascript:history.back(); return false;">Вернуться назад</a><br /><br />
            <a class="source" href="https://islam.global/" target="_blank">islam.global</a>
            <br /><a class="source" href="https://islam-today.ru/" target="_blank">islam-today.ru</a>
            <br /><a class="source" href="http://muslimclub.ru/" target="_blank">muslimclub.ru</a>
            <br /><a class="source" href="http://www.umma.ru/" target="_blank">umma.ru</a>
            <br /><a class="source" href="http://www.islam.ru/" target="_blank">islam.ru</a>
            <br /><a class="source" href="http://www.islamDag.ru/" target="_blank">islamDag.ru</a>
            <br /><br /><p>и другие</p>
        </div>
        <?php include 'PHP/soobshenie.php';?>
        <?php include 'footer.php'; ?>
    </div>
</body>
</html>