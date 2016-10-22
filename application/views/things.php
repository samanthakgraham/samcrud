<div class="container lists">
    <h3>Things:</h3>
    <div class="list">
        <?php foreach ($css_files as $file): ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
        <?php endforeach; ?>
        <?php foreach ($js_files as $file): ?>
            <script src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>
        <?php echo $output; ?>
    </div>    
    <br />
    <a href="<?php echo site_url('/stuff/'); ?>">Return to main</a>
</div>
