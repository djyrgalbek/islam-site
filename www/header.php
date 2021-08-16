<div id="header" class="header">
	<div class="zagalovok">
        <div>
       <a href="index.php" target="_self" style="text-decoration: none;">
           <div>
               <img src="images/logo.png" alt="Логотип сайта Joodar-jannat.ru" class="logoPic" />
                <h1 class="logoName"><span style="color: #ccf10f;">J</span>oodar-<span style="color: #ccf10f;">j</span>annat</h1>
            </div>
        </a>
    </div>
        
        <div class="flexDiv2">
        <form id="poiskForm" method="POST" action="search.php" >
	        <input type="text" id="poiskInput" name="poiskInput" class="poisk" placeholder="Поиск по сайту" maxlength="250" />
	        <div id="searchBut" onClick="Search();">&nbspНайти</div>
        </form>
        </div>
    </div>

	<hr color="#176991" size="3" width="100%" class="gl_line" />
	<!-- Рисунки в разделе фонового текста -->
	<img src="images/fon1.jpg" alt="Фоновой рисунок" class="gl_img" />
	
	<!-- Фоновой текст -->
    <div id="glText" style="font-size: 17px;"><h2 align="center" class="hadis_day" style="font-size: 25px;">Хадис дня</h2><?php echo $glText[date("d") - 1]; ?></div>

</div>
<a id="up" href="#header"><img class="up" src="images/up.png" alt="Вернуться в начало" /></a>

<script>    
    function Search ()
    {
        var text = $('#poiskInput').val();
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
            $('#poiskForm').submit();
        }
        return false;
    }

    $(document).ready(function(){
    $('#up').click( function(){ // ловим клик по ссылке с классом go_to
	var scroll_el = $(this).attr('href'); // возьмем содержимое атрибута href, должен быть селектором, т.е. например начинаться с # или .
        if ($(scroll_el).length != 0) { // проверим существование элемента чтобы избежать ошибки
	    $('html, body').animate({ scrollTop: $(scroll_el).offset().top }, 500); // анимируем скроолинг к элементу scroll_el
        }
	    return false; // выключаем стандартное действие
    });
});
</script>
