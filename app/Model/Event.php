<?php
class Event extends AppModel
{
    public $actsAs = array('Search.Searchable');

    public $filterArgs = array(
        array(
            'name'=>'search_word',
            'type'=>'query',
            'method'=>'multiWordSearch'
        )
    );

    public $validate = array(
        'title' => array(
            'allowEmpty' => false,
            'rule' => 'alphaNumeric',
            'message' => '英数字必須'
        )
    );

    public function multiwordSearch($data = array())
    {
        $this->log(__METHOD__.'開始');
        $this->log(__METHOD__.'$data');
        $this->log($data);
        $keyword = mb_convert_kana($data['search_word'], "s", "UTF-8");
        $keywords = explode(' ', $keyword);
        if(count($keywords) < 2)
        {
            $conditions = array(
                $this->alias.'.title LIKE'=>'%'.$keyword.'%'
            );
        }
        else
        {
            $conditions['AND'] = array();
            foreach($keywords as $count=>$keyword)
            {
                $condition = array(
                    $this->alias.'.title LIKE'=>'%'.$keyword.'%'
                );
                array_push($conditions['AND'], $condition);
            }
        }
        $this->log(__METHOD__.'$conditions:');
        $this->log($conditions);
        return $conditions;
    }
}
