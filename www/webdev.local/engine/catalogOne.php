<?php
function doCatalogOneAction($params) {
    if ($_GET['catalog_id']){
        $catalog_id = (int)$_GET['catalog_id'];
    } else {
        $catalog_id = (int)$_POST['catalog_id'];
    }
    $params['catalogOne'] = getCatalogOne($catalog_id);
    $params['catalog_id'] = $catalog_id;
    $params['buttonText'] = "Добавить";
    $params['action'] = "add";
    $params['row'] = [];
    switch ($_GET['action']) {
        case 'add':
            $author = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST['author'])));
            $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST['feedback'])));
            if (addFeedbackCatalogOne($catalog_id, $author, $feedback)) {
                header("Location: /catalogOne/?catalog_id=". $catalog_id . "&message=OK");
            } else {
                header("Location: /catalogOne/?catalog_id=". $catalog_id . "&message=ERROR");
            }
        case 'edit':
            $feedback_id = $_GET['feedback_id'];
            $params['buttonText'] = "Сохранить";
            $params['action'] = "save";
            $params['row'] = getFeedbackOneCatalogOne($feedback_id);
            break;
        case 'save':
            $feedback_id = (int)$_POST['feedback_id'];
            $name = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST['author'])));
            $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string(getDb(), $_POST['feedback'])));
            if (updateFeedbackOneCatalog($feedback_id, $name, $feedback)) {
                header("Location: /catalogOne/?catalog_id=". $catalog_id . "&message=EDIT");
            } else {
                header("Location: /catalogOne/?catalog_id=". $catalog_id . "&message=ERROR");
            }
        case 'delete':
            $feedback_id = $_GET['feedback_id'];
            if (deleteFeedbackOneCatalog($feedback_id)) {
                header("Location: /catalogOne/?catalog_id=". $catalog_id . "&message=DELETE");
            } else {
                header("Location: /catalogOne/?catalog_id=". $catalog_id . "&message=ERROR");
            }
    }
    $params['feedback'] = getFeedbackCatalog($catalog_id);
    $messages = getFeedbackStatusCatalog();
    $params['message'] = $messages[$_GET['message']];
    return $params;
}


function getFeedbackCatalog($catalog_id)
{
    return getAssocResult("SELECT * FROM catalog_feedback WHERE id_catalog = '{$catalog_id}' ORDER BY id_catalog DESC");
}

function addFeedbackCatalogOne($catalog_id, $author, $feedback) {
    return executeQuery("INSERT INTO catalog_feedback(author, feedback, id_catalog) VALUES ('{$author}','{$feedback}','{$catalog_id}')");
}

function getFeedbackOneCatalogOne($feedback_id) {
    return getAssocResult("SELECT * FROM catalog_feedback WHERE id = '{$feedback_id}'")[0];
}

function updateFeedbackOneCatalog($feedback_id, $author, $feedback) {
    return executeQuery("UPDATE catalog_feedback SET author='{$author}',feedback='{$feedback}' WHERE id ='{$feedback_id}'");
}

function deleteFeedbackOneCatalog($feedback_id) {
    return executeQuery("DELETE FROM catalog_feedback WHERE id ={$feedback_id}");
}

function getFeedbackStatusCatalog()
{
    return [
        'OK' => 'Сообщение добавлено',
        'DELETE' => 'Сообщение удалено',
        'EDIT' => 'Сообщение изменено',
        'ERROR' => 'Ошибка'
    ];
}
