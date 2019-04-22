<?php

/**
 * Description of TasksController
 *
 * @author vignatyev
 */
class TasksController extends AppController {
    
    public $components = array('Session','Paginator');
    /**
     *
     * @var Array
     */
    public $helpers = ['Html', 'Form', 'Session'];

    /*
     * 
     */
    public function beforeFilter() {
        $this->Auth->allow('index', 'add');
    }
    /**
     * 
     */
    public function index() {
        $this->paginate = [
            'limit' => 3,
            'order' => [
                'Task.name' => 'asc'
            ]
        ];
        
        $tasks = $this->paginate('Task');

        $this->set('tasks', $tasks);
    }
    /**
     * 
     * @param int $id
     * @throws NotFoundException
     */
    public function view($id = null) {
        $id = intval($id);
        
        print_r($this->request->data);

        if($this->request->is('Post')) {
            $this->Task->create();
            if( $this->Task->save($this->request->data) ) {
                $this->Session->setFlash(__('Данные сохранены успешно.'));
                return $this->redirect(['action'=>'index']);
            } else {
                $this->Session->setFlash(__('Ошибка: ' . $this->Task->validationErrors));
            }
        } else {
            if( !$this->Task->exists($id) ) {
                throw new NotFoundException(__('Not Found'));
            }
            $task = $this->Task->findById($id);
            $this->set('task', $task);
        }
    }
    /**
     * 
     * @param int $id
     */
    public function delete($id = null) {
        $id = intval($id);
        if($this->request->is('Delete')) {
            if( $this->Task->exist($id)) {
                if($this->Task->delete($id)) {
                    $this->Session->setFlash(__('Задача удалена'));
                } 
            }
        }
        return $this->redirect(['action'=>'index']);
    }
    /**
     * 
     */
    public function add() {
        if($this->request->is('Post')) {
            $this->Task->create();
            if( $this->Task->save($this->request->data) ) {
                $this->Session->setFlash(__('Данные сохранены успешно.'));
                return $this->redirect(['action'=>'index']);
            } else {
                $this->Session->setFlash(__('Ошибка: ' . $this->Task->validationErrors));
            }
        }
     }
}
