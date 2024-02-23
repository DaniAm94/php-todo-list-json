<?php
$dbs_path= __DIR__.'/../../dbs/dbs.json';

$dbs_content= file_get_contents($dbs_path);

$tasks=$dbs_content;


$task_id=$_POST['id'] ?? null;

if($task_id){
    // Converto in array php
    $tasks = json_decode($tasks, true);

   $tasks = array_filter($tasks, fn($task)=> $task['id'] != $_POST['id']);
   
   $tasks= json_encode($tasks);
   file_put_contents($dbs_path, $tasks);
}

header('Content-Type: application/json');

echo $tasks;