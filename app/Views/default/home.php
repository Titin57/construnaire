<?php $this->layout('layoutBootstrap', ['title' => 'Home', 'currentPage'=>'Home']) ?>

<?php $this->start('main_content') ?>
	<p>Et maintenant la page <strong><a href="<?=$this->url('worker_addworker')?>"title="addworker">addworker</a></strong>.</p>

<?php $this->stop('main_content') ?>
