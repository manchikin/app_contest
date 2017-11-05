<?= $this->assign('title', TITLE_BOOK_SEARCH)?>

<div class="box box-primary">
    <div class="box-header ui-sortable-handle with-border">
        <i class="ion ion-search"></i>
        <h3 class="box-title"><?= TITLE_MEMBER_SEARCH ?></h3>
    </div>
    <div class="box-body">
      <div class="col-xs-12">
          <?= $this->Form->create('Book', ['inputDefaults' => ['novalidate' => true, 'div' => false]]);?>
          <?= $this->Form->input('name', ['placeholder' => CONST_BOOK_NAME . '名', 'label' => false]);?>
          <?= $this->Form->button('リセット', ['type'  => 'reset',
                                          'class' => "btn btn-sm btn-default btn-flat",])?>
          <?= $this->Form->end(['label' => '検索',
                                    'class' => "btn btn-sm btn-info btn-flat", 'div' => false]);?>
      </div>

      <?= $this->Session->flash()?>
      <?php if ($search_result ?? false) : ?>
        <table class="table table-bordered table-striped dataTable">
          <?= $this->Html->tableHeaders(['#', '書籍画像', 'タイトル'])?>
          <?php foreach($search_result as $key => $res) : ?>
            <?= $this->Html->tableCells([$key + 1,
                                         '<img src="' . $res['MediumImage']['URL'] ?? '' . '"> </img>',
                                         $res['ItemAttributes']['Title']
                                        ]) ?>
          <?php endforeach; ?>
        </table>
      <?php endif; ?>
    </div>
</div>
