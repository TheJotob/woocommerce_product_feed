<?php print_r(get_post_meta($post->ID)); ?>
<p>
    <label for="feed_category">Product Category</label>
    <select name="feed_category" id="feed_category">
        <?php foreach($categories as $category): ?>
            <?php $selected = (esc_attr(get_post_meta($post->ID, 'feed_category', true))) == $category->term_id; ?>
            <option value = "<?= $category->term_id ?>"<?= $selected ? "selected" : "" ?>><?= $category->name; ?></option>
        <?php endforeach; ?>
    </select>
</p>
