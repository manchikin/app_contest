<header class="main-header">
  <a href="<?= $this->Html->url(['controller' => 'admin', 'action' => 'index']); ?>" class="logo">
    <span class="logo-mini"><b>B</b>Ma</span>
    <span class="logo-lg"><b>Book</b>Manager</span>
  </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">push to toggle</span>
        <span class="icon-bar"></span>
      </a>
      <span class="header-page-title"><?= $this->fetch('title'); ?></span>
      <div class="navbar-custom-menu">

              <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-user"></i><span ="hidden-xs"><?= $Auth['user_name']?></span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- Menu Body -->
                    <li class="user-body">
                      <div class="row">
                          <?= $this->Html->div('col-xs-4 text-right', "userID：") ?><?= $this->Html->div('col-xs-8', sprintf('%05d', $Auth['id'])) ?>
                          <?= $this->Html->div('col-xs-4 text-right', "部署："  ) ?><?= $this->Html->div('col-xs-8', $Auth['Department']['name']) ?>
                          <?= $this->Html->div('col-xs-4 text-right', "ロール：") ?><?= $this->Html->div('col-xs-8', $Auth['is_admin'] === true ? '管理者' : '一般') ?>
                      </div>
                      <!-- /.row -->
                    </li>
                    <li class="user-footer">
                      <div class="pull-left">
                        <?= $this->Html->link('編集', ['controller' => 'admin', 'action' => 'change', '?' => ['id' => $Auth['id']]],
                                                      ['class' => 'btn btn-default btn-flat']);?>
                      </div>
                      <div class="pull-right">
                        <?= $this->Html->link(TITLE_LOGOUT, ['controller' => 'login', 'action' => 'logout'],
                                                           ['class' => 'btn btn-default btn-flat']);?>
                      </div>
                    </li>
                  </ul>
                </li>

              </ul>
            </div>

    </nav>
</header>
