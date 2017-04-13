<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
	<h2>Let's code.</h2>
	<p>Vous avez atteint la page d'accueil. Bravo.</p>
	<p>Et maintenant la page <strong><a href="<?=$this->url('worker_addWorker')?>"title="addWorker">addWorker</a></strong>.</p>
<?php $this->stop('main_content') ?>
