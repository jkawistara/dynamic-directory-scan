<?php
/**
 * @author Jauhari Khairul Kawistara <jkawistara@gmail.com>
 * Date: 2018-01-08
 */

use modules\CountFile;
use modules\ScanDirectory;

/**
 * @param mixed $db        The database connection.
 * @param mixed $directory The directory folder.
 */
function traceData($db, $directory)
{
    $iDs = collectData($db, $directory);
    $count = new CountFile($db);
    if (!empty($iDs)) {
        $count->status = true;
        $count->files = $iDs;
    }
    $count->traceData();
}

/**
 * @param mixed $db        The database connection.
 * @param mixed $directory The directory folder.
 */
function collectData($db, $directory): array
{
    $idFiles = [];
    $scan = new ScanDirectory();
    $result = $scan->scanDir($directory);
    if (empty($result)) {
        printf('File Not Found');
    }

    foreach ($result as $key => $file) {
        $count = new CountFile($db);
        $count->defaultFile = $file;
        $id = $count->insertOrUpdateData();
        if ($id !== null) {
            array_push($idFiles, $id);
        }
    }
    return $idFiles;
}