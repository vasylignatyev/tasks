<?php

/**
 * Description of Task
 *
 * @author vignatyev
 */
class Task extends AppModel {
    
    public $validate = [
        'name' => ['allowEmpty' => false],
        'email'=> ['allowEmpty' => false],
        'body' => ['allowEmpty' => false]
    ];
}
