<div class="container lists">
    <h3>Categories:</h3>
    <div class="category-list list">
        <?php foreach($categories as $category): ?>
        <?php echo $category; ?>
        <?php endforeach; ?>
        <a class="btn btn-success add-category">Add</a>
    </div>
    <h3>Things:</h3>
    <div class="things-list list">
        <?php foreach($things as $thing): ?>
        <?php echo $thing; ?>
        <?php endforeach; ?>
        <a class="btn btn-success add-thing">Add</a>
    </div>
</div>

