<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$dataFile = __DIR__.'/../data/tasks.json'; // путь к файлу с задачами

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Отдаем текущий список задач
    readfile($dataFile);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Сохраняем новые данные и передаем успех на страницу
    $input = json_decode(file_get_contents('php://input'), true);
    file_put_contents($dataFile, json_encode($input, JSON_PRETTY_PRINT));
    echo json_encode(['success' => true]);
}