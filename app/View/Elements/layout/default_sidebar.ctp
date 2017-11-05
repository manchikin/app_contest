<aside class="main-sidebar">
    <section class="sidebar">

        <ul class="sidebar-menu" data-widget="tree">
          <li class="active">
            <?= $this->Html->link('<i class="fa fa-dashboard"></i><span>' . TITLE_DASHBOARD . '</span>',
                                ['controller' => 'admin', 'action' => 'index'],
                                ['escape' => false]); ?>
          </li>
          <li class="active">
            <?= $this->Html->link('<i class="fa fa-book"></i><span>' . TITLE_BOOK_MANAGE . '</span>',
                                ['controller' => 'book', 'action' => 'index'],
                                ['escape' => false]); ?>
          </li>
          <li class="active treeview menu-open">
            <a href="#">
              <i class="fa fa-users"></i> <span>会員情報</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu" style="">
                <li class="<?= $this->fetch('title') === TITLE_MEMBER_SEARCH ? 'active' : '' ?>">
                  <?= $this->Html->link('<i class="fa fa-search"></i><span>' . TITLE_MEMBER_SEARCH . '</span>',
                                      ['controller' => 'admin', 'action' => 'search'],
                                      ['escape' => false]); ?>
                </li>
                <li class="<?= $this->fetch('title') === TITLE_MEMBER_ADD ? 'active' : '' ?>">
                  <?= $this->Html->link('<i class="fa fa-user-plus"></i><span>' . TITLE_MEMBER_ADD . '</span>',
                                      ['controller' => 'admin', 'action' => 'register'],
                                      ['escape' => false]); ?>
                </li>
                <li>

                </li>
            </ul>
          </li>
          <li class="active">
            <?= $this->Html->link('<i class="fa fa-dashboard"></i><span>' . TITLE_LOGOUT . '</span>',
                                ['controller' => 'login', 'action' => 'logout'],
                                ['escape' => false]); ?>
          </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
