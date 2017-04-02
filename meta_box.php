<div class="form-group">
    <label for="categories">Product Categories</label>
    <select name="categories">
        <?php foreach($categories as $category): ?>
            <option><?= $category->name; ?></option>
        <?php endforeach; ?>
    </select>
</div>
