
<div class="login-box">
    <div class="login-logo">
            システムタイトル
    </div>
    <div class="login-box-body">
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
        <?= $this->Html->div('col-xs-4 pull-left', '');?>
        <?= $this->Form->input('ログイン', ['type'  => 'button',
                                            'class' => 'btn btn-primary btn-block btn-flat',
                                            'div'   => 'col-xs-4']); ?>
        <?= $this->Html->div('col-xs-4 pull-right', '');?>
        <?= $this->Form->end();?>
    </div>
</div>
