<?php $this->layout('layoutBootstrap', ['title' => 'Change password', 'currentPage' => 'reset']) ?>

<?php $this->start('main_content') ?>

<?php if ($displayForm) : ?>
<form action="" method="post">
    <fieldset>
        <input type="password" class="form-control" name="password1" value="" placeholder="Your password" /><br />
        <input type="password" class="form-control" name="password2" value="" placeholder="Confirm your password" /><br />
        <input type="submit" class="btn btn-success btn-sm" value="Reset password" />
    </fieldset>
</form>
<?php endif; ?>
<?php $this->stop('main_content') ?>