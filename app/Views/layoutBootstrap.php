<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title><?= $this->e($title) ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel ="stylesheet" href="../css/style.css"/>
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- jQuery -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    </head>
    <body>
        <div class="container">
            <header>
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <a class="navbar-brand" href="<?= $this->url('default_home') ?>">Home</a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">

                                <li <?php if ($currentPage == 'addworker'): ?>class="active"<?php endif; ?> >
                                    <a href="<?= $this->url('worker_addworker') ?>">Worker</a></li>
                                <li role="separator" class="divider"></li> 
                                <li<?php if ($currentPage == 'team'): ?> class="active"<?php endif; ?>>
                                    <a href="<?= $this->url('team_addteam') ?>">Teams</a>
                                </li>

                                <!--- this link for showing all constructions ---> 
                                <li<?php if ($currentPage == 'construction'): ?> class="active"<?php endif; ?>>
                                    <a href="<?= $this->url('construction_listconstruction') ?>">Constructions</a>
                                </li>                                
                                <li<?php if ($currentPage == 'addtask'): ?> class="active"<?php endif; ?>>
                                    <a href="<?= $this->url('task_addtask') ?>">Task Observation</a>
                                </li>
                                <li<?php if ($currentPage == 'viewtasks'): ?> class="active"<?php endif; ?>>
                                    <a href="<?= $this->url('tasks_viewtasks') ?>">Task Overview</a>
                                </li>
                                <li<?php if ($currentPage == 'process'): ?> class="active"<?php endif; ?>>
                                    <a href="<?= $this->url('process_process') ?>">Process</a>
                                </li>
                                <li<?php if ($currentPage == 'output'): ?> class="active"<?php endif; ?>>

                                    <a href="<?= $this->url('output_output') ?>">Summary</a>

                                </li>                                                              
                                <?php if (empty($w_user)) : ?>
                                    <li<?php if ($currentPage == 'signin'): ?> class="active"<?php endif; ?>>
                                        <a href="<?= $this->url('user_signin') ?>">Connexion</a>
                                    </li>
                                <?php else : ?>
                                    <li>
                                        <a href="<?= $this->url('user_logout') ?>">Déconnexion</a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
                <h1><?= $this->e($title) ?></h1>
            </header>

            <?php if (isset($w_flash_message) && !empty($w_flash_message->message)): ?>
                <div class="alert alert-<?= $w_flash_message->level ?>" role="alert">
                    <?= $w_flash_message->message ?>
                </div>
            <?php endif; ?>

            <section>
                <?= $this->section('main_content') ?>
            </section>

            <footer>
            </footer>
        </div>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> 
    </body>
</html>