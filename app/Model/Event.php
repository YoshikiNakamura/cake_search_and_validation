<?php
class Event extends AppModel
{
    public $validate = array(
        'title' => array(
            'allowEmpty' => false,
            'rule' => 'alphaNumeric',
            'message' => '英数字必須'
        )
    );
}
