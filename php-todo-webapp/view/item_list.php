 <div class="row">
        <div class="col col-3">
            <div class="list">
                <?php
                $activeCategory = null;
                foreach ($categories as $category) {
                    if ($cid == $category->categoryId) $activeCategory = $category;
                    $url = get_view_url(VIEW_ITEM_LIST, [
                        "cid" => $category->categoryId
                    ]);
                ?>
                    <a href="<?php echo $url; ?>" class="list-item <?php if ($cid == $category->categoryId) echo "active"; ?>">
                        <?php echo $category->categoryName; ?>
                    </a>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="col col-7">
            <h2 class="text-center mb-1"><?php echo count($todos) > 0 && $activeCategory ? $activeCategory->categoryName : ""; ?></h2>
            <div class="list">
                <?php
                foreach ($todos as $todo) {
                    $url = get_view_url(VIEW_ITEM_LIST,[
                        "cid" => $cid,
                        "delete" => $todo->tid
                    ])
                ?>
                    <div class="list-item">
                        <a href="<?php echo $url; ?>" class="btn btn-light">x</a>
                        <span class="ml-1"><?php echo $todo->title; ?></label>

                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
