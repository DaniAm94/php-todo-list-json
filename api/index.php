<?php
$dbs_path= __DIR__.'/../dbs/dbs.json';

$dbs_content= file_get_contents($dbs_path);

$tasks=$dbs_content;




// Controllo se ho una task da cancellare
$target_task = $_POST['target-task'] ?? '';
// Se si
if($target_task){
    // Converto tasks in un array php
    $tasks= json_decode($tasks, true);
    // Elimino la task
    
    // foreach($tasks as $task){
    //     if($task['id']===$target_task['id'])

    // }
    // Lo riconverto in json
    $tasks=json_encode($new_tasks);
    file_put_contents($dbs_path, $tasks);
} 
// Controllo se ho una nuova task
$new_task = $_POST['new-task'] ?? '';
// Se si
if($new_task){
    // Converto tasks in un array php
    $tasks= json_decode($tasks, true);
    // Aggiungo la nuova task
    $tasks[] = $new_task;
    // Lo riconverto in json
    $tasks=json_encode($tasks);
    file_put_contents($dbs_path, $tasks);
} 





header('Content-Type: application/json');

echo $tasks;