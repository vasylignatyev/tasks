<?php
    echo $this->element('menu');
            
    echo "<div class='content'>";
    echo    $this->Form->create('Task');
    echo    $this->Form->input('name', ['required'=>'required']);

    echo    "<label>Электронная почта</label>";

    echo    $this->Form->email('email', ['required'=>'required']);
    echo    $this->Form->input('body', ['label'=>'Текст задачи','required'=>'required']);
    echo    $this->Form->end('Сохранить');
    echo "</div>";
?>
