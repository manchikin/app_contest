<?= $this->assign('title', TITLE_MEMBER_SEARCH)?>

<div class="box box-primary">
    <div class="box-header ui-sortable-handle" style="cursor: move;">
        <i class="ion ion-search"></i>
        <h3 class="box-title"><?= TITLE_MEMBER_SEARCH ?></h3>
    </div>
    <div class="box-body">
        <div class="col-xs-12">
            <?= $this->Form->create('User', ['inputDefaults' => ['novalidate' => true, 'div' => false]]);?>
            <?= $this->Form->input('user_name', ['placeholder' => '名前', 'label' => false]);?>
            <?= $this->Form->button('リセット', ['type'  => 'reset',
                                            'class' => "btn btn-sm btn-danger btn-flat",])?>
            <?= $this->Form->end(['label' => '検索',
                                      'class' => "btn btn-sm btn-info btn-flat", 'div' => false]);?>
        </div>

    </div>
</div>
<div class="box box-primary">
     <div class="box-body no-padding">
        <?= $this->Session->flash()?>


        <?php $this->paginator->options(['url' => $this->request->query]);?>
        <?= $this->Paginator->first('|<');?>　
        <?= $this->Paginator->prev('<< ' , [],  null, ['class' => 'prev disabled']);?>
        <?= $this->Paginator->numbers(['first' => 'First page'])?>
        <?= $this->Paginator->next('>> ' , [],  null, ['class' => 'next disabled']);?>　
        <?= $this->Paginator->last('>|');?>
        <?= $this->Paginator->counter([
            'format' => 'range'
        ]);?>
        <table class="table table-bordered">
        <?= $this->Html->tableHeaders(['#', 'login_id', '名前', '部署', '権限'])?>
        <?php foreach($users as $key => $user) : ?>
        <?= $this->Html->tableCells([$key + 1,
                                     $user['User']['login_name'],
                                     $user['User']['user_name'],
                                     $user['Department']['name'],
                                     $user['User']['is_admin'] === true ? '管理者' : '一般',
                                     $this->Html->link('変更', ['controller' => 'admin',
                                                                'action' => 'change',
                                                                '?' => ['id' => $user['User']['id']]]),

                                     ]
                                     ) ?>
        <?php endforeach; ?>
        </table>
    </div>
</div>
