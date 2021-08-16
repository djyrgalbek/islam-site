<div id="navigationMobile">
    <div class="block_q"><h2 align="center" class="hadis_day">Хадис дня</h2><?php echo $glText[date("d") - 1]; ?></div>
    <div class="block_q">
        <h3>Вопрос дня</h3>
        <p><?php echo $textQuestion[$number_question]; ?></p><br>
        <form id="question_f_Mobile">
            <input type="radio" name="question_day_Mobile" value="<?php echo $ver_1Question[$number_question]; ?>"><span><?php echo "&nbsp".$ver_1Question[$number_question]; ?></span><br>
            <input type="radio" name="question_day_Mobile" value="<?php echo $ver_2Question[$number_question]; ?>" ><span><?php echo "&nbsp".$ver_2Question[$number_question]; ?></span><br>
            <input type="radio" name="question_day_Mobile" value="<?php echo $ver_3Question[$number_question]; ?>"><span><?php echo "&nbsp".$ver_3Question[$number_question]; ?></span><br>
            <input type="radio" name="question_day_Mobile" value="<?php echo $ver_4Question[$number_question]; ?>"><span><?php echo "&nbsp".$ver_4Question[$number_question]; ?></span><br><br>
            <div class="button_q" onClick="Rez_Mobile()">Узнать ответ</div>
        </form>
        <b><span id="Show_rez_question_Mobile"></span></b><span id="Show_rez_question_2_Mobile"></span>
    </div>
</div>