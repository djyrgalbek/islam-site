// var id=('<?php for($i=0;$i<count($id);$i++) {
	// echo $id[$i].";"; }?>');
	// var idNumArray=id.split(';');
	// idNumArray.pop();
	
	// var idSura=('<?php for($i=0;$i<count($idSura);$i++) {
	// echo $idSura[$i].";"; }?>');
	// var idArray=idSura.split(';');
	// idArray.pop();

	// var arabLanguage=('<?php for($i=0;$i<count($arabLanguage);$i++) {
	// echo $arabLanguage[$i].";"; }?>');
	// var arabLanguageArray=arabLanguage.split(';');
	// arabLanguageArray.pop();
	
	// var translit=('<?php for($i=0;$i<count($translit);$i++) {
	// echo $translit[$i].";"; }?>');
	// var translitArray=translit.split(';');
	// translitArray.pop();
	
	// var rusLanguage=('<?php for($i=0;$i<count($rusLanguage);$i++) {
	// echo $rusLanguage[$i].";"; }?>');
	// var rusLanguageArray=rusLanguage.split(';');
	// rusLanguageArray.pop();

	// document.write('<div class="green">بِسْمِ اللّهِ الرَّحْمنِ الرَّحِيمِ</div>'+'<div class="blue">Бисмилляхир-Рахманир-Рахиим</div>'+'<div class="black">Во имя Аллаха Милостивого и Милосердного!</div><br>');
	// for(var i=0;i<translitArray.length;i++){
	// document.write('<div class="green">'+idNumArray[<?php echo $value ?>]+" : "+idArray[i]+"<br />"+arabLanguageArray[i]+'</div>'+'<div class="blue">'+translitArray[i]
	// +'</div>'+'<div class="black">'+rusLanguageArray[i]+'</div>'+"<br />");
	// }
	
	function Menu2(menuArg){
		if(menuArg=="koran"){
		$("#1").css("color","#fff");
		}
		else if(menuArg=="sunna"){
		$("#2").css("color","#fff");
		}
		else if(menuArg=="molitvy_dua"){
		$("#3").css("color","#fff");
		}
		else if(menuArg=="namaz"){
		$("#4").css("color","#fff");
		}
		else if(menuArg=="proroksav"){
		$("#5").css("color","#fff");
		}
		else if(menuArg=="iskusstvo"){
		$("#6").css("color","#fff");
		}
		else if(menuArg=="education"){
		$("#7").css("color","#fff");
		}
		else if(menuArg=="family"){
		$("#8").css("color","#fff");
		}
		else if(menuArg=="dobro"){
		$("#9").css("color","#fff");
		}
		else if(menuArg=="hadj"){
		$("#10").css("color","#fff");
		}
	}
	