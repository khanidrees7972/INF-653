<div class="row">

    <div class="col col-10">
        <form action="<?php echo get_view_url(VIEW_ADD_ITEM); ?>" method="POST" enctype="multipart/form-data">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">
                        Add Item
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col col-3">
                            <label for="title" class="form-label">Title</label>
                        </div>
                        <div class="col col-7">
                            <input class="input" type="text" maxlength="100" required="required" name="title" id="title">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-3">
                            <label for="category" class="form-label">Category</label>
                        </div>
                        <div class="col col-7">
                            <select name="category_id" id="category" required="required" class="drop-down">
                                <?php
                                foreach ($categories as $category) {
                                ?>
                                    <option value="<?php echo $category->categoryId ?>" class="dorop-down-item"><?php echo $category->categoryName; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="<?php echo get_view_url(VIEW_ITEM_LIST); ?>" class="btn btn-light">Cancel</a>
                    <input type="submit" value="Save" class="btn btn-green">
                </div>
            </div>
        </form>
    </div>
</div>
