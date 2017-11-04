
<div class="login-box"></div>
    <div class="login-box-body">
        ログイン画面
        <?= $this->Session->flash()?>
        <?= $this->Form->create('User', ['novalidate' => true]);?>
        <?= $this->Form->input('login_name');?>
        <?= $this->Form->input('password');?>
        <?= $this->Form->end('send');?>
    </div>
</div>
