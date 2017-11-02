ログイン画面
<?= $this->Session->flash()?>
<?= $this->Form->create('User',['novalidate' => true]);?>
<?= $this->Form->input('login_name');?>
<?= $this->Form->input('department_id',[
                        'options' => [$departments],
                        'empty' => '選択して下さい']);?>
<?= $this->Form->input('password');?>
<?= $this->Form->input('confirm_password');?>
<?= $this->Form->button('send')?>
<?= $this->Form->end('Send');?>
