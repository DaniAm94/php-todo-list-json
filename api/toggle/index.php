<?php
$dbs_path= __DIR__.'/../../dbs/dbs.json';

$dbs_content= file_get_contents($dbs_path);

$tasks=$dbs_content;


$task_id = $_POST['id'] ?? null;

if($task_id){
     // Converto in array php
     $tasks = json_decode($tasks, true);

    $tasks = array_map(function($task){
        if($task['id'] == $_POST['id']) $task['done'] = !$task['done'];
        return $task;
    }, $tasks);
    
    $tasks= json_encode($tasks);
    file_put_contents($dbs_path, $tasks);
}

header('Content-Type: application/json');

echo $tasks;