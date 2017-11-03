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
                        
    <?php if ($Auth['id'] === $user['User']['id']) : ?>
        <?= $this->Form->input('change_password', ['type' => 'checkbox', 'label' => 'パスワードを変更する']);?>
        <?= $this->Form->input('password');?>
        <?= $this->Form->input('confirm_password',[
                                'type' => 'password']);?>
    <?php endif; ?>
    <?php if ($Auth['is_admin'] === true && $Auth['id'] !== $user['User']['id']) : ?>
        <?= $this->Form->input('is_deleting', ['type' => 'checkbox', 'label' => '削除']);?>
    <?php endif; ?>
    <?= $this->Form->button('clear', ['type' => 'reset'])?>
    <?= $this->Form->end('Send');?>
<?php endif; ?>
