<?php
    echo $this->element('menu');
            
    echo "<div class='content'>";
    echo    $this->Form->create('Task');

    $options = [
        'value' => $task['Task']['id']
    ];
    echo    $this->Form->input('id', $options);

    $options = [
        'label' => 'Имя',
        'required' => 'required',
        'value' => $task['Task']['name']
    ];
    echo    $this->Form->input('name', $options);

    echo    "<label>Электронная почта</label>";

    $options = [
        'required' => 'required',
        'value' => $task['Task']['email']
    ];
    echo    $this->Form->email('email', $options);
    
    $options = [
        'label' => 'Задача',
        'required' => 'required',
        'value' => $task['Task']['body']
    ];
    echo    $this->Form->input('body', $options);

    $options = [
        'N' => 'Активная', 
        'Y' => 'Выполнено'
    ];
    $attributes = [
        'name' => 'data[Task][done]',
        'value' => $task['Task']['done'],
        'empty' => false,
    ];
    echo    "<label>Статус</label>";
    echo $this->Form->select('Статус', $options, $attributes);
    echo    $this->Form->end('Сохранить');
    echo "</div>";
?>
