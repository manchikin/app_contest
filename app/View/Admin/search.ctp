会員検索<br>
<?= $this->Form->create('User', ['novalidate' => true]);?>
<?= $this->Form->input('user_name');?>
<?= $this->Form->button('clear', ['type' => 'reset'])?>
<?= $this->Form->end('send');?>


<?= $this->Session->flash()?>

<table>
<?= $this->Html->tableHeaders(['#', 'login_id', '名前', '部署', '権限'])?>
<?php foreach($users as $key => $user) : ?>
<?= $this->Html->tableCells([$key + 1,
                             $user['User']['login_name'],
                             $user['User']['user_name'],
                             $user['Department']['name'],
                             $user['User']['is_admin'] === true ? '管理者' : '一般',
                             $this->Html->link('変更', ['controller' => 'admin',
                                                        'action' => 'change',
                                                        '?' => ['id' => $user['User']['id']]]),
                             
                             ]
                             ) ?>
<?php endforeach; ?>
</table>
