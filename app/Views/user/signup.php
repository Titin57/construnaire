<?php $this->layout('layoutBootstrap', ['title' => 'Signup', 'currentPage' => 'signup']) ?>

<?php $this->start('main_content') ?>
<form action="" method="post">
    <fieldset>
        <input type="email" class="form-control" name="email" value="" placeholder="Email address" /><br />
        <input type="password" class="form-control" name="password1" value="" placeholder="Your password" /><br />
        <input type="password" class="form-control" name="password2" value="" placeholder="Confirm your password" /><br />
        <input type="submit" class="btn btn-success btn-sm" value="Sign up" />
    </fieldset>
</form>
<?php $this->stop('main_content') ?>