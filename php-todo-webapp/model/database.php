<?php

define("DB_HOST","localhost");
define("DB_PORT","3306");
define("DB_USER","root");
define("DB_PASS","admin");
define("DB_NAME","todosdb");

$db_errors = array();

function connect() {
    $dsn = "mysql:host=".DB_HOST.";port=".DB_PORT.";dbname=".DB_NAME;
    $db = new PDO($dsn,DB_USER,DB_PASS, array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ));
    return $db;
}

function push_db_error($ex) {
    global $db_errors;
    $db_errors[] = [
        "message" => $ex->getMessage(),
        "code" => $ex->getCode(),
        "line" => $ex->getLine()
    ];
}

function has_db_error() {
    global $db_errors;
    return count($db_errors) > 0;
}

function pop_db_error() {
    global $db_errors;
    return array_shift($db_errors);
}
