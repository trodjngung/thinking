<?php
class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
        
    }
    
    public function add() {
        $this->User->create();

        if ($this->User->save($this->request->data)) {
            $this->Session->write('username', $this->request->data['User']['username']);
            $this->Session->setFlash(__('The user has been saved'));
            return $this->redirect(array('controller' => 'thinking', 'action' => 'question'));
        }
    }
}
