<?php

define('ROOTDIR', __DIR__ . DIRECTORY_SEPARATOR);

$ROOTURL = '/';

require_once ROOTDIR . 'autoload.php';
require_once ROOTDIR . 'src/helpers.php';

try{
    $PDO=(new \CT275\Labs\PDOFactory())->create([
        'dbhost'=>'localhost',
        'dbname'=>'qlbh',
        'dbuser'=>'root',
        'dbpass'=>''
    ]);
}

catch (Exception $ex) {
    exit("<pre>${ex}</pre>");
}
?>
