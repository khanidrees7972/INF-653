<?php

require_once("model/database.php");

function add_category($category_name) {
    try {
        if ($db = connect()) {
            $stmt = $db->prepare("INSERT INTO `categories` (`categoryName`) VALUES (?);");
            return $stmt->execute(array($category_name));
        }
    }
    catch(PDOException $ex) {
        push_db_error($ex);
    }
}

function delete_category($category_id) {
    try {
        if ($db = connect()) {
            $stmt = $db->prepare("DELETE FROM `categories` WHERE `categoryId` = ?;");
            return $stmt->execute(array($category_id));
        }
    }
    catch(PDOException $ex) {
        push_db_error($ex);
    }
}

function get_all_categories()
{
    try {
        if ($db = connect()) {
            $stmt = $db->prepare("SELECT * FROM `categories`;");
            if ($stmt->execute()) {
                $rows = $stmt->fetchAll();
                return isset($rows) ? $rows : array();
            }
        }
    }
    catch(PDOException $ex) {
        push_db_error($ex);
    }
}
