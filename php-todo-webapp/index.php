<?php

include_once("model/database.php");
include_once("model/item_db.php");
include_once("model/category_db.php");

define("VIEW_ITEM_LIST", 1);
define("VIEW_ADD_ITEM", 2);
define("VIEW_CATEGORY_LIST", 3);

view();

function view_id()
{
    return extract_query('vid', 0);
}

function get_view_url($vid, $queries = array())
{
    $url = "/php-mysql-todo/part_two/?vid=$vid";
    if (count($queries) > 0) {
        foreach ($queries as $k => $v) {
            $url .= "&$k=$v";
        }
    }
    return $url;
}

function view_header()
{
    include_once("view/header.php");
}

function view_footer()
{
    include_once("view/footer.php");
}

function extract_query($key, $default = null)
{
    return isset($_REQUEST[$key]) ? $_REQUEST[$key] : $default;
}

function view_item_list()
{
    $categories = get_all_categories();
    $cid = extract_query('cid', count($categories) > 0 ? $categories[0]->categoryId : -1);
    $delete = extract_query('delete', 0);
    if ($delete > 0) {
        delete_item($delete);
    }
    $todos = get_items_by_category($cid > 0 ? $cid : null);

    include_once("view/item_list.php");
}

function view_category_list()
{
    if (count($_POST) > 0) {
        $category_name = extract_query('category_name');
        if (!add_category($category_name) && has_db_error()) {
            $error = pop_db_error();
            include_once("view/error.php");
        }
    }
    $categories = get_all_categories();
    include_once("view/category_list.php");
}

function view_add_item_form()
{
    if (count($_POST) > 0) {
        $title = extract_query('title');
        $category_id = extract_query('category_id');
        if (!add_item($title, $category_id) && has_db_error()) {
            $error = pop_db_error();
            include_once("view/error.php");
        }
    }
    $categories = get_all_categories();
    include_once("view/add_item_form.php");
}

function view()
{
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="./view/main.css">

        <?php

        switch (view_id()) {
            case VIEW_ITEM_LIST:
                echo "<title>Todo Items</title>";
                break;
            case VIEW_ADD_ITEM:
                echo "<title>Add Item</title>";
                break;
            case VIEW_CATEGORY_LIST:
                echo "<title>Categories</title>";
                break;
            default:
                echo "<title>Todo App</title>";
        }
        ?>
    </head>

    <body>
        <?php
        switch (view_id()) {
            case VIEW_ITEM_LIST:
                view_header();
                view_item_list();
                break;
            case VIEW_ADD_ITEM:
                view_header();
                view_add_item_form();
                break;
            case VIEW_CATEGORY_LIST:
                view_header();
                view_category_list();
                break;
            default: {
                    $error = [
                        "message" => "Page not found",
                        "code" => 404
                    ];
                    include_once("view/error.php");
            }
        }

        view_footer();
        ?>
    </body>
    </html>
<?php
}
