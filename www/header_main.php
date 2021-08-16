
<style>
.headeri{
	width: calc(100% - 50px);
	min-height: 350px;
	background: linear-gradient(to top left, #2d5258, #1c585a, #16282d );
	padding: 20px 25px;
	margin-bottom: 50px;
}
.gl_imgi{
	display: block;
	width: 500px;
	height: auto;
	float: left;
	margin: 25px 37px 10px 0px;
	box-shadow: 0px 0px 10px 5px #1c585a;
}
.gl_linei{
	display:block;
	margin-top: 10px;
}
#glTexti{
	float: right;
	font: normal 17px "Helvetica Neue", Helvetica, Arial, sans-serif;
	color: #c8e8e9;
	text-align: left;
	margin-top: 26px;
	margin-right: 12px;
	height: 260px;
	width: 420px;
	overflow: auto;
}
.hadis_dayi{
	margin-top: 50px;
	margin-bottom: 25px;
	color: #71b4b6;
	font-family: 'Hind Madurai', sans-serif;
	font-size: 25px;
	text-transform: uppercase;
}
.zagalovoki{
	display: flex;
	flex-wrap: nowrap;
	width: auto;
	height: 40px;
	font: normal 37px Georgia, sans-serif;
	color:#fff;
}
.zagalovoki div{
	display: flex;
	align-items: center;
	width: 50%;
	/*background: green;*/
}
.flexDiv2i
{
	justify-content: flex-end;
}
.logoPici
{
	margin-left: 15px;
	width: 45px;
}
.logoNamei
{
	margin-left: 10px;
	color: #fff;
	font: normal 25px 'Neucha', 'Shadows Into Light Two', "Patrick Hand", Helvetica, Arial, sans-serif;
}
.poiski{
	position: relative;
	top: 0px;
	float: left;
	width: 100px;
	height: 37px;
	padding-left: 10px;
	padding-right: 41px;
	background: #fafafa;
	border-radius: 7px;
	border-right: 1px solid #acacac;
	margin-right: 10px;
	box-shadow: inset 1px 1px 1px #176991,1.5px 1.5px 10px #176991;
}
.poiski:hover,.poisk:focus{
	width: 150px;
	transition: 0.5s;
	box-shadow: inset 1px 1px 1px #0297ff,1.5px 1.5px 10px #0297ff;
}
#searchButi
{
	width: 40px;
	height: 37px;
	background: #ffffff;
	border-radius: 7px;
	font: normal 12px Bebas, Helvetica, Arial, sans-serif;
	color: #838383;
	text-align: center;
	padding: 0px 5px;
	box-shadow: inset 1px 1px 1px #176991,1.5px 1.5px 10px #176991;
}
#searchButi:hover
{
	color: #0e63b3;
}
</style>
<div id="headeri" class="headeri">
	<div class="zagalovoki">
        <div>
		<a href="index.php" target="_self" style="text-decoration: none;">
           <div>
               <img src="images/logo.png" alt="Логотип сайта Joodar-jannat.ru" class="logoPic" />
                <h1 class="logoName"><span style="color: #ccf10f;">J</span>oodar-<span style="color: #ccf10f;">j</span>annat</h1>
            </div>
        </a>
    </div>
        
        <div class="flexDiv2i">
        <form id="poiskForm" method="POST" action="search.php" >
	        <input type="text" id="poiskInput" name="poiskInput" class="poiski" placeholder="Поиск по сайту" maxlength="250" />
	        <div id="searchButi" onClick="Search();">&nbspНайти</div>
        </form>
        </div>
    </div>

	<hr color="#176991" size="3" width="100%" class="gl_linei" />
	<!-- Рисунки в разделе фонового текста -->
	<img src="images/fon1.jpg" alt="Фоновой рисунок" class="gl_imgi" />
	
	<!-- Фоновой текст -->
    <div id="glTexti" style="font-size: 17px;"><h2 align="center" class="hadis_dayi" style="font-size: 25px;">Хадис дня</h2><?php echo $glText[date("d") - 1]; ?></div>

</div>
<a id="up" href="#headeri"><img class="up" src="images/up.png" alt="Вернуться в начало" /></a>

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
