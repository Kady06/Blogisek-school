<?php
header('Content-Type: text/html; charset=utf-8');
setlocale(LC_ALL, 'cs_CZ.utf8');
date_default_timezone_set('Europe/Prague');
mb_internal_encoding("utf-8");


define("VIEW", "views/");
define("CONTROLLER", "controllers/");
define("MODELS", "models/");
define("FUNC", "functions/");
define('DATABASE', 'models/MySQLDatabase.php');


define("DEFAULT_CONTROLLER", "home");
define("DEFAULT_METHOD", "index");



define("DB_HOST", "localhost:3307");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_SCHEMA", "blogisek");