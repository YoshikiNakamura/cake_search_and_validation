<?php
class EventsController extends AppController
{
    public $uses = array('Event');

    public $components = array('Search.Prg');

    public function index()
    {
        $this->log(__METHOD__.'開始');
        try
        {
            $this->Prg->commonProcess();
            if(isset($this->passedArgs['search_word']))
            {
                $this->log(__METHOD__.'$this->passedArgs');
                $this->log($this->passedArgs);
                $conditions = $this->Event->parseCriteria($this->passedArgs);
                $this->log(__METHOD__.'$conditions');
                $this->log($conditions);
                $this->pagenate = array(
                    'conditions' => $conditions,
                    'limit' => 2,
                    'order' => array(
                        'id' => 'desc'
                    )
                );
                $events = $this->paginate('Event');
            }
            else
            {
                $events = $this->Event->find('all');
            }
            $this->log(__METHOD__.'$events:');
            $this->log($events);
            $this->set('events', $events);
        }
        catch(Exception $e)
        {
            $this->log(__METHOD__.'失敗');
            $this->log(__METHOD__.'$e:');
            $this->log($e);
        }
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
