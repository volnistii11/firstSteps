<?php
function doFeedBackAction($params) {
    $params['buttonText'] = "Добавить";
    $params['action'] = "add";
    $params['row'] = [];
    switch ($_GET['action']) {
        case 'add':
            $name = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST['name'])));
            $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST['feedback'])));
            if (addFeedback($name, $feedback)) {
                header("Location: /feedback/?message=OK");
            } else {
                header("Location: /feedback/?message=ERROR");
            }
        case 'edit':
            $id = (int)$_GET['id'];
            $params['buttonText'] = "Сохранить";
            $params['action'] = "save";
            $params['row'] = getFeedbackOne($id);
            break;
        case 'save':
            $id = (int)$_POST['id'];
            $name = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST['name'])));
            $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST['feedback'])));
            if (updateFeedbackOne($id, $name, $feedback)) {
                header("Location: /feedback/?message=EDIT");
            } else {
                header("Location: /feedback/?message=ERROR");
            }
        case 'delete':
            $id = (int)$_GET['id'];
            if (deleteFeedback($id)) {
                header("Location: /feedback/?message=DELETE");
            } else {
                header("Location: /feedback/?message=ERROR");
            }
    }
    $params['feedback'] = getFeedback();
    $messages = getFeedbackStatus();
    $params['message'] = $messages[$_GET['message']];
    return $params;
}


function getFeedback() {
    return getAssocResult("SELECT * FROM feedback WHERE 1 ORDER BY id DESC");
}


function getFeedbackOne($id) {
    return getAssocResult("SELECT * FROM feedback WHERE id = {$id} ORDER BY id DESC");
}

function updateFeedbackOne($id, $name, $feedback) {
    return executeQuery("UPDATE feedback SET name='{$name}',feedback='{$feedback}' WHERE id ={$id}");
}

function addFeedback($name, $feedback) {
    return executeQuery("INSERT INTO feedback(name, feedback) VALUES ('{$name}','{$feedback}')");
}

function deleteFeedback($id) {
    return executeQuery("DELETE FROM `feedback` WHERE id ={$id}");
}

function getFeedbackStatus() {
    return [
        'OK' => 'Сообщение добавлено',
        'DELETE' => 'Сообщение удалено',
        'EDIT' => 'Сообщение изменено',
        'ERROR' => 'Ошибка'
    ];
}