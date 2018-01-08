<?php
/**
 * @author Jauhari Khairul Kawistara <jkawistara@gmail.com>
 * Date: 2018-01-08
 */

include_once('config/DatabaseConnection.php');
include_once('controllers/main.php');
include_once('modules/CountFile.php');
include_once('modules/ScanDirectory.php');

use config\DatabaseConnection as Db;

$config = new Db();
$db = $config->getInstance();
traceData($db, $config->defaultDir);
?>