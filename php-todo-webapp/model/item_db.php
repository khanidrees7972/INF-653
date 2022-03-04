<?php

require_once("model/database.php");

function add_item($title, $category_id = null)
{
    try {
        if ($db = connect()) {
            $stmt = $db->prepare("INSERT INTO `todoitems` (title,category_id) VALUES (?,?);");
            return $stmt->execute(array($title,$category_id));
        }
    } catch (PDOException $ex) {
        push_db_error($ex);
    }
}

function delete_item($tid) {
    try {
        if ($db = connect()) {
            $stmt = $db->prepare("DELETE FROM `todoitems` WHERE `tid` = ?;");
            return $stmt->execute(array($tid));
        }
    }
    catch(PDOException $ex) {
        push_db_error($ex);
    }
}

function get_items_by_category($category_id) {
    try {
        if ($db = connect()) {
            $stmt = $db->prepare("SELECT * FROM `todoitems` WHERE `category_id` = ?;");
            if ($stmt->execute(array($category_id))) {
                $rows = $stmt->fetchAll();
                return isset($rows) ? $rows : array();
            }
        }
    }
    catch(PDOException $ex) {
        push_db_error($ex);
    }
}
