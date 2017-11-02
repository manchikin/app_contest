会員検索<br>
<?= $this->Form->create('User');?>
<?= $this->Form->input('login_name');?>
<?= $this->Form->button('send')?>
<?= $this->Form->button('clear', ['type' => 'reset'])?>
<?= $this->Form->end();?>


<?= $this->Session->flash()?>

<?php if ($is_searched ?? false) : ?>
<table>
<?= $this->Html->tableHeaders(['#', '名前'])?>
<?php foreach($users as $key => $user) : ?>
<?= $this->Html->tableCells([$key + 1, $user['User']['login_name']])?>
<?php endforeach; ?>
</table>
<?php endif; ?>
