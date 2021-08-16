<?php 
	$menu_name="";
	$mn;
	 if($menu=="koran"){
		 $menu_name = "Священный Коран";
		 $mn = 1;
		 echo '<a onclick="javascript:history.back(); return false;">Вернуться назад</a> | <a href="index.php" target="_self">Главная</a> | <a onClick=\'Menu("'.$menu.'","'.$menu_name.'","'.$mn.'")\'>'.$menu_name.'</a> | '.$name[$value];
		}
	 else if($menu=="sunna"){
		 $menu_name = "Сунны и хадисы";
		 $mn = 2;
	 }
	 else if($menu=="molitvy_dua"){
		 $menu_name = "Молитвы и Дуа";
		 $mn = 3;
	 }
	 else if($menu=="namaz"){
		 $menu_name = "Намаз";
		 $mn = 4;
	 }
	 else if($menu=="proroksav"){
		 $menu_name = "Мухаммад, мир ему и благословение";
		 $mn = 5;
	 }
	 else if($menu=="iskusstvo"){
		 $menu_name = "Искусство и Ислам";
		 $mn = 6;
	 }
	 else if($menu=="education"){
		 $menu_name = "Образование в Исламе";
		 $mn = 7;
	 }
	 else if($menu=="family"){
		 $menu_name = "Семья и Ислам";
		 $mn = 8;
	 }
	 else if($menu=="dobro"){
		 $menu_name = "Добро в Исламе";
		 $mn = 9;
	 }
	 else if($menu=="hadj"){
		 $menu_name = "Хадж";
		 $mn = 10;
	 }
	 
	 if($menu!="koran"){
	 echo '<a onclick="javascript:history.back(); return false;">Вернуться назад</a> | <a href="index.php" target="_self">Главная</a> | <a onClick=\'Menu("'.$menu.'","'.$menu_name.'","'.$mn.'")\'>'.$menu_name.'</a> | '.$nameUn[$univArgNumber];
	}
	?>
	