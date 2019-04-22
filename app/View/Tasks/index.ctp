<?php 
    echo $this->element('menu');
    
    $paginator = $this->Paginator;

    echo "<div class='content'>";
    echo "<h1>Задачи</h1>";
    if($tasks){
        echo "    <table>";
        echo "        <tr>";
        $element = $this->Paginator->sort('name', 'Имя');
        echo "            <th width='15%'>{$element}</th>";
        $element = $this->Paginator->sort('email', 'Email');
        echo "            <th width='18%'>{$element}</th>";
        $element = $this->Paginator->sort('body', 'Задача');
        echo "            <th>{$element}</th>";
        $element = $this->Paginator->sort('done', 'Статус');
        echo "            <th width='12%'>{$element}</th>";
        echo "        </tr>";
    
    foreach ($tasks as $task) {
        echo "        <tr>";
        echo "            <td>{$task['Task']['name']}</td>";
        echo "            <td>{$task['Task']['email']}</td>";
        $link = $this->Html->link( h($task['Task']['body']), ['action'=>'view',$task['Task']['id'] ]);
        echo "            <td>{$link}</td>";
        $status = $task['Task']['done'] == 'N' ? 'Активна' : 'Выполнена';
        echo "            <td>{$status}</td>";
        echo "       </tr>";
    }

    echo "    </table>";
        // pagination section
    echo "<div class='paging'>";
 
        // the 'first' page button
        echo $paginator->first("First");
         
        // 'prev' page button, 
        // we can check using the paginator hasPrev() method if there's a previous page
        // save with the 'next' page button
        if($paginator->hasPrev()){
            echo $paginator->prev("Prev");
        }
         
        // the 'number' page buttons
        echo $paginator->numbers(array('modulus' => 2));
         
        // for the 'next' button
        if($paginator->hasNext()){
            echo $paginator->next("Next");
        }
         
        // the 'last' page button
        echo $paginator->last("Last");
     
    echo "</div>";
     
}
 
// tell the user there's no records found
else{
    echo "No tasks found.";
}
    
    echo "</div>";