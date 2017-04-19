<?php  $this->layout('layoutBootstrap', ['title' => ' - Process', 'currentPage'=>'process']) ?>

<?php  $this->start('main_content') ?>


MUR: (jour 1)

<style>
  #sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
  #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 38px; }
  #sortable li span { position: absolute; margin-left: -1.3em; }
</style>

<script>
  $( function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  } );
</script>

<ul id="sortable">
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>tâche 1 : fondation</li>
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>tâche 2 : Préparer le beton</li>
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>tâche 3 : Pose du beton</li>
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>tâche 4 : Pose des agglos</li>
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>tâche 5 : Mise à niveau</li>
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>tâche 6 : Nettoyage des joints</li>
</ul>

<?php $this->stop('main_content') ?>