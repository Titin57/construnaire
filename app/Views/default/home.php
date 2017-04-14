<?php $this->layout('layoutBootstrap', ['title' => 'Home', 'currentPage'=>'Home']) ?>

<?php $this->start('main_content') ?>
	<p>Et maintenant la page <strong><a href="<?=$this->url('worker_addWorker')?>"title="addWorker">addWorker</a></strong>.</p>

<?php $this->stop('main_content') ?>
