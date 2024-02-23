<?php
$dbs_path= __DIR__.'/../dbs/dbs.json';

$dbs_content= file_get_contents($dbs_path);

$tasks=$dbs_content;


// Controllo se ho una nuova task
$new_task_text = $_POST['new-task-text'] ?? '';
// Se si
if($new_task_text){
    // Converto tasks in un array php
    $tasks= json_decode($tasks, true);
    // Creo la nuova task
    $new_task=[
        'id'=> uniqid(),
        'text'=> $new_task_text,
        'done'=> false
    ];
    // Aggiungo la nuova task
    $tasks[] = $new_task;
    // Lo riconverto in json
    $tasks=json_encode($tasks);
    file_put_contents($dbs_path, $tasks);
} 





header('Content-Type: application/json');

echo $tasks;