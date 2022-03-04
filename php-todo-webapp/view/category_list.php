<div class="row">
    <div class="col col-10">
        <div class="card">

            <div class="card-header">
                <h3 class="text-center">Categories</h3>
            </div>
            <div class="card-body">

                <div class="row">
                    <form action="<?php echo get_view_url(VIEW_CATEGORY_LIST); ?>" method="POST" enctype="multipart/form-data">
                        <input type="text" placeholder="Category Name" maxlength="50" name="category_name" class="input">
                        <input type="submit" value="Save" class="btn btn-green">
                    </form>
                </div>


                <div class="row">
                    <div class="col col-10">
                        <div class="list">
                            <?php
                            foreach ($categories as $category) {
                            ?>
                                <div class="list-item">
                                    <?php echo $category->categoryName; ?>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
