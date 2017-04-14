<?php $this->layout('layoutBootstrap', ['title' => 'Forgot password', 'currentPage' => 'forgot']) ?>

<?php $this->start('main_content') ?>

<form action="" method="post">
    <fieldset>
        <input type="email" class="form-control" name="email" value="" placeholder="Email address" /><br />
        <input type="submit" class="btn btn-success btn-sm" value="Send me an e-mail to reset my password" />
    </fieldset>
</form>
<?php $this->stop('main_content') ?>