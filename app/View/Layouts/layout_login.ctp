<!DOCTYPE html>
<html>
<?= $this->element('layout/default_head');?>
<body class="hold-transition login-page">
	<div id="container">
		<div id="content">

			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>

		</div>

	</div>

<?= $this->element('layout/default_adminLTE_js');?>
</body>
</html>
