<?= $this->assign('title', TITLE_MEMBER_ADD)?>
<div class="box box-primary">
    <div class="box-header ui-sortable-handle with-border" style="cursor: move;">
        <i class="fa fa-user-plus"></i>
        <h3 class="box-title"><?= TITLE_MEMBER_ADD ?></h3>
    </div>
    <div class="box-body">

      <?= $this->Session->flash()?>
      <?= $this->Form->create('User',['novalidate' => true]);?>
      <div class="form-group">
        <?= $this->Form->label('login_name', 'ログインID', ['class' => "col-xs-2 control-label"]);?>
        <?= $this->Form->input('login_name', ['label' => false, 'class' => 'form-control', 'div' => 'col-xs-10']);?>
      </div>
      <div class="form-group">
        <?= $this->Form->label('user_name', 'ユーザー名', ['class' => "col-xs-2 control-label"]);?>
        <?= $this->Form->input('user_name', ['label' => false, 'class' => 'form-control', 'div' => 'col-xs-10']);?>
      </div>
      <div class="form-group">
        <?= $this->Form->label('department_id', '部署名', ['class' => "col-xs-2 control-label"]);?>
        <?= $this->Form->input('department_id',[
                                'options' => [$departments],
                                'empty'   => '選択して下さい',
                                'label'   => false,
                                'class' => 'form-control',
                                'div' => 'col-xs-10']);?>
      </div>
      <div class="form-group">
        <?= $this->Form->label('password', 'パスワード', ['class' => "col-xs-2 control-label"]);?>
      <?= $this->Form->input('password', ['label' => false, 'class' => 'form-control', 'div' => 'col-xs-10']);?>
      </div>
      <div class="form-group">
        <?= $this->Form->label('confirm_password', 'パスワード（確認）', ['class' => "col-xs-2 control-label"]);?>
        <?= $this->Form->input('confirm_password',[
                               'type'  => 'password',
                               'label' => false,
                               'class' => 'form-control',
                               'div' => 'col-xs-10']);?>
      </div>
    </div>
    <div class="box-footer">
      <?= $this->Form->button('リセット', ['type' => 'reset', 'class' => 'btn btn-default btn-flat'])?>
      <?= $this->Form->end(['label' => '登録',
                            'class' => "btn btn-sm btn-info btn-flat pull-right", 'div' => false]);?>
    </div>
</div>
