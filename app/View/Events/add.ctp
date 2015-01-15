<?php echo $this->Form->create('Event', array('novalidate'=>true)); ?>
<?php echo $this->Form->input('title',array('label'=>'タイトル', 'required'=>false)); ?>
<?php echo $this->Form->end(array('label'=>'保存')); ?>
