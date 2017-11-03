変更画面
<?= $this->Session->flash()?>
<?php if ($isChangeable ?? false) : ?>
<?= $this->Form->create('User',['novalidate' => true]);?>
<?= $this->Form->input('id', ['type' => 'hidden', 'value' => $user['User']['id']]) ?>
<?= $this->Form->input('login_name', ['default' => $user['User']['login_name'],
                                      'readonly' => 'readonly',
                                      'label' => 'ログインID（変更不可）']);?>
<?= $this->Form->input('user_name', ['default' => $user['User']['user_name']]);?>
<?= $this->Form->input('department_id',[
                        'options' => [$departments],
                        'empty'   => '選択して下さい',
                        'default' => $user['User']['department_id']]);?>
<?= $this->Form->input('password');?>
<?= $this->Form->input('confirm_password',[
                        'type' => 'password']);?>
<?= $this->Form->button('clear', ['type' => 'reset'])?>
<?= $this->Form->end('Send');?>
<?php endif; ?>
