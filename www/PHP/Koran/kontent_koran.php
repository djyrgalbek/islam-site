<?php echo $text[$value];?><br>

<!-- Видео -->
<p class="videoName">Видео с чтением суры <?php echo $name[$value]; ?></p>

<?php include 'PHP/video.php'; ?>

<!-- Заголовок -->
	<div style="margin-top:25px; width:100%; text-align:center;"> <img style="width:120px; heigth:120px; background-size:canvas;" src="/images/sura.png" alt="Изображения Книги Корана"></div>
<p id="Language">ТЕКСТ СУРЫ НА АРАБСКОМ, ТРАНСКРИПЦИЯ И ПЕРЕВОД НА РУССКИЙ ЯЗЫК</p>

<!-- Начало сур -->
<p>
<?php 
if ($suraBase == "sura1")
{
	echo '<br /><div class="number">1 : 1</div><div class="green">بِسْمِ اللّهِ الرَّحْمنِ الرَّحِيمِ</div>'.'<div class="blue">Бисмилляхир-Рахманир-Рахиим</div>'.'<div class="black">Во имя Аллаха Милостивого и Милосердного!</div>';
	for($i=0;$i<count($arabLanguage);$i++){
$numSura = (int) $idSura[$i] + 1;
		echo '<div class="number">'.$id[$value]." : ".$numSura.'<br /></div>'.'<div class="green">'.$arabLanguage[$i].'</div>'.'<div class="blue">'.$translit[$i].'</div>'.'<div class="black">'.$rusLanguage[$i].'</div>';
		}
}
else 
{
	echo '<div class="green">بِسْمِ اللّهِ الرَّحْمنِ الرَّحِيمِ</div>'.'<div class="blue">Бисмилляхир-Рахманир-Рахиим</div>'.'<div class="black">Во имя Аллаха Милостивого и Милосердного!</div>';
	for($i=0;$i<count($arabLanguage);$i++){
		echo '<div class="number">'.$id[$value]." : ".$idSura[$i].'<br /></div>'.'<div class="green">'.$arabLanguage[$i].'</div>'.'<div class="blue">'.$translit[$i].'</div>'.'<div class="black">'.$rusLanguage[$i].'</div>';
		}
}

?>
</p>