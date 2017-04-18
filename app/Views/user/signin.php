<?php $this->layout('layoutBootstrap', ['title' => 'Signin', 'currentPage' => 'signin']) ?>

<?php $this->start('main_content') ?>

<form action="" method="post">
    <fieldset>
        <input type="email" class="form-control" name="email" value="" placeholder="Email address" /><br />
        <input type="password" class="form-control" name="password" value="" placeholder="Your password" /><br />
<<<<<<< HEAD
        
        
        <a href="<?= $this->url('user_forgot'); ?>">Forgot password ?</a>
        <a href="<?= $this->url('user_signup'); ?>">Signup</a>
        <br><br>
=======
        <a href="<?= $this->url('user_forgot'); ?>">Forgot password ?</a><br><br>
        <a href="<?= $this->url('user_signup'); ?>">Signup</a><br><br>   
>>>>>>> 71289fc3367436994b6c2f51b4522da09f5eb395
        <input type="submit" class="btn btn-success btn-sm" value="Sign in" />
    </fieldset>
    
</form>
<?php $this->stop('main_content') ?>