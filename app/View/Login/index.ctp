ログイン画面
<?= $this->Session->flash()?>
<?= $this->Form->create('User');?>
<?= $this->Form->input('login_name');?>
<?= $this->Form->input('password');?>
<?= $this->Form->button('send')?>
<?= $this->Form->end();?>
