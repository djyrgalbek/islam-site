<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Результат отправки сообщения | Joodar-jannat.kg</title>
    <script>history.go(-1)</script>
</head>
<body>
    
</body>
</html>
<?php 
			if (isset($_POST['email']) && isset($_POST['soo']))
			{
			
			$email = $_POST['email'];
			$soo = $_POST['soo'];
			//echo "$email <br /> $soo";
			if($email!=""){ 
				mail(
		't.jyrgal@bk.ru, jyrgalbek@cf77513.tmweb.ru',
		'Сообщение об ошибке на сайте Joodar-jannat.ru',
		'<html><body>
		<img src="http://joodar-jannat.ru/images/fon1.jpg" width="100%" height="auto" alt="Сообщение об ошибке">
		<h3 align="center"><b>Ошибка на сайте</b></h3>
		<p><b>Почта: </b>'.$email.'<br>
		<b>Ошибка: </b>'.$soo.'</p><br>
		</body></html>',
		"From: t.jyrgal@bk.ru\r\n"
		."Content-type: text/html; charset=utf-8\r\n"
		."X-Mailer: PHP mail script");
				echo "<br /><p>Сообщение успешно отправлено.</p>"; 
				}
		}
        ?> 