<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>

	<!-- Tell the browser to be responsive to screen width -->
	<?= $this->Html->meta(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no']);?>
	<?= $this->Html->css('bootstrap/css/bootstrap.min');?>
	<!-- Font Awesome -->
	<?= $this->Html->css('font_awesome/css/font-awesome.min');?>
	<!-- Ionicons -->
	<?= $this->Html->css('ionicons/css/ionicons.min');?>
	<!-- Theme style -->
	<?= $this->Html->css('AdminLTE.min');?>
	<!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <?= $this->Html->css('skins/skin-blue.min');?>
  <!-- Google Font -->
  <?= $this->Html->css('//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic'); ?>

  <!-- 以下、自作CSS -->
  <?= $this->Html->css('general/general');?>


	<?php
		echo $this->Html->meta('icon');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
