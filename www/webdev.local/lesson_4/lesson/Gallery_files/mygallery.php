<?php

$messages = [
        'ok' => 'Файл загружен',
        'error' => 'Ошибка загрузки'
];


$scan = scandir("gallery_img/small");
$gallery = array_splice($scan, 2);

if (!empty($_FILES)) {
    $path_big = $_SERVER['DOCUMENT_ROOT'] . "/lesson_4/lesson/Gallery_files/gallery_img/big/" . $_FILES['myFile']['name'];
    $path_small = $_SERVER['DOCUMENT_ROOT'] . "/lesson_4/lesson/Gallery_files/gallery_img/small/" . $_FILES['myFile']['name'];

    echo $path_big;
    echo "<br>";
    var_dump($_FILES);
    echo $_FILES['myFile']['tmp_name'];

    //проверка на тип файла
    $blacklist = array(".php", ".phtml", ".php3", ".php4");
    foreach ($blacklist as $item) {
        if(preg_match("/$item\$/i", $_FILES['myFile']['name'])) {
            echo "Запрещена загрузка php файлов\n";
            exit;
        }
    }

    //проверка на размер файла
    if ($_FILES['myFile']['size'] > 2 * 1024 * 1024){
        echo "<p>Файл превышает размер 2 МБ</p>";
        exit;
    }

    if (move_uploaded_file($_FILES['myFile']['tmp_name'], $path_big)) {
        //сделать ресайз файла $path и сохранить в small папку

        include('classSimpleImage.php');
        $image = new SimpleImage();
        $image->load($path_big);
        $image->resize(150, 100);
        $image->save($path_small);

        header("Location: mygallery.php?message=ok");
    } else {
        header("Location: mygallery.php?message=error");
    }
}

$message = $messages[$_GET['message']];
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Моя галерея</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <script type="text/javascript" src="./scripts/jquery-1.4.3.min.js"></script>
    <script type="text/javascript" src="./scripts/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
    <script type="text/javascript" src="./scripts/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <link rel="stylesheet" type="text/css" href="./scripts/fancybox/jquery.fancybox-1.3.4.css" media="screen"/>
    <script type="text/javascript">
        $(document).ready(function () {
            $("a.photo").fancybox({
                transitionIn: 'elastic',
                transitionOut: 'elastic',
                speedIn: 500,
                speedOut: 500,
                hideOnOverlayClick: false,
                titlePosition: 'over'
            });
        }); </script>

</head>

<body>
<div id="main">
    <div class="post_title"><h2>Моя галерея</h2></div>
    <div class="gallery">
        <?php foreach ($gallery as $item) : ?>
            <a rel="gallery" class="photo" href="gallery_img/big/<?=$item?>"><img src="gallery_img/small/<?=$item?>" width="150"
                                                                              height="100"/></a>
        <?php endforeach; ?>
        <br><?=$message?><br>
    </div>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="myFile">
        <input type="submit" value="Отправить">
    </form>
</div>

</body>
</html>
