会員検索<br>
<?= $this->Form->create('User', ['novalidate' => true]);?>
<?= $this->Form->input('user_name');?>
<?= $this->Form->button('clear', ['type' => 'reset'])?>
<?= $this->Form->end('send');?>


<?= $this->Session->flash()?>

<?php if ($is_searched ?? false) : ?>
<table>
<?= $this->Html->tableHeaders(['#', 'login_id', '名前', '部署', ''])?>
<?php foreach($users as $key => $user) : ?>
<?= $this->Html->tableCells([$key + 1,
                             $user['User']['login_name'],
                             $user['User']['user_name'],
                             $user['Department']['name'],
                             $this->Html->link('変更', ['controller' => 'admin',
                                                        'action' => 'change',
                                                        '?' => ['id' => $user['User']['id']]])
                             
                             ]
                             ) ?>
<?php endforeach; ?>
</table>
<?php endif; ?>
