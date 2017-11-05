<?= $this->assign('title', TITLE_MEMBER_EDIT)?>


<div class="box box-primary">
    <div class="box-header ui-sortable-handle with-border" style="cursor: move;">
        <i class="fa fa-user-plus"></i>
        <h3 class="box-title"><?= TITLE_MEMBER_ADD ?></h3>
    </div>
    <div class="box-body">
      <?= $this->Session->flash()?>
      <?php if ($isChangeable ?? false) : ?>
          <?= $this->Form->create('User',['novalidate' => true, 'class' => 'form-horizontal']);?>
          <?= $this->Form->input('id', ['type' => 'hidden', 'value' => $user['User']['id']]) ?>
          <div class="form-group">
            <?= $this->Form->label('login_name', CONST_LOGIN_ID . '<br>（変更不可）', ['class' => "col-xs-2 control-label"]);?>
            <?= $this->Form->input('login_name', ['default' => $user['User']['login_name'],
                                                  'readonly' => 'readonly',
                                                  'label' => false, 'class' => 'form-control', 'div' => 'col-xs-10']);?>
          </div>
          <div class="form-group">
            <?= $this->Form->label('user_name', CONST_USER_NAME . '名', ['class' => "col-xs-2 control-label"]);?>
            <?= $this->Form->input('user_name', ['default' => $user['User']['user_name'],
                                                 'label' => false, 'class' => 'form-control', 'div' => 'col-xs-10']);?>
          </div>
          <div class="form-group">
            <?= $this->Form->label('department_id', CONST_DEPARTMENT_NAME . '名', ['class' => "col-xs-2 control-label"]);?>
            <?= $this->Form->input('department_id',[
                                    'options' => [$departments],
                                    'empty'   => '選択して下さい',
                                    'label'   => false,
                                    'class' => 'form-control',
                                    'div' => 'col-xs-10',
                                    'default' => $user['User']['department_id']]);?>
          </div>
          <?php if ($Auth['id'] === $user['User']['id']) : ?>
              <?= $this->Form->input('change_password',
                                     ['type' => 'checkbox', 'label' => CONST_PASSWORD . 'を変更する','div' => 'col-xs-10 col-xs-offset-2']);?>
            <div class="form-group">
              <?= $this->Form->label('password', CONST_PASSWORD, ['class' => "col-xs-2 control-label"]);?>
              <?= $this->Form->input('password', ['label' => false, 'class' => 'form-control', 'div' => 'col-xs-10']);?>
            </div>
            <div class="form-group">
              <?= $this->Form->label('confirm_password', CONST_PASSWORD . '<br>（確認）', ['class' => "col-xs-2 control-label"]);?>
              <?= $this->Form->input('confirm_password',[
                                      'type' => 'password',
                                      'label' => false,
                                      'class' => 'form-control',
                                      'div' => 'col-xs-10']);?>
            </div>
          <?php endif; ?>
          <?php if ($Auth['is_admin'] === true && $Auth['id'] !== $user['User']['id']) : ?>
            <div class="form-group">
              <?= $this->Form->input('is_admin', ['label'   => CONST_ROLE_ADMIN,
                                                  'default' => $user['User']['is_admin'],
                                                  'div' => 'col-xs-10 col-xs-offset-2']);?>
            </div>
            <div class="form-group">
              <?= $this->Form->input('is_deleting', ['type' => 'checkbox',
                                                     'label' => '削除',
                                                     'div' => 'col-xs-10 col-xs-offset-2']);?>
            </div>
          <?php endif; ?>
    </div>
    <div class="box-footer">
      <?= $this->Form->button('リセット', ['type' => 'reset', 'class' => 'btn btn-default btn-flat'])?>
      <?= $this->Form->end(['label' => '変更',
                            'class' => "btn btn-sm btn-info btn-flat pull-right", 'div' => false]);?>
      <?php endif; ?> <!-- 変更権限がない場合、下の</div>は、box-bodyの閉じタグとなる -->
    </div>
</div>
