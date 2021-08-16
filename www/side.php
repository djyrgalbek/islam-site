<!-- раздел навигации-->
    
<div id="navigation">
    <div class="block_q">
        <h3>Вопрос дня</h3>
        <p><?php echo $textQuestion[$number_question]; ?></p><br>
        <form id="question_f">
            <div><input type="radio" name="question_day" value="<?php echo $ver_1Question[$number_question]; ?>"><span><?php echo "&nbsp".$ver_1Question[$number_question]; ?></span></div>
            <div><input type="radio" name="question_day" value="<?php echo $ver_2Question[$number_question]; ?>" ><span><?php echo "&nbsp".$ver_2Question[$number_question]; ?></span></div>
            <div><input type="radio" name="question_day" value="<?php echo $ver_3Question[$number_question]; ?>"><span><?php echo "&nbsp".$ver_3Question[$number_question]; ?></span></div>
            <div style="margin-bottom: 20px;"><input type="radio" name="question_day" value="<?php echo $ver_4Question[$number_question]; ?>"><span><?php echo "&nbsp".$ver_4Question[$number_question]; ?></span></div>
            <div class="button_q" onClick="Rez()">Узнать ответ</div>
        </form>
        <b><span id="Show_rez_question"></span></b><span id="Show_rez_question_2"></span>
    </div>
</div>