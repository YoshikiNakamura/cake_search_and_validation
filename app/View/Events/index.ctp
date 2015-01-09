<div>
    <a href="<?php echo $this->Html->url(array('action' => 'add'));?>">
        新規登録
    </a>
</div>
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
