<?php
$this->start('adminLTE-js-embedded');
echo $this->Html->script('jquery.min');
echo $this->Html->script('bootstrap.min');
echo $this->Html->script('adminlte.min');
$this->end();
?>

<?= $this->fetch('adminLTE-js-embedded'); ?>