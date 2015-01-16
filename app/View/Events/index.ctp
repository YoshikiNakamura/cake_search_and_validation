<div>
    <a href="<?php echo $this->Html->url(array('action'=>'add'));?>">
        新規登録
    </a>
</div>

<?php echo $this->Form->create('Event', array('action'=>'index', 'type'=>'get'));?>
<?php echo $this->Form->input('search_word', array('label'=>'検索ワード'));?>
<?php echo $this->Form->end('検索');?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>タイトル</th>
        </tr>
    </thed>
    <tbody>
        <?php foreach($events as $event):?>
            <tr>
                <td><?php echo $event['Event']['id']?></td>
                <td><?php echo $event['Event']['title']?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
