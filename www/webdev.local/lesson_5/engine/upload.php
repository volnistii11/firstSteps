<?php

function upload()
{

    $path_big = ROOT_DIR . BIG_IMAGES_DIR . $_FILES['myFile']['name'];
    $path_small = ROOT_DIR . SMALL_IMAGES_DIR . $_FILES['myFile']['name'];


    //проверка на тип файла
    $blacklist = array(".php", ".phtml", ".php3", ".php4");
    foreach ($blacklist as $item) {
        if(preg_match("/$item\$/i", $_FILES['myFile']['name'])) {
            header("Location: /gallery/?message=error_php");
            die();
        }
    }

    //Проверка на размер файла

    if ($_FILES["myfile"]["size"] > 1024 * 1024 * 5) {
        header("Location: /gallery/?message=error_size");
        die();
    }


    if (move_uploaded_file($_FILES["myFile"]["tmp_name"], $path_big)) {

        $filename = mysqli_real_escape_string(getDb(), $_FILES['myFile']['name']);
        $size = (int)$_FILES['myFile']['size'];
        executeQuery("INSERT INTO `goods` (`name`,`size`) VALUES ('{$filename}','{$size}')");
        //сделать ресайз файла $path и сохранить в small папку

        $image = new SimpleImage();
        $image->load($path_big);
        $image->resize(150, 100);
        $image->save($path_small);
        header("Location: /gallery/?message=ok");
        die();
    } else {
        header("Location: /gallery/?message=error");
        die();
    }
}