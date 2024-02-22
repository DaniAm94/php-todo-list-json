<?php
$dbs_path= __DIR__.'/../dbs/dbs.json';

$dbs_content= file_get_contents($dbs_path);
header('Content-Type: application/json');

echo $dbs_content;