       <div class="soobshenie">
	<img width="20px" height="auto" src="/images/x.png" style="float:right;" onClick='SooClose()'>
	<p class="title">Сообщить об ошибке</p>
	<form name="form_soobshenie" method="POST" action="PHP/redirect.php">
		<legend class="soobshenie_legend" >Введите e-mail:</legend>
		<input id="email" name="email" type="text" placeholder="e-mail" class="soobshenie_input">
		<legend class="soobshenie_legend">Введите сообщение:</legend>
		<textarea id="soo" name="soo" class="soobshenie_input" style="resize:none; height:200px;" wrap="soft" maxlength="250" placeholder="Ваше сообщение"></textarea>
		<div OnClick="Zapros()" class="soobshenie_button">Отправить запрос</div>
	</form>
</div>

<script>
function Zapros(){
	var email = document.form_soobshenie.email;
	var soo = document.form_soobshenie.soo;
	
	if(email.value==""){
		email.style.border="1px solid red";
	}
	else{
		email.style.border="1px solid #1e5e91";
	}
	if(soo.value==""){
		soo.style.border="1px solid red";
	}
	else{
		soo.style.border="1px solid #1e5e91";
	}
	
	if(email.value!=""&&soo.value!="")
	{
		document.form_soobshenie.submit();
	}
	SooClose();
}
</script>

<script>
	function SooShow(){
		$(".soobshenie").css("display","block");
		$("#up").css("display","none");
	}
	function SooClose(){
		$(".soobshenie").css("display","none");
        email.style.border="1px solid #1e5e91";
        soo.style.border="1px solid #1e5e91";
		$("#up").css("display","block");  
	}
</script>