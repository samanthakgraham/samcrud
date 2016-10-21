<div class="container login-form">
    <?php if(!empty($error)): ?>
        <div class="bg-danger text-danger"><?php echo $error; ?></div>
    <?php endif; ?>
    <h3>Log in below:</h3>
    <div class="form-group">
        <form method="POST" action="<?php echo site_url('/login/'); ?>">
            <input type="text" class="form-control" name="username" placeholder="Username" />
            <input type="password" class="form-control" name="password" placeholder="Password" />
            <input type="submit" class="btn btn-success" value="Log In" />
        </form>
    </div>    
</div>

