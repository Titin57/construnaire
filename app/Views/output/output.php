<?php $this->layout('layoutBootstrap', ['title' => 'Output - Visuals', 'currentPage' => 'output']) ?>

<?php $this->start('main_content') ?>

<p>
    <strong><a href="<?= $this->url('output_outputText')?> "title="text">output text</a> - </strong>
                <a href="<?= $this->url('output_outputText') ?>">Text</a>
</p>

<h2>output visuals</h2>

<?php $this->stop('main_content') ?>
