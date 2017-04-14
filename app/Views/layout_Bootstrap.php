<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title><?= $this->e($title) ?></title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-1.12.4.min.js" > </script>
             
            
    </head>
    <body>
        <div class="container">
            <header>
                <h1><?= $this->e($title) ?></h1>
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <!--
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">Brand</a>
                        </div>
                         -->

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li <?php if ($currentPage == 'home'):?> class="active"<?php endif; ?> ><a href="<?=$this->url('default_home')?>">home</a></li>
                                <li role="separator" class="divider"></li>                                                                    
                                <li <?php if ($currentPage == 'addWorker'):?>class="active"<?php endif; ?> ><a href="<?=$this->url('worker_addWorker')?>">Worker</a></li>
                                <li role="separator" class="divider"></li>
                                <!--
                                <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                                <li><a href="#">Link</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                                    <ul class="dropdown-menu">

                                    </ul>
                                </li>
                                -->
                            </ul>
                            <!--
                            <form class="navbar-form navbar-left">
                                <div class="form-group">
                                        <li><a href="< ?=$this->url('conference_est')?>">conference est</a></li>
                                        <li><a href="< ?=$this->url('conference_est')?>">conference ouest</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="< ?=$this->url('default_home')?>">contact</a></li>
                                </div>
                            </form>
                            -->
                            <!--
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="#">Link</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="< ?=$this->url('conference_est')?>">conference est</a></li>
                                        <li><a href="< ?=$this->url('conference_est')?>">conference ouest</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="< ?=$this->url('default_home')?>">contact</a></li>
                                    </ul>
                                </li>
                            </ul>
                            -->
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
            </header>

            <section>
                <?= $this->section('main_content') ?>
            </section>

            <footer>
            </footer>
        </div>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>