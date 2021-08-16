<div style="width:100%; text-align:center;">
<iframe src="//www.youtube.com/embed/<?php echo $video[$value]; ?>" frameborder="1" bordercolor="red" noresize allowfullscreen></iframe>
</div>

<!-- Аудиозапись -->
<div style="margin-top:20px; margin-bottom:20px;">
	<p class="audioName"><?php echo $audio[$value]; ?> &emsp;</p>
 
	<audio controls="controls">
		<source src="music/<?php echo $audio[$value] ?>.mp3" type="audio/mp3;">
		Тег audio не поддерживается вашим браузером. 
		<a href="music/<?php echo $audio[$value] ?>.mp3" class="green">Скачайте музыку</a>.
	</audio>
</div>