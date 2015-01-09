<?php
class EventsController extends AppController
{
    public $uses = array('Event');

    public function index()
    {
        $events = $this->Event->find('all');
        $this->set('events', $events);
    }

    public function add()
    {
        if($this->request->is('post'))
        {
            $this->Event->create();
            if($this->Event->save($this->request->data))
            {
                $this->Session->setFlash('成功', 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action'=>'index'));
            }
            else
            {
                $this->Session->setFlash('失敗', 'default', array('class' => 'alert alert-danger'));
            }
        }
    }
}
