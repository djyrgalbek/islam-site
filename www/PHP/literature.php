<?php

    $db=mysql_connect ("localhost","root","","mybasequran");
    mysql_set_charset ("utf-8",$db);
    mysql_select_db ("mybasequran",$db) or die("Нет соединения с БД".mysql_error());
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
    <div class="fon">
        <?php include 'header.php'; ?>
        <?php include 'footer.php'; ?>
    </div>
</body>
</html>