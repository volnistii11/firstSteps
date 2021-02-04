<?php
function getGallery() {
    return getAssocResult("SELECT id, name FROM goods WHERE 1 ORDER BY views DESC");
}

function getOneGallery($id) {
    return getAssocResult("SELECT name, views FROM goods WHERE id = {$id}")[0];
}

function addLikes($id) {
    executeQuery("UPDATE goods SET views = views + 1 WHERE id = {$id}");
}

function getStatus() {
    return [
        'ok' => 'Изображение успешно добавлено',
        'error' => 'Ошибка',
        'error_size' => 'Ошибка. Изображение файла больше 5МБ',
        'error_php' => 'Ошибка. Нельзя добавлять php файлы'
    ];
}