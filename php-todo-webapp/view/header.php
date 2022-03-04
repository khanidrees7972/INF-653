<div class="nav-bar py-1">
    <a href="<?php echo get_view_url(VIEW_ITEM_LIST); ?>" class="nav-item <?php if (view_id() == VIEW_ITEM_LIST) echo "active"; ?>">
        Todo List
    </a>
    <a href="<?php echo get_view_url(VIEW_ADD_ITEM); ?>" class="nav-item <?php if (view_id() == VIEW_ADD_ITEM) echo "active"; ?>">
        Add Item
    </a>
    <a href="<?php echo get_view_url(VIEW_CATEGORY_LIST); ?>" class="nav-item <?php if (view_id() == VIEW_CATEGORY_LIST) echo "active"; ?>">
        Categories
    </a>
</div>
