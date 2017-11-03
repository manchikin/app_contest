変更画面
<?= $this->Session->flash()?>
<?php if ($isChangeable ?? false) : ?>
<?= $this->Form->create('User',['novalidate' => true]);?>
<?= $this->Form->input('login_name', ['defalut' => $user['User']['login_name']]);?>
<?= $this->Form->input('user_name');?>
<?= $this->Form->input('department_id',[
                        'options' => [$departments],
                        'empty'   => '選択して下さい']);?>
<?= $this->Form->input('password');?>
<?= $this->Form->input('confirm_password',[
                        'type' => 'password']);?>
<?= $this->Form->button('clear', ['type' => 'reset'])?>
<?= $this->Form->end('Send');?>
<?php endif; ?>
