<?php
function upload()
{

    //Проверка на размер файла

    if ($_FILES["myfile"]["size"] > 1024 * 1024 * 5) {
        header("Location: /?page=gallery&message=error_size");
        echo("Размер файла не больше 5 мб");
        exit;
    }


    $path = "images/" . $_FILES["myfile"]["name"];
    if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $path)) {
        header("Location: /?page=gallery&message=OK");
        die();
    } else {
        header("Location: /?page=gallery&message=error");
        die();
    }
}