
<div class="login-box">
    <div class="login-logo">
            Book Manager
    </div>
    <div class="login-box-body clearfix">
        <?= $this->Session->flash()?>
        <?= $this->Form->create('User', ['novalidate' => true,
                                         'inputDefaults' => [
                                             'label' => false,
                                        ]]);?>
        <div class="form-group has-feedback">
            <?= $this->Form->input('login_name', ['class'       => 'form-control',
                                                  'placeholder' => 'loginID']);?>
            <?= $this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-user form-control-feedback'])?>
        </div>
        <div class="form-group has-feedback">
            <?= $this->Form->input('password', ['class'       => 'form-control',
                                                'placeholder' => 'password',
                                                ]);?>
            <?= $this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-lock form-control-feedback'])?>
        </div>
        <?= $this->Form->end(['label' => 'Login',
                              'class' => 'btn btn-primary btn-block btn-flat',
                              'div' => ['class' => 'col-xs-4 col-xs-offset-4']]);?>
    </div>
</div>
