ログイン画面
<?= $this->Session->flash()?>
<?= $this->Form->create('User');?>
<?= $this->Form->input('name');?>
<?= $this->Form->input('password');?>
<?= $this->Form->button('send')?>
<?= $this->Form->end();?>
