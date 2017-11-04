<!DOCTYPE html>
<html>
<?= $this->element('layout/default_head');?>
<body class="skin-blue sidebar-mini">
  <div class="wrapper">
      <?= $this->element('layout/default_header');?>
  		<?= $this->element('layout/default_sidebar');?>
      <div class="content-wrapper">
          <!-- Main content -->
          <section class="content container-fluid">
              <div id="content">
                <div id="container">
                  <?= $this->Flash->render(); ?>

                  <?= $this->fetch('content'); ?>
                </div>
              </div>
          </section>
        </div>
  		  <?= $this->element('layout/default_footer');?>

  </div>
  <?= $this->element('layout/default_adminLTE_js');?>
</body>
</html>
