<div class="container stuff">
    <h3>Hi <?php echo $user; ?>; choose what you want to CRUD:</h3>
    <a href="<?php echo site_url('/stuff/categories/'); ?>">Categories</a><br />
    <a href="<?php echo site_url('/stuff/things/'); ?>">Things (which are assigned categories)</a>
</div>

